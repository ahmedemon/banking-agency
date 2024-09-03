@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <h6 class="element-header text-center">OutLoan Account Transaction History</h6>
                            <!--------------------START - Table with actions-------------------->
                            <div class="table-responsive">
                                <table class="table table-bordered table-v2 table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Company</th>
                                            <th>Mobile</th>
                                            <th>Profession</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <td>{{ $view_loan->name }}</td>
                                            <td>{{ $view_loan->company }}</td>
                                            <td>{{ $view_loan->mobile }}</td>
                                            <td>{{ $view_loan->profession }}</td>
                                            <td>{{ $view_loan->address }}</td>
                                            <td class="text-center">
                                                @if ($view_loan->active == true)
                                                    <button class="badge badge-success btn">Active</button>
                                                @else
                                                    <button class="badge badge-danger btn">Inactive</button>
                                                @endif
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
                            <h6 class="element-header text center">All Out Loan Account list</h6>
                            <div class="element-box">
                                <!--------------------START - Table with actions-------------------->
                                <div class="table-responsive">
                                    <div id="dataTable1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_length" id="dataTable1_length"><label>Show <select
                                                            name="dataTable1_length" aria-controls="dataTable1"
                                                            class="form-control form-control-sm">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select> entries</label></div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div id="dataTable1_filter" class="dataTables_filter"><label>Search:<input
                                                            type="search" class="form-control form-control-sm"
                                                            placeholder="" aria-controls="dataTable1"></label></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="dataTable1"
                                                    class="table table-bordered table-v2 table-striped dataTable"
                                                    role="grid" aria-describedby="dataTable1_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 14.3906px;">#</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Date | Time: activate to sort column ascending" style="width: 167.703px;">Date | Time</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Branch: activate to sort column ascending" style="width: 81.9531px;">Branch</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Deposit: activate to sort column ascending" style="width: 60px;">Deposit</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Withdraw: activate to sort column ascending" style="width: 74.0938px;">Withdraw</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Balance: activate to sort column ascending" style="width: 63.3281px;">Balance</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Interest: activate to sort column ascending" style="width: 66.6094px;">Interest</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Notes: activate to sort column ascending" style="width: 48.7656px;">Notes</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Attachment: activate to sort column ascending" style="width: 87.3281px;">Attachment</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 52.8281px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>


                                                        <tr class="text-center odd" role="row">
                                                            <td class="sorting_1">1</td>
                                                            <td>17 Sep 2021 | 12:00 am</td>
                                                            <td>Main Branch</td>
                                                            <td>100000</td>
                                                            <td>0</td>
                                                            <td>100000</td>
                                                            <td>0</td>
                                                            <td>11111</td>
                                                            <td>
                                                                <i class="fa fa-photo"></i>
                                                            </td>
                                                            <td>
                                                                <a title="Not deletable" style="color: grey;"><i
                                                                        class="os-icon os-icon-ui-15"
                                                                        title="Delete"></i></a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr style="font-weight: bold !important;" class="text-center">
                                                            <td colspan="3" class="text-right" rowspan="1">Total:</td>
                                                            <td rowspan="1" colspan="1">100000</td>
                                                            <td rowspan="1" colspan="1">0</td>
                                                            <td rowspan="1" colspan="1">100000</td>
                                                            <td rowspan="1" colspan="1">0</td>
                                                            <td colspan="3" rowspan="1"></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-5">
                                                <div class="dataTables_info" id="dataTable1_info" role="status"
                                                    aria-live="polite">Showing 1 to 1 of 1 entries</div>
                                            </div>
                                            <div class="col-sm-12 col-md-7">
                                                <div class="dataTables_paginate paging_simple_numbers"
                                                    id="dataTable1_paginate">
                                                    <ul class="pagination">
                                                        <li class="paginate_button page-item previous disabled"
                                                            id="dataTable1_previous"><a href="#" aria-controls="dataTable1"
                                                                data-dt-idx="0" tabindex="0"
                                                                class="page-link">Previous</a></li>
                                                        <li class="paginate_button page-item active"><a href="#"
                                                                aria-controls="dataTable1" data-dt-idx="1" tabindex="0"
                                                                class="page-link">1</a></li>
                                                        <li class="paginate_button page-item next disabled"
                                                            id="dataTable1_next"><a href="#" aria-controls="dataTable1"
                                                                data-dt-idx="2" tabindex="0" class="page-link">Next</a>
                                                        </li>
                                                    </ul>
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
    </div>
@endsection
