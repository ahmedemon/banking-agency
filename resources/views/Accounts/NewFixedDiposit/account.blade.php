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

                    <table id="" class="table table-bordered table-v2 table-striped">
                        <thead>
                            <tr>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Member</th>
                                <th>Account</th>
                                <th>Scheme</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Profit Get</th>
                                <th>Profit Paid</th>
                                <th>Receivable Profit</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                                <tr>
                                    <td class="align-middle">{{$fdr->starting_date}}</td>
                                    <td class="align-middle">{{$fdr->ending_date}}</td>
                                    <td class="text-left align-middle">{{$fdr->member->m_name}}</td>
                                    <td class="align-middle">{{$fdr->account}}</td>
                                    <td class="align-middle">{{$fdr->scheme->name}}</td>
                                    <td class="align-middle">{{ $fdr->scheme->type == 1 ? "Fixed" : "Monthly" }}</td>
                                    <td class="align-middle">{{$fdr->amount}}</td>
                                    <td class="align-middle">{{$fdr->total_profit }}</td>
                                    <td class="align-middle">{{ $fdr->total_withdraw }}</td>
                                    <td class="align-middle">{{ $fdr->receiveable_amount }}</td>
                                    <td class="align-middle">
                                        @if ($fdr->status == true)
                                            <a href="#" class="badge badge-success p-1">Active</a>
                                        @else
                                            <a href="#" class="badge badge-danger p-1">Inactive</a>
                                        @endif
                                    </td>
                                </tr>
                        </tbody>
                    </table>

                    <form class="text-center" action="{{ route('fixed-diposit.makeProfit', $fdr->id) }}" method="POST">
                        @csrf
                        <input type="submit" class="btn btn-sm btn-success" value="Generate Profit">
                        <hr>
                    </form>

                </div>
                <div class="col-sm-12">

                    <div class="">
                        <h6 class="element-header">FDR Statement Report</h6>

                        <div class="element-box-tp">
                            <!--------------------START - Table with actions-------------------->
                            <div class="table ">
                                <table class="table table-bordered table-v2 table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Profit</th>
                                            <th>Withdraw</th>
                                            <th>Balance</th>
                                            <th>Note</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($fdr->profit()->get()->sortByDesc('id') as $profit)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $profit->date }}</td>
                                                <td>{{ $profit->profit }}</td>
                                                <td>{{ $profit->withdraw }}</td>
                                                <td>{{ $profit->balance }}</td>
                                                <td>{{ $profit->note }}</td>
                                                <td>No action</td>
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
