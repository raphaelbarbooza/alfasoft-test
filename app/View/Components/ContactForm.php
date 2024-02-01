<?php

namespace App\View\Components;

use App\Models\Contact;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ContactForm extends Component
{
    public $updating = false;
    /**
     * Create a new component instance.
     */
    public function __construct(public ?Contact $contact = null)
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if($this->contact->getAttribute('id'))
            $this->updating = true;

        return view('components.contact-form');
    }
}
