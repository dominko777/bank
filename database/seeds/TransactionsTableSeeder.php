<?php

use App\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::truncate();

        $customerIds = DB::table('customers')->pluck('id')->all();

        for ($i = 0; $i < 20; $i++) {
            Transaction::create([
                'customer_id' => $customerIds[array_rand($customerIds, 1)],
                'amount' => mt_rand(1, 1000) / 10
            ]);
        }
    }
}
