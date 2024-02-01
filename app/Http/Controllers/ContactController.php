<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactCreateRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function create(Request $request){
        return view('pages.create');
    }

    public function update(Contact $contact, Request $request){
        return view('pages.update',['contact' => $contact]);
    }

    public function save(?Contact $contact = null, ContactCreateRequest $request){
        $validated = $request->validated();

        DB::beginTransaction();
        try{
            // Check if we don't have a soft deleter e-mail to reuse
            $reactive = Contact::where('email_address',$validated['email_address'])->withTrashed()->first();
            if($reactive){
                $reactive->restore();
                $contact = $reactive;
            }

            // Save the data
            $contact->fill($validated);
            $contact->save();

            // Commit
            DB::commit();

            // Return to the contact details
            return redirect()->route('contact.view',['contact' => $contact->getAttribute('id')])->with(['generalSuccess' => 'Contact saved successfully']);

        }catch (\Throwable $throwable){

            dd($throwable->getMessage());

            // Rollback
            DB::rollBack();
            // Some error happen
            Log::log('error', $throwable->getMessage());
            // Return
            return redirect()->back()->with(['generalDanger' => "Something bad happens..."]);

        }

    }
    public function delete(Contact $contact, Request $request){
        // Perfom the action
        DB::beginTransaction();
        try {
            $contact->delete();
            // Commit
            DB::commit();
            // Return Success
            return redirect()->route('contact.index')->with(['generalSuccess' => 'Contact deleted successfully']);
        }catch (\Throwable $throwable){
            // Rollback
            DB::rollBack();
            // Some error happen
            Log::log('error', $throwable->getMessage());
            // Return
            return redirect()->back()->with(['generalDanger' => "Something bad happens..."]);
        }
    }
}
