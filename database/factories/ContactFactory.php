<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $firstName = fake()->firstName();
        $lastName = fake()->lastName();

        return [
            'name' => join(' ',[$firstName, $lastName]),
            'email_address' => join('.',[strtolower($firstName), strtolower($lastName),rand(1,100)])."@email.com",
            'contact' => '919'.rand(111111,999999)
        ];
    }
}
