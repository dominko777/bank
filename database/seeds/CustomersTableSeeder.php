<?php

use App\Customer;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::truncate();

        Customer::create([
            'name' => 'Alexey',
            'cnp' => true,
        ]);

        Customer::create([
            'name' => 'John',
            'cnp' => false,
        ]);

        Customer::create([
            'name' => 'Ivan',
            'cnp' => true,
        ]);
    }
}
