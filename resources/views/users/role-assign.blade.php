@extends('layouts.frontend.app', ['pageTitle'=>'Assign role'])

@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row justify-content-center">

                    <div class="col-12 text-center mb-3">
                        <a class="btn btn-primary" href="{{ route('user.create') }}">Add User</a>
                        <a class="btn btn-primary" href="{{ route('user.role.create') }}">Create Role</a>
                        <a class="btn btn-primary" href="{{ route('user.role.index') }}">Manage Roles</a>
                    </div>

                    <div class="col-sm-10 col-md-8 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                Roles
                            </div>
                            <div class="card-body">
                                <form action="{{ route('user.role.save', $user->id) }}" method="POST"> @csrf
                                    @foreach ($roles as $role)
                                    <label class="form-control">
                                        <input type="checkbox" name="role[]" value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'checked' : '' }}>
                                        {{ $role->name }}
                                    </label>
                                    @endforeach
                                    <button type="submit" class="btn btn-success">Save role assignment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
