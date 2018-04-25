<?php

namespace App\Http\Controllers\API;

use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $customerId = $request->input('customerId');
        $amount = $request->input('amount');
        $date = $request->input('date');
        $offset = ($request->input('offset')) ? $request->input('offset') : 0 ;
        $limit = $request->input('limit');
        $transaction = new Transaction;

        $transactions = $transaction
            ->where(function ($q) use ($customerId, $amount, $date){
                if ($customerId)
                    $q->where('customer_id', $customerId);
                if ($amount)
                    $q->where('amount', $amount);
                if ($date)
                    $q->whereDate('updated_at', '=', $date);
                $q->take(1);
            });
        if ($limit)
            $transactions = $transactions->skip($offset)->take($limit);
        $transactions = $transactions->get()->toArray();
        return response()->json($transactions);
    }

    public function show($customerId, $transactionId)
    {
        $transaction = Transaction::where(['customer_id' => $customerId, 'id' => $transactionId])->first();
        return response()->json([
            'transactionId' => $transaction->id,
            'amount' => $transaction->amount,
            'date' => $transaction->getDateAttribute()
        ]);
    }

    public function store(Request $request)
    {
        $transaction = new Transaction;
        $transaction->customer_id = $request->input('customerId');
        $transaction->amount = $request->input('amount');
        $transaction->save();
        return response()->json([
            'transactionId' => $transaction->id,
            'customerId' => $transaction->customer_id,
            'amount' => $transaction->amount,
            'date' => $transaction->getDateAttribute()
        ], 201);
    }

    public function update(Request $request)
    {
        $transaction = Transaction::findOrFail($request->input('transactionId'));
        $transaction->amount = $request->input('amount');
        $transaction->update();
        return response()->json([
            'transactionId' => $transaction->id,
            'customerId' => $transaction->customer_id,
            'amount' => $transaction->amount,
            'date' => $transaction->getDateAttribute()
        ], 200);
    }

    public function delete(Request $request)
    {
        $result = 'fail';
        $transaction = Transaction::find($request->input('transactionId'));
        if ($transaction) {
            if ($transaction->delete())
                $result = 'success';
        }

        return response()->json([
            'result' => $result,
        ]);
    }
}
