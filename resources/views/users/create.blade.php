@extends('layouts.frontend.app', ['pageTitle'=>'All Users'])

@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row justify-content-center">

                    <div class="col-12 text-center mb-3">
                        <a class="btn btn-primary" href="{{ route('user.index') }}">Manage User</a>
                        <a class="btn btn-primary" href="{{ route('user.role.create') }}">Create Role</a>
                        <a class="btn btn-primary" href="{{ route('user.role.index') }}">Manage Roles</a>
                    </div>

                    <div class="col-sm-12 col-md-10 col-lg-8">
                        <table class="table table-sm border">

                            <tr class="text-center text-uppercase">
                                <th>#</th>
                                <th class="text-left">Name</th>
                                <th class="text-left">Designation</th>
                                <th class="text-center">Suggested Role</th>
                                <th class="text-center">Actions</th>
                            </tr>

                            @foreach ($staffs as $staff)
                                <tr>
                                    <td class="text-center"> {{ $loop->iteration }} </td>
                                    <td> {{ $staff->name }} </td>
                                    <td> {{ $staff->designation }} </td>
                                    <td class="text-center">
                                        {{ $staff->role->role_designation }}
                                    </td>
                                    <td class="text-right p-1">
                                        <form action="{{ route('user.form', $staff->id) }}">
                                            <button type="submit" class="btn btn-sm btn-danger py-1 px-2">Make User</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
