<?php

namespace Tests\Unit;

use App\Http\Requests\ContactCreateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class ContactFormValidationTest extends TestCase
{
    /**
     * @test
     * Test validation rules on a valid info set
     */
    public function test_create_valid_contact(): void
    {
        // login default user
        $user = \App\Models\User::where('email','demo@email.com')->first();

        $data = [
            'name' => 'Jhon Doe',
            'contact' => '999000111',
            'email_address' => 'contact@email.com'
        ];

        $this->actingAs($user)
            ->withoutMiddleware()
            ->withHeader('testing','true')
            ->json('POST','/contact/save', $data)
            ->assertStatus(200);

    }

    public function test_create_invalid_contact_number(): void
    {
        // login default user
        $user = \App\Models\User::where('email','demo@email.com')->first();

        $data = [
            'name' => 'Jhon Doe',
            'contact' => '999000999111',
            'email_address' => 'contact@email.com'
        ];

        $this->actingAs($user)
            ->withoutMiddleware()
            ->withHeader('testing','true')
            ->json('POST','/contact/save', $data)
            ->assertInvalid(['contact']);

    }

    public function test_create_invalid_contact_email(): void
    {
        // login default user
        $user = \App\Models\User::where('email','demo@email.com')->first();

        $data = [
            'name' => 'Jhon Doe',
            'contact' => '999000999111',
            'email_address' => 'contact'
        ];

        $this->actingAs($user)
            ->withoutMiddleware()
            ->withHeader('testing','true')
            ->json('POST','/contact/save', $data)
            ->assertInvalid(['email_address']);

    }

}
