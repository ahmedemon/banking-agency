@extends('layouts.frontend.app')

@push('style')
    <style>
        tbody *:not(.row-actions){font-size: 0.8rem !important;}
    </style>
@endpush

@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">

            <div class="row">
                <div class="col-sm-12">
                    <div class="element-wrapper">
                        <div class="element-box-tp">
                            <br>
                            <div class="row">
                                <div class="col-md-8">
                                    <form class="form-inline justify-content-center" action="https://app.bluestarsomithi.com/panel/general/account" method="get">
                                        <div class="form-element control-rounded text-center">
                                            <input type="text" class="form-control rounded text-center" placeholder="Name or Account number" name="account" value="">
                                            <input class="btn btn-primary" type="submit" value="Filter">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <a href="https://app.bluestarsomithi.com/panel/general/all-account">
                                        <button class="btn btn-info">View All Acount</button>
                                    </a>
                                    <a href="https://app.bluestarsomithi.com/panel/general/deactive-account">
                                        <button class="btn btn-danger">Deactivated AC</button>
                                    </a>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table id="" class="table table-bordered table-v2 table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Member</th>
                                            <th>Account</th>
                                            <th>Area</th>
                                            <th>Total Deposit</th>
                                            <th>Regular Target</th>
                                            <th>Total Withdraw</th>
                                            <th>Balance</th>
                                            {{-- <th>Profit Withdraw</th> --}}
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @forelse ($members as $member)
                                        <tr>
                                            <td>{{ ($members ->currentpage()-1) * $members ->perpage() + $loop->index + 1 }}</td>
                                            <td>{{ $member->m_name }}</td>
                                            <td>{{ $member->account }}</td>
                                            <td>{{ $member->area->name }}</td>
                                            <td>{{ $member->total_deposit }}</td>
                                            <td>{{ $member->regular_savings }}</td>
                                            <td>{{ $member->total_withdraw }}</td>
                                            <td>{{ $member->ac_balance }}</td>
                                        {{-- <td>7956</td> --}}
                                            <td>{{ $member->is_active_generalac ? 'Active' : 'Inactive' }}</td>
                                            <td class="row-actions">
                                                <a href="{{ route('general-ac.deposit', $member->account) }}" title="Deposit"><i class="far fa-money-bill-alt"></i></i></a>
                                                <a href="{{ route('general-ac.withdraw', $member->account) }}" title="Withdraw"><i class="fas fa-hand-holding-usd"></i></a>
                                                <a href="{{ route('general-ac.transactions', $member->account) }}" title="Transactions" class="badge badge-primary" style="color: white"><i class="fa fa-list"></i></a>
                                                {{-- <a href="#" title="Print" class="badge badge-success" style="color: white"><i class="fa fa-print"></i></a> --}}
                                            </td>
                                        </tr>
                                        @empty
                                            <tr><td colspan="11" class="text-center"> No member found in the database. </td></tr>
                                        @endforelse
                                    </tbody>
                                </table>

                                {{ $members->links() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
