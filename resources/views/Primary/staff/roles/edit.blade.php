@extends('layouts.frontend.app')
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 offset-4">
                        <p class="lead text-center">Add New Role Designation</p>
                        <form action="{{route('staff-role.update', $editRole->id)}}" class="d-flex" method="POST">
                            @csrf
                            @method('PUT')
                            <input class="form-control rounded-0" type="text" name="role_designation" value="{{ $editRole->role_designation }}" placeholder="Designation Title">
                            <button class="btn btn-sm btn-success rounded-0" type="submit">Add</button>
                        </form>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection