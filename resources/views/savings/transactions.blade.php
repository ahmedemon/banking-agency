@extends('layouts.frontend.app', ['pageTitle'=>'Savings Deposits'])

@push('style')
    <style>
        tbody *:not(.row-actions) {
            font-size: 0.8rem !important;
        }

    </style>
@endpush

@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <!--------------------START - Table with actions-------------------->
                            <div class="table-responsive">
                                <table class="table table-bordered table-v2 table-striped">
                                    <thead>
                                        <tr>
                                            <th>Member</th>
                                            <th>Account</th>
                                            <th>Target Amount</th>
                                            <th>Per Installment</th>
                                            <th>Start Date</th>
                                            <th>Expire Date</th>
                                            <th>Paid Amount</th>
                                            <th>Due Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <tr>
                                            <td>{{ $savings->member->m_name }}</td>
                                            <td>{{ $savings->account_id }}</td>
                                            <td>{{ $savings->installment * $savings->savings_amount }}</td>
                                            <td>{{ $savings->savings_amount }}</td>
                                            <td>{{ date('d M Y', strtotime($savings->start_date)) }}</td>
                                            <td>{{ date('d M Y', strtotime($savings->expire_date)) }}</td>
                                            <td>{{ $savings->balance }}</td>
                                            <td>{{ $savings->due }}</td>
                                            <td>{!! $savings->status_html !!}</td>
                                            <td>
                                                <a href="{{ route('savings.deposit.create',$savings->id) }}" title="Take Deposit" class="p-2 text-white badge badge-primary">
                                                    <i class="fas fa-money-bill-alt"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-wrapper">

                            <div class="element-box">
                                <div class="table-responsive">
                                    <div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-bordered table-v2 table-striped">
                                                    <thead>
                                                        <tr role="row">
                                                            <th>#</th>
                                                            <th>Code</th>
                                                            <th>Date</th>
                                                            <th>Deposite</th>
                                                            <th>Withdraw</th>
                                                            <th>Balance</th>
                                                            <th>Profit</th>
                                                            <th>Penalty</th>
                                                            <th>Note</th>
                                                            <th>Process_by</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center">

                                                        @forelse ($savings->transactions_desc as $transaction)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $transaction->code }}</td>
                                                                <td>{{ date('d M Y', strtotime($transaction->date)) }}</td>
                                                                <td>{{ $transaction->deposit ? $transaction->deposit : '-' }}</td>
                                                                <td>{{ $transaction->withdraw ? $transaction->withdraw : '-' }}</td>
                                                                <td>{{ $transaction->last_balance }}</td>
                                                                <td>{{ $transaction->profit ? $transaction->profit : '-' }}</td>
                                                                <td>{{ $transaction->penalty ?? '-' }}</td>
                                                                <td>{{ $transaction->note }}</td>
                                                                <td>{{-- loggedin officer --}}</td>
                                                                <td class="row-actions">
                                                                    {{-- <a title="Not deletable" style="color: grey;">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a> --}}
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="10"> No transaction made yet </td>
                                                            </tr>
                                                        @endforelse

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
