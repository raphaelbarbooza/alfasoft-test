<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Contact;
use App\Models\User;
use Database\Factories\ContactFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /**
         * Create a user if not exists
         */
        User::firstOrCreate(
            [
                'email' => 'demo@email.com'
            ],
            [
                'name' => 'Admin',
                'password' => Hash::make('123456')
            ]);

        /**
         * Populate the Contacts Table with fake data
         * only if we have less than 20 contacts
         */
        $count = Contact::all()->count();

        if($count < 20){

            ContactFactory::times(1)->createMany(20);

        }

    }
}
