<?php

namespace Database\Factories;

// use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    // protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $phonenumber = str_replace('-', '', $this->faker->phoneNumber());
        $address = $this->faker->prefecture() . $this->faker->city() . $this->faker->streetAddress();

        return [
            'category_id' => $this->faker->numberBetween(1, 5),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'gender' => $this->faker->numberBetween(1, 3),
            'email' => $this->faker->unique()->safeEmail(),
            'tel' => $phonenumber,
            'address' => $address,
            'building' => $this->faker->secondaryAddress(),
            'detail' => $this->faker->realText(30),
        ];
    }
}
