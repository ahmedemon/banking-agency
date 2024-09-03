@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <h6 class="element-header text-center">Director Transaction History</h6>
                            <!--------------------START - Table with actions-------------------->
                            <div class="table-responsive">
                                <table class="table table-bordered table-v2 table-striped">
                                    <thead>
                                        <tr>
                                            <th>Director Name</th>
                                            <th>Designation</th>
                                            <th>Mobile</th>
                                            <th>Profession</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <td>{{$director_view->name}}</td>
                                            <td>{{$director_view->designation}}</td>
                                            <td>{{$director_view->mobile}}</td>
                                            <td>{{$director_view->profession}}</td>
                                            <td>{{$director_view->address}}</td>
                                            <td class="text-center">
                                                @if ($director_view->active == true)
                                                    <p class="lead my-0 badge badge-success">Active</p>
                                                @else
                                                    <p class="lead my-0 badge badge-danger">Inactive</p>
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
                            <h6 class="element-header text center">All Transaction list</h6>
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
                                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 13.0312px;">#</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Date | Time: activate to sort column ascending" style="width: 162.75px;">Date | Time</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Branch: activate to sort column ascending" style="width: 79.0156px;">Branch</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Deposit: activate to sort column ascending" style="width: 57.5781px;">Deposit</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Withdraw: activate to sort column ascending" style="width: 71.3438px;">Withdraw</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Balance: activate to sort column ascending" style="width: 60.8281px;">Balance</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Notes: activate to sort column ascending" style="width: 46.6094px;">Notes</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Attachment: activate to sort column ascending" style="width: 84.2656px;">Attachment</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Process By: activate to sort column ascending" style="width: 91.0312px;">Process By</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable1" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 50.5469px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>



                                                        <tr class="text-center odd" role="row">
                                                            <td class="sorting_1">1</td>
                                                            <td>19 Sep 2021 | 12:00 am</td>
                                                            <td>Main Branch</td>
                                                            <td>---</td>
                                                            <td>10000</td>
                                                            <td>20000</td>
                                                            <td title="1" class="text-left">1</td>
                                                            <td>
                                                                <i class="fa fa-photo"></i>
                                                            </td>
                                                            <td>Mahfuz Akand</td>
                                                            <td>
                                                                <a onclick="return confirm('you will delete this director transaction, are you sure?')" href="https://app.bluestarsomithi.com/panel/director/director-transaction-delete/3" title="Delete">
                                                                    <i class="fa fa-trash" style="color: red;"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr style="font-weight: bold !important;" class="text-center">
                                                            <td colspan="3" class="text-right" rowspan="1">Total:</td>
                                                            <td rowspan="1" colspan="1">50000</td>
                                                            <td rowspan="1" colspan="1">30000</td>
                                                            <td rowspan="1" colspan="1">20000</td>
                                                            <td colspan="4" rowspan="1"></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-5">
                                                <div class="dataTables_info" id="dataTable1_info" role="status"
                                                    aria-live="polite">Showing 1 to 3 of 3 entries</div>
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
