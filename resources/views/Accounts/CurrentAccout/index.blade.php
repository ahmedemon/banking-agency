@extends('layouts.frontend.app', ['pageTitle' => 'Branch List'])

@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-8 offset-2">
                        <div class="element-wrapper">
                            <div class="text-center">
                                <a href="{{ route('current-account.create') }}" class="btn btn-sm btn-success"> Deposit to Current Account </a>
                            </div>
                            <h6 class="element-header"> Current Account List </h6>

                            <div class="element-box-tp">
                                <!--------------------START - Table with actions-------------------->
                                <div class="row">
                                    <table class="table table-bordered table-v2 table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Account</th>
                                                <th>Member Name</th>
                                                <th>Area</th>
                                                <th>Total Deposit</th>
                                                <th>Total Withdraw</th>
                                                <th>Balance Amount</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center table-sm">
                                            @foreach ($members as $member)
                                            <tr>
                                                    <td class="py-0 ">{{$loop->iteration}}</td>
                                                    <td class="py-0">{{$member->account}}</td>
                                                    <td class="py-0 text-left">{{$member->m_name}}</td>
                                                    <td class="py-0 ">{{$member->area->name}}</td>
                                                    @php
                                                        $deposit = $member->currentAccount->sum('deposit_amount');
                                                        $withdraw = $member->currentAccount->sum('withdraw');
                                                    @endphp
                                                    <td class="py-0 pr-3 text-right">{{$deposit}}</td>
                                                    <td class="py-0 pr-3 text-right">{{$withdraw}}</td>
                                                    <td class="py-0 pr-3 text-right">{{$deposit - $withdraw}}</td>
                                                    {{-- <td class="p-0 text-center">{{$member->withdraw}}</td> --}}
                                                    <td class="p-0 ">
                                                        <a class="badge badge-sm badge-info text-white mx-0"
                                                            href="{{ route('current-account.use', $member->account) }}" onclick="return confirm('Are you sure? You want to deposit to ( {{ $member->account }} CD A/c) '); ">
                                                                Deposit
                                                            </a>
                                                        @if ($member->currentAccount->sum('deposit_amount') > 0)
                                                            <a class="badge badge-sm badge-danger text-white mx-0" href="{{ route('current-account.withdraw', $member->account) }}" onclick="return confirm('Are you sure? You want to withdraw from A/c  no ( {{ $member->account }} ) '); ">
                                                                Withdraw
                                                            </a>
                                                        @else
                                                            <a class="badge badge-sm badge-secondary text-white mx-0 disabled" style="cursor: no-drop">Withdraw</a>
                                                        @endif

                                                    </td>
                                                </tr>
                                            @endforeach
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

@endsection
