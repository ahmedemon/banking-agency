@extends('layouts.frontend.app')
@section('title')
    Staff List | ব্লু স্টার সঞ্চয় ও ঋণ দান সমবায় সমিতি
@endsection
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-sm-12">
                    <div class="element-wrapper">
                        <center>
                            <a href="{{ route('staff.index') }}" class="btn btn-sm btn-info mx-auto">Go Back</a>
                        </center>
                        <div class="element-box-tp">
                            <!--------------------START - Table with actions-------------------->
                            <div class="">
                                <h6 class="element-header">Staff Status</h6>
                                <div class="row">
                                    <div class="col-md-6 offset-3">
                                        <table class="table table-bordered table-v2 table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Photo</th>
                                                    <th>Name</th>
                                                    <th>Role</th>
                                                    <th>Status</th>
                                                    <th class="px-5">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($status as $key=>$staff)
                                                    <tr class="text-center">
                                                        <td class="align-middle">{{$key = $key+1}}</td>
                                                        <td class="align-middle">
                                                            <img src="{{asset($staff->staff_image)}}" width="50px" height="50px">
                                                        </td>
                                                        <td class="align-middle">{{$staff->name}}</td>
                                                        <td class="align-middle">{{$staff->designation}}</td>
                                                        <td class="align-middle">
                                                                @if ($staff->active == false)
                                                                    <a href="#" class="btn btn-sm btn-outline-danger disabled font-weight-bold">Inactive</a>
                                                                @else
                                                                    <a href="#" class="btn btn-sm btn-outline-success disabled font-weight-bold">Active</a>
                                                                @endif
                                                        </td>
                                                        <td class="row-actions align-middle">
                                                            <div class="row text-center" style="display: block">
                                                                @if ($staff->active == false)
                                                                    <a href="{{ route('staff-status.active', $staff->id) }}" class="btn btn-sm btn-success text-white">Active</a>
                                                                @else
                                                                    <a href="{{ route('staff-status.inactive', $staff->id) }}" class="btn btn-sm btn-danger text-white">Inactive</a>
                                                                @endif
                                                                @role("admin|manager")
                                                                    <a class="btn btn-sm btn-danger text-white mx-0" href="{{ route('staff.destroy', $staff->id) }}" onclick="staffRoleDelete(this);" data-id="{{ $staff->id }}"  data-name="{{ $staff->name }}">
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                    <form id="delete-form-{{ $staff->id }}" action="{{ route('staff.destroy',$staff->id) }}" method="POST" class="d-none">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                    </form>
                                                                @elserole("field-officer")
                                                                @endrole
                                                            </div>
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
    </div>
</div>
<script>
    function staffRoleDelete(elem){
        event.preventDefault();
        if (confirm('Are you sure? You want to delete ( '+ elem.dataset.name +' )')) {
            document.getElementById('delete-form-'+ elem.dataset.id).submit();
        }
    }
</script>
@endsection
