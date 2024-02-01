<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * @return View
     * Index Page with contact list
     */
    public function index(Request $request) : View
    {

        $contactsQuery = Contact::query();

        // Filter?
        if($request->has('filter')){
            $filter = $request->get('filter');
            // Filtering name
            $contactsQuery->orWhere('name','LIKE','%'.$filter."%");
            // Filtering contact
            $contactsQuery->orWhere('contact','LIKE','%'.$filter."%");
            // Filtering email address
            $contactsQuery->orWhere('email_address','LIKE','%'.$filter."%");
        }

        // Order?
        $order = strtoupper($request->get('order','ASC'));
        // Invalid Orders
        if(!in_array($order,['ASC','DESC']))
            $order = 'ASC';

        $contactsQuery->orderBy('name', $order);

        $contacts = $contactsQuery->paginate(10)->withQueryString();

        return view('pages.index', ['contacts' => $contacts, 'order' => $order]);
    }

    public function view(Contact $contact, Request $request) : View
    {
        return view('pages.details',['contact' => $contact]);
    }


    public function delete(Contact $contact, Request $request){
        // Perfom the action
        try {
            $contact->delete();
            // Return Success
            return redirect()->route('contact.index')->with(['generalSuccess' => 'Contact deleted successfully']);
        }catch (\Throwable $throwable){
            // Some error happen
            Log::log('error', $throwable->getMessage());
            // Return
            return redirect()->back()->with(['generalDanger' => "Something bad happens..."]);
        }
    }
}
