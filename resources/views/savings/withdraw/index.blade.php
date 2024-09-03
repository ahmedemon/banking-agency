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
                    <div class="element-box">
                        <div class="row border">
                            <div class="col-sm-9 border">
                                <table class="table table-sm table-striped ">
                                    <tbody>
                                        <tr>
                                            <td>Account</td>
                                            <td>{{ $member->account }}</td>
                                        </tr>

                                        <tr>
                                            <td>Area</td>
                                            <td colspan="4">{{ $member->area->name }}</td>
                                        </tr>

                                        <tr>
                                            <td>Name</td>

                                            <td colspan="4">{{ $member->m_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td colspan="4">{{ $member->address }}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>{{ $member->m_mobile }}</td>
                                        </tr>

                                        <tr>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-3 text-center">
                                <img id="photoF" src="{{ asset($member->photo) }}"
                                    style="max-height:180px; max-width:300px;" class="text-center">
                                <img id="signatureF" src="{{ asset('storage/members/' . $member->signature) }}"
                                    style="max-height:180px; max-width:300px; display: none;" class="text-center">
                            </div>
                            <script>
                                $("#photoF").dblclick(function() {
                                    $("#photoF").hide().delay(5000).fadeIn();
                                    $("#signatureF").show().delay(4500).fadeOut();
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="" class="table table-bordered table-v2 table-striped">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Scheme</th>
                            <th>Ac</th>
                            <th>Member</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Profit %</th>
                            <th>Installment</th>
                            <th>Amount</th>
                            <th>Target</th>
                            <th>Balance</th>
                            <th>Profit</th>
                            <th>Status</th>
                            <th>Leger</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($member->savings as $dps)
                            <tr class="text-center ">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dps->scheme->name }}</td>
                                <td>{{ $dps->member->account }}</td>
                                <td>{{ $dps->member->m_name }}</td>
                                <td>{{ date("d M Y", strtotime($dps->start_date)) }}</td>
                                <td>{{ date("d M Y", strtotime($dps->expire_date)) }}</td>
                                <td>{{ $dps->interest_percent }}%</td>
                                <td>0/{{ $dps->installment }}</td>
                                <td>{{ $dps->savings_amount }}</td>
                                <td class="text-right">{{ $dps->installment * $dps->savings_amount }}</td>
                                <td class="text-right">{{ $dps->balance }}</td>
                                <td class="text-right">{{ $dps->balance * ($dps->interest_percent / 100) }}</td>
                                <td class="text-right">{!! $dps->status_html !!}</td>
                                <td class="text-right">{{ $dps->ledger_no }}</td>
                                <td class="row-actions">
                                    <a href="{{ route('savings.transactions',$dps->id) }}" title="Transaction List" class="p-2 text-white badge badge-success">
                                        <i class="fas fa-external-link-alt"></i></a>

                                    <a href="{{ route('savings.withdraw.create',[$member->account,$dps->id]) }}" title="Withdraw" class="p-2 text-white badge badge-primary">
                                        <i class="fas fa-hand-holding-usd"></i></a>

                                </td>
                            </tr>
                        @empty
                            <p class="m-3">No DPS account created</p>
                        @endforelse


                    </tbody>

                </table>
            </div>


        </div>
    </div>
@endsection
