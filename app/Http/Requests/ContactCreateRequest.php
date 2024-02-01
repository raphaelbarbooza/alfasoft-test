<?php

namespace App\Http\Requests;

use App\Helpers\StringHelpers;
use Illuminate\Foundation\Http\FormRequest;

class ContactCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'sometimes|nullable|exists:contacts',
            'name' => 'required|string|min:5|max:200',
            'contact' => 'required|numeric|digits:9',
            'email_address' => 'required|email|unique:contacts,email_address,'.($this->route('contact') ? $this->route('contact')->getAttribute('id') : 'NULL').',id,deleted_at,NULL'
        ];
    }

    public function prepareForValidation()
    {
        // Sanatize the contact input before validate
        $this->merge([
            'contact' => StringHelpers::onlyNumbers($this->contact)
        ]);
    }
}
