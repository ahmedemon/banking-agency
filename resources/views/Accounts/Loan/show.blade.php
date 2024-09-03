@extends('layouts.frontend.app')

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

                <div class="table-responsive">
                    <table id="" class="table table-bordered table-v2 table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Acc</th>
                                <th>Area</th>
                                <th>Scheme</th>
                                <th>Duration</th>
                                <th>Inst.</th>
                                <th>Inst. Amt.</th>
                                <th>Ledg.</th>
                                <th>Product</th>
                                <th>Principal</th>
                                <th>Total</th>
                                <th>Paid</th>
                                <th>Due</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>{{ $loan->member->m_name }}</td>
                                <td>{{ $loan->account_id }}</td>
                                <td>{{ $loan->member->area->name }}</td>
                                <td>{{ Str::ucfirst($loan->scheme) }}</td>
                                <td>{{ date('d M Y', strtotime($loan->date)) }} -
                                    {{ date('d M Y', strtotime($loan->expire_date)) }}</td>
                                <td>{{ $loan->installment_count }}/{{ $loan->installment }}</td>
                                <td>{{ $loan->installment_amount }}</td>
                                <td>{{ $loan->ledger_no }}</td>
                                <td>{{ $loan->product ? $loan->product : '-' }}</td>
                                <td>{{ $loan->loan_amount }}</td>
                                <td>{{ $loan->total_amount }}</td>
                                <td>{{ $loan->total_paid }}</td>
                                <td class="text-danger font-weight-bold">{{ $loan->due_amount }}</td>

                                <td>
                                    @if ($loan->status == '1')
                                        <span class="text-info font-weight-bold small">Open</span>
                                    @elseif ($loan->status = '2')
                                        <span class="text-success font-weight-bold small">Running</span>
                                    @elseif ($loan->status = '3')
                                        <span class="text-success font-weight-bold small">Complete</span>
                                    @else {{-- if: $savings->status == 0 --}}
                                        <span class="text-danger font-weight-bold small">Closed</span>
                                    @endif
                                </td>
                                {{-- <td></td> --}}
                                <td class="row-actions">
                                    <a href="{{ route('loan.collect.create', $loan->id) }}" title="Collection"
                                        style="color: green"><i class="fa fa-plus-circle"></i></a>
                                </td>
                            </tr>

                    </table>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <table id="dataTable1_didNotUsed" class="table table-bordered table-v2 table-striped dataTable no-footer"
                            role="grid" aria-describedby="dataTable1_info">
                            <thead>
                                <tr role="row">
                                    <th>#</th>
                                    {{-- <th>Code</th> --}}
                                    <th>Date</th>
                                    <th>Principle</th>
                                    <th>Profit</th>
                                    <th>Amount</th>
                                    <th>Fine</th>
                                    <th>Note</th>
                                    <th>Process_by</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse ($loan->installments()->get()->sortByDesc('date') as $install)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- <td>615ad797189f7</td> --}}
                                        <td>{{ date('d M Y', strtotime($install->date)) }}</td>
                                        <td>{{ $loan->installment_principle }}</td>
                                        <td>{{ $loan->interest_per_installment }}</td>
                                        <td>{{ $install->amount }}</td>
                                        <td>{{ $install->penalty }}</td>
                                        <td>{{ $install->note ? $install->note : '-' }}</td>
                                        <td>{{ $install->processed_by }}</td>
                                        <td class="row-actions">
                                            @role("admin|manager")
                                                <a href="javascript:;" class="delete" alert="Do you really want to delete transaction of 80 amount?" title="Delete" style="color: grey;">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            @elserole("field-officer")
                                            @endrole
                                        </td>
                                    </tr>
                                @empty

                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    @endsection
