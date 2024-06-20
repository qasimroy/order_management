<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Seed businesses table
        foreach (range(1, 2) as $index) {
            DB::table('businesses')->insert([
                'name' => $faker->company,
                'email' => $faker->unique()->safeEmail,
                'location' => $faker->address,
                'contact_no' => $faker->phoneNumber,
                'employees' => $faker->numberBetween(10, 100),
                'type' => $faker->randomElement(['Retail', 'Service', 'Manufacturing']),
                'note' => $faker->sentence,
                'info1' => $faker->word,
                'info2' => $faker->word,
                'info3' => $faker->word,
                'created_by' => 'SYSADMIN',
                'updated_by' => 'SYSADMIN',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seed sources table
        foreach (range(1, 2) as $index) {
            DB::table('sources')->insert([
                'business_id' => $faker->numberBetween(1, 2),
                'name' => $faker->word,
                'api_key' => $faker->uuid,
                'api_key_password' => $faker->password,
                'auth_token' => $faker->md5,
                'employees' => $faker->numberBetween(5, 20),
                'status' => $faker->randomElement(['active', 'inactive']),
                'created_by' => 'SYSADMIN',
                'updated_by' => 'SYSADMIN',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seed stores table
        foreach (range(1, 2) as $index) {
            DB::table('stores')->insert([
                'business_id' => $faker->numberBetween(1, 2),
                'name' => $faker->company,
                'store_no' => $faker->buildingNumber,
                'status' => $faker->randomElement(['active', 'inactive']),
                'created_by' => 'SYSADMIN',
                'updated_by' => 'SYSADMIN',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seed payment methods table
        $paymentMethods = ['COD', 'Debit Card', 'Credit Card', 'Net Banking', 'Wallet', 'UPI'];

        foreach (range(1, 2) as $index) {
            DB::table('payment_methods')->insert([
                'business_id' => $faker->numberBetween(1, 2),
                'method_name' => $faker->randomElement($paymentMethods),
                'created_by' => 'SYSADMIN',
                'updated_by' => 'SYSADMIN',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seed customers table
        foreach (range(1, 2) as $index) {
            DB::table('customers')->insert([
                'source_id' => $faker->numberBetween(1, 2),
                'business_id' => $faker->numberBetween(1, 2),
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'phone' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'contact_no' => $faker->phoneNumber,
                'address1' => $faker->streetAddress,
                'address2' => $faker->secondaryAddress,
                'city' => $faker->city,
                'country' => $faker->country,
                'country_code' => $faker->countryCode,
                'zip' => $faker->postcode,
                'taxable' => $faker->randomElement(['yes', 'no']),
                'gender' => $faker->randomElement(['Male', 'Female']),
                'dob' => $faker->date,
                'annivarsary_date' => $faker->date,
                'info1' => $faker->word,
                'info2' => $faker->word,
                'info3' => $faker->word,
                'info4' => $faker->word,
                'created_by' => 'SYSADMIN',
                'updated_by' => 'SYSADMIN',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seed bill_to_addresses table
        foreach (range(1, 2) as $index) {
            DB::table('bill_to_addresses')->insert([
                'customer_id' => $faker->numberBetween(1, 2),
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'phone' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'address1' => $faker->streetAddress,
                'address2' => $faker->secondaryAddress,
                'city' => $faker->city,
                'company' => $faker->company,
                'country' => $faker->country,
                'country_code' => $faker->countryCode,
                'zip' => $faker->postcode,
                'created_by' => 'SYSADMIN',
                'updated_by' => 'SYSADMIN',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seed ship_to_addresses table
        foreach (range(1, 2) as $index) {
            DB::table('ship_to_addresses')->insert([
                'customer_id' => $faker->numberBetween(1, 2),
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'phone' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'address1' => $faker->streetAddress,
                'address2' => $faker->secondaryAddress,
                'city' => $faker->city,
                'country' => $faker->country,
                'country_code' => $faker->countryCode,
                'zip' => $faker->postcode,
                'created_by' => 'SYSADMIN',
                'updated_by' => 'SYSADMIN',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
