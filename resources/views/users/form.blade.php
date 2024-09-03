@extends('layouts.frontend.app', ['pageTitle'=>'All Users'])

@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row justify-content-center">

                    <div class="col-sm-8 col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-header text-center">
                                <strong class="">Create user</strong>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('user.store', $staff->id) }}" method="POST"> @csrf
                                    <div class="my-2">
                                        <label class='form-label'>Name <strong class="text-danger">*</strong></label>
                                        <input name="name" type="text" class="form-control" value="{{ $staff->name }}" required placeholder="Name">
                                    </div>
                                    <div class="my-2">
                                        <label class='form-label'>Username <strong class="text-danger">*</strong></label>
                                        <input name="username" type="text" class="form-control" value="{{ Str::slug($staff->name) }}" required placeholder="Username">
                                    </div>
                                    <div class="my-2">
                                        <label class='form-label'>Email</label>
                                        <input name="email" type="email" class="form-control" value="{{ old('email') }}" placeholder="User email">
                                    </div>
                                    <div class="my-2">
                                        <label>Password <strong class="text-danger">*</strong></label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="password" name="password" class="form-control" placeholder="Choose password" value="password">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" value="password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <input type="submit" value="Create" class="btn btn-success btn-block">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
