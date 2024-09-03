@extends('layouts.frontend.app')
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">

            <div class="row" style="font-size: 13px;">
                <div class="col-sm-12">
                    <div class="element-wrapper">
                        <div class="element-box-tp">
                            <br>
                            <div class="row">
                                <div class="col-md-8">
                                    <form class="form-inline justify-content-center" action="" method="get">
                                        @csrf
                                        <div class="form-element control-rounded text-center">
                                            <input type="text" class="form-control rounded text-center" placeholder="Name or Account number" name="account" value="">
                                            <input class="btn btn-primary" type="submit" value="Filter">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{ route('fixed-deposit.index') }}">
                                        <button class="btn btn-info">View All Acount</button>
                                    </a>
                                    <a href="{{ route('fixed-deposit.index', 'disabled') }}">
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($diposits as $fdr)
                                            <tr>
                                                <td class="align-middle">{{$loop->iteration}}</td>
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
                                                        <a href="#" class="btn btn-sm btn-success p-1 text-white disabled">Active</a>
                                                    @else
                                                        <a href="#" class="btn btn-sm btn-danger p-1 disabled">Inactive</a>
                                                    @endif
                                                </td>
                                                <td class="d-inline-flex align-middle border-0">
                                                <a href="{{ route('fixed-diposit.account', $fdr->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-bars"></i>
                                                </a>
                                                    {{-- <button aria-expanded="false" aria-haspopup="true" class="btn btn-primary dropdown-toggle dropdown-toggle-split mx-0" data-toggle="dropdown" type="button" style="padding: 2px; margin-right:10px">
                                                        <i class="fa fa-print"></i>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                    <a class="dropdown-item" target="blank" href="{{ route('fixed-diposit.statememt', $fdr->id) }}">Statement</a>
                                                        <a class="dropdown-item" target="blank" href="{{ route('fixed-diposit.certificate', $fdr->id) }}">Certificate</a>
                                                        <a class="dropdown-item" target="blank" href="{{ route('fixed-diposit.account', $fdr->id) }}">Account</a>
                                                    </div> --}}
                                                    {{-- <a class="btn btn-sm btn-danger text-white mx-1" href="{{ route('fixed-diposit.edit', $fdr->id) }}" onclick="return confirm('Are you sure? You want to edit ( {{ $fdr->member->m_name }} ) '); ">
                                                        <i class="fa fa-box"></i>
                                                    </a> --}}
                                                    @role("admin|manager")
                                                        <a class="btn btn-sm btn-danger text-white mx-1" href="#" onclick="dipositDelete(this);" data-id="{{ $fdr->id }}" data-name="{{ $fdr->member->m_name }}">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <form id="delete-form-{{ $fdr->id }}" action="{{ route('fixed-deposit.destroy', $fdr->id) }}" method="POST" class="d-none">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    @elserole("field-officer")
                                                    @endrole
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>


                                {{ $diposits->links() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function dipositDelete(elem) {
        event.preventDefault();
        if (confirm('Are you sure? You want to edit ( ' + elem.dataset.name + ' )')) {
            document.getElementById('delete-form-' + elem.dataset.id).submit();
        }
    }
</script>
@endsection
