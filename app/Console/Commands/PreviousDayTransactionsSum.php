<?php

namespace App\Console\Commands;

use App\Transaction;
use App\TransactionsSum;
use Illuminate\Console\Command;

class PreviousDayTransactionsSum extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'PreviousDayTransactionsSum:sum';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sum of all transactions from previous day';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $yesterdayDate = date('Y-m-d', strtotime("yesterday"));
        $totalSum = Transaction::whereDate('updated_at', '=', $yesterdayDate)->sum('amount');
        $t = new \App\TransactionsSum();
        $t->sum = $totalSum;
        $t->save();
    }
}
