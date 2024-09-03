@extends('layouts.frontend.app')
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-sm-12">
                    <div class="element-wrapper">
                        <center>
                            <a href="{{route('loan-application.create')}}" class="btn btn-sm btn-success">Add Loan Application</a>
                        </center>
                        <h6 class="element-header">Loan Application List</h6>
                        <div class="element-box-tp">
                            <!--------------------START - Table with actions-------------------->
                            <div class="table-responsive">
                                <table class="table table-bordered table-v2 table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Member name</th>
                                            <th>Loan Amount</th>
                                            <th>Acount type</th>
                                            <th>Member's age:</th>
                                            <th>Current address</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-sm">
                                        @foreach ($loan_application as $application)
                                            <tr class="text-center">
                                                <td class="align-middle">{{$loop->iteration}}</td>
                                                <td class="align-middle">{{$application->member_name}}</td>
                                                <td class="align-middle">{{$application->expect_loan_amount}}</td>
                                                <td class="align-middle">
                                                    {{$application->acount_type}}
                                                </td>
                                                <td class="align-middle">{{$application->member_age}}</td>
                                                <td class="align-middle">{{$application->current_address}}</td>
                                                <td class="align-middle">
                                                    @if ($application->status == true)
                                                        <p class="btn btn-success btn-sm disabled">Active</p>
                                                    @else
                                                        <p class="btn btn-danger btn-sm disabled">Pending</p>
                                                    @endif
                                                </td>
                                                <td class="align-middle">
                                                    <a class="btn btn-sm btn-info text-white text-decoration-none mx-0" href="{{ route('loan-application.show', $application->id) }}" onclick="return confirm('Are you sure? you want to edit {{ $application->member_name }}?')">
                                                        <i class="fas fa-expand"></i>
                                                    </a>
                                                    @role("admin|manager")
                                                        <a class="btn btn-sm btn-danger text-white text-decoration-none mx-0" href="#" onclick="applicationDelete(this);" data-id="{{ $application->id }}"  data-name="{{ $application->member_name }}">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <form id="delete-form-{{ $application->id }}" action="{{ route('loan-application.destroy',$application->id) }}" method="POST" class="d-none">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function applicationDelete(elem){
        event.preventDefault();
        if (confirm('Are you sure? You want to delete ( '+ elem.dataset.name +' )?')) {
            document.getElementById('delete-form-'+ elem.dataset.id).submit();
        }
    }
</script>
@endsection
