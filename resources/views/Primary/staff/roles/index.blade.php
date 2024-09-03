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
                            <a href="{{route('staff-role.create')}}" class="btn btn-primary mx-auto">Add New Roles</a>
                            <a href="{{ route('staff.index') }}" class="btn btn-success mx-auto">Go Back</a>
                        </center>
                        <div class="element-box-tp">
                            <!--------------------START - Table with actions-------------------->
                            <div class="">
                                <h6 class="element-header">Staff List</h6>
                                <div class="row">
                                    <div class="col-md-6 offset-3">
                                        <table class="table table-bordered table-v2 table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Role</th>
                                                    <th class="px-5">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($allRoles as $key=>$role)
                                                    <tr class="text-center">
                                                        <td class="align-middle">{{$key = $key+1}}</td>
                                                        <td class="align-middle">{{$role->role_designation}}</td>
                                                        <td class="row-actions align-middle">
                                                            <div class="row text-center" style="display: block">
                                                                <a class="btn btn-sm btn-danger text-white mx-0" href="{{ $role->id }}" onclick="staffRoleDelete(this);" data-id="{{ $role->id }}"  data-name="{{ $role->role_designation }}">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                                <form id="delete-form-{{ $role->id }}" action="{{ route('staff-role.destroy',$role->id) }}" method="POST" class="d-none">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                                <a class="btn btn-sm btn-danger text-white mx-0" href="{{route('staff-role.edit', $role->id)}}" onclick="return confirm('Are you sure? You want to edit ( {{$role->role_designation}} ) '); ">
                                                                    <i class="fa fa-box"></i>
                                                                </a>
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
