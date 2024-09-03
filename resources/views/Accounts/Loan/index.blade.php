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



                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-wrapper">

                            {{-- <div class="row">
                                <div class="col-sm-12">
                                    <div class="element-box">
                                        <form method="POST" action="https://app.bluestarsomithi.com/panel/report/invest"
                                            accept-charset="UTF-8" class="form-inline justify-content-center"><input
                                                name="_token" type="hidden"
                                                value="UuZBaNXayYXIbW3PsH5ZR2mAMICGaogBjJcS8sJa">
                                            <div class="form-element control-rounded text-center">

                                                <label for="user" class="sr-only">Branch</label>
                                                <select class="form-control rounded" name="branch_id" required>
                                                    <option value="">Select branch</option>
                                                    <option value="1">Main Branch</option>
                                                </select>


                                                <label for="area" class="sr-only">Select Area</label>
                                                <select class="form-control rounded" id="area" name="area">
                                                    <option selected="selected" value="">All areas</option>
                                                    <option value="1">Uttara Area</option>
                                                    <option value="2">Dhanmondi Area</option>
                                                    <option value="3">Mohakhali Area</option>
                                                </select>


                                                <label for="allDate"
                                                    style="display: inline-block; width: auto; vertical-align: middle;">All
                                                    Date</label>
                                                <input class="form-control" id="allDate" required name="date" type="radio"
                                                    value="0">
                                                <input class="form-control" id="dateRange" required checked="checked"
                                                    name="date" type="radio" value="1">
                                                <label for="dateRange"
                                                    style="display: inline-block; width: auto; vertical-align: middle;">Date
                                                    Range</label>

                                                <label for="start" class="sr-only toy">Start</label>
                                                <input class="form-control rounded toy text-center"
                                                    placeholder="Select Filter" required name="start" type="date"
                                                    value="2021-10-10" id="start">
                                                <label for="end" class="sr-only toy">End</label>
                                                <input class="form-control rounded toy text-center"
                                                    placeholder="Select Filter" required name="end" type="date"
                                                    value="2021-10-17" id="end">

                                                <input class="btn btn-primary" type="submit" value="Search">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="element-box">
                                <div class="row">
                                    <div class="col-sm-6 text-left">
                                        <form method="GET" action="#"
                                            accept-charset="UTF-8" class="form-inline justify-content-center">
                                            <div class="form-element control-rounded text-center">
                                                <select class="form-control rounded text-center" required="" name="type">
                                                    <option value="account" selected="selected">Account</option>
                                                    <option value="name">Name</option>
                                                    <option value="mobile">Mobile</option>
                                                </select>
                                                <input class="form-control rounded text-center"
                                                    placeholder="Name or Account number" required="" name="account"
                                                    type="text">
                                                <input class="btn btn-primary" type="submit" value="Filter">
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-sm-6 text-right" style="display: block ruby">
                                        <div style="text-align: center;">
                                            <a href="{{ route('loan.index') }}">
                                                <button class="btn btn-info btn-sm" style="color: white;"> All
                                                    Account</button>
                                            </a>
                                            <a href="#">
                                                <button class="btn btn-primary btn-sm">Paid</button>
                                            </a>
                                            {{-- <a href="#">
                                                <button class="btn btn-dark btn-sm" style="color: white;">Expiring</button>
                                            </a> --}}
                                        </div>
                                    </div>
                                </div>

                                <hr>


                                <div class="table-responsive">
                                    <table id="" class="table table-bordered table-v2 table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <!-- <th>Code</th> -->
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
                                                {{-- <th>Type</th> --}}
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @forelse ($loans as $loan)
                                                <tr>
                                                    <td>1</td>
                                                    <!-- <td>616bf640902c3</td> -->
                                                    <td>{{ $loan->member->m_name }}</td>
                                                    <td>{{ $loan->account_id }}</td>
                                                    <td>{{ $loan->member->area->name }}</td>
                                                    <td>{{ Str::ucfirst($loan->scheme) }}</td>
                                                    <td>{{ date('d M Y', strtotime($loan->date)) }} - {{ date('d M Y', strtotime($loan->expire_date)) }}</td>
                                                    <td>{{ $loan->installment_count }}/{{ $loan->installment }}</td>
                                                    <td>{{ $loan->installment_amount }}</td>
                                                    <td>{{ $loan->ledger_no }}</td>
                                                    <td>{{ $loan->product ? $loan->product : '-' }}</td>
                                                    <td>{{ $loan->loan_amount }}</td>
                                                    <td>{{ $loan->total_amount }}</td>
                                                    <td>{{ $loan->total_paid }}</td>
                                                    <td>{{ $loan->due_amount }}</td>
                                                    <td>
                                                        @if($loan->status == '1')
                                                            <span class="text-info font-weight-bold small">Open</span>
                                                        @elseif ($loan->status == '2')
                                                            <span class="text-success font-weight-bold small">Running</span>
                                                        @elseif ($loan->status == '3')
                                                            <span class="text-success font-weight-bold small">Complete</span>
                                                        @else
                                                            <span class="text-danger font-weight-bold small">Closed</span>
                                                        @endif
                                                    </td>
                                                    <td class="row-actions">
                                                        @if($loan->status != 0)
                                                            <a href="{{ route('loan.collect.create', $loan->id) }}" title="Collection" style="color: green">
                                                                <i class="fa fa-plus-circle"></i>
                                                            </a>
                                                        @endif
                                                        <a href="{{ route('loan.show', $loan->id) }}"
                                                            title="View More"><i class="os-icon os-icon-grid-10"></i></a>

                                                        @role("admin|manager")
                                                        @if($loan->status == 1)
                                                        <a href="javascript:;" data-action="delete" data-href="{{ route('loan.destroy', $loan->id) }}"
                                                            title="Delete" style="color: red"><i
                                                                class="os-icon os-icon-ui-15"></i></a>
                                                        @else
                                                        <a title="Can not delete" style="color: grey"><i
                                                            class="os-icon os-icon-ui-15"></i></a>
                                                        @endif
                                                        @elserole("field-officer")
                                                        @endrole
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr><td colspan="17"> No loan issued yet </td></tr>
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
@endsection

@push('javascripts')
    <script>
        const custAction = document.querySelectorAll("[data-action='delete']");
        custAction.forEach(element => {
            element.addEventListener('click', function() {
                if (confirm("Do you really want to delete Loan/Investment account?")) {
                    const _deleteForm = document.createElement('form');
                    _deleteForm.action = this.dataset.href;
                    _deleteForm.method = "POST";
                    const _csrfToken = document.createElement('input');
                    _csrfToken.name = "_token";
                    _csrfToken.type = "hidden";
                    _csrfToken.value = "{{ csrf_token() }}";
                    _deleteForm.appendChild(_csrfToken);
                    const _method = document.createElement('input');
                    _method.name = "_method";
                    _method.type = "hidden";
                    _method.value = "DELETE";
                    _deleteForm.appendChild(_method);
                    this.insertAdjacentElement("afterend", _deleteForm);

                    _deleteForm.submit();
                }
            });
        });
    </script>
@endpush
