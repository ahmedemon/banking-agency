@extends('layouts.frontend.app')

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
                                            <th>Total Deposit</th>
                                            <th>Total Withdraw</th>
                                            <th>Current Balance</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <tr>
                                            <td>{{ $member->m_name }}</td>
                                            <td>{{ $member->account }}</td>
                                            <td>{{ $member->total_deposit }}</td>
                                            <td>{{ $member->total_withdraw }}</td>
                                            <td>{{ $member->ac_balance }}</td>
                                            <td>{{ $member->active ? 'Active' : "Inactive" }}</td>
                                            <td class="row-actions">
                                                <a href="{{ route('general-ac.deposit', $member->account) }}" title="Deposit"><i class="far fa-money-bill-alt"></i></i></a>
                                                <a href="{{ route('general-ac.withdraw', $member->account) }}" title="Withdraw"><i class="fas fa-hand-holding-usd"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--------------------END - Table with actions-------------------->
                            <!--------------------START - Controls below table-------------------->

                            <!--------------------END - Controls below table-------------------->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-wrapper">

                            <div class="element-box">
                                <!--------------------START - Table with actions-------------------->
                                <div class="table-responsive">
                                    <div class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="dataTable1_don't"
                                                    class="table table-bordered table-v2 table-striped dataTable no-footer"
                                                    role="grid" aria-describedby="dataTable1_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting_asc">#</th>
                                                            <th class="sorting">Date</th>
                                                            <th class="sorting">Deposit</th>
                                                            <th class="sorting">Withdraw</th>
                                                            <th class="sorting">Balance</th>
                                                            <th class="sorting">Note</th>
                                                            <th class="sorting">Process By</th>
                                                            <th class="sorting">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center">
                                                        @php
                                                            $general_ac_trans = $member->generalAc()->orderByDesc('date')->orderByDesc('id')->paginate(20);
                                                        @endphp
                                                        @forelse ($general_ac_trans as $general_ac)
                                                            <tr role="row" class="odd">
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ date("d M Y",strtotime($general_ac->date)) }}</td>
                                                                <td>{{ $general_ac->deposit ? $general_ac->deposit : '-' }}</td>
                                                                <td>{{ $general_ac->withdraw ? $general_ac->withdraw : '-' }}</td>
                                                                <td>{{ $general_ac->balance_till_trans }}</td>
                                                                <td>{{ $general_ac->note }}</td>
                                                                <td>{{ $general_ac->processed_by }}</td>
                                                                <td class="row-actions">
                                                                    @role("admin|manager")
                                                                        <a href="{{ '#' }}" class="delete" alert="Do you really want to delete this deposit of 50 taka ?" title="Delete" style="color: red;">
                                                                            <i class="far fa-trash-alt"></i>
                                                                        </a>
                                                                    @elserole("field-officer")
                                                                    @endrole
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr><td colspan="8">No transaction made yet</td></tr>
                                                        @endforelse

                                                    </tbody>
                                                </table>
                                                {{ $general_ac_trans->links() }}
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
