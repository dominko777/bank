@extends('layouts.app')

@section('content')

    @if (count($transactions) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Transactions
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <thead>
                    <th>Transaction</th>
                    <th>Amount</th>
                    </thead>

                    <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td class="table-text">
                                <div>{{ $transaction->customer->name }}</div>
                            </td>

                            <td>
                                <div>{{ $transaction->amount }}</div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection