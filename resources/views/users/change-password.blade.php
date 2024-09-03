@extends('layouts.frontend.app', ['pageTitle'=>'Change password'])

@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row justify-content-center">

                    <div class="col-sm-8 col-md-6 col-lg-4">
                       <div class="card">
                           <div class="card-header">
                                 <h3 class="card-title">Change password</h3>
                           </div>
                           <div class="card-body">
                                <form action="{{ route('user.save-password', auth()->user()->id) }}" method="post"> @csrf
                                    <div class="form-group">
                                        <label class="form-label">Current password</label>
                                        <input type="password" class="form-control" name="current_password" value="{{ old('current_password') }}" placeholder="Enter current password">
                                        @if ($errors->has('current_password'))
                                            <span class="text-danger">{{ $errors->first('current_password') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">New password</label>
                                        <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Enter new password">
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Confirm password</label>
                                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Enter confirm password">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Change password</button>
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
