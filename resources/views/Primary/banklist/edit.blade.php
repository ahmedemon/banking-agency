@extends('layouts.frontend.app')
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-sm-10 offset-1">
                    <div class="element-box mt-5" id="add_form">
                        <h3 class="element-header text-center">Update Bank</h3>
                        <hr class="mb-5 border-success">
                        <form method="POST" action="{{ route('banklist.update', $edit_bank->id) }}" accept-charset="UTF-8" note="Do you want to create new BANK ACCOUNT with following information?">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="name">Bank Name</label>
                                    <input class="form-control" placeholder="Input Bank Name" required="" autofocus="" value="{{ old('name', $edit_bank->name) }}" name="name" type="text" id="name">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="branch">Branch Name</label>
                                    <input class="form-control" placeholder="Name of Branch" required="" value="{{ old('branch', $edit_bank->branch) }}" name="branch" type="text" id="branch">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="active">Status</label>
                                    <select class="form-control" id="active" name="active">
                                        <option value="" selected>Select Status</option>
                                        <option value="1" {{ $edit_bank->active == '1' ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $edit_bank->active == '0' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="holder">Bank Account Name</label>
                                    <input class="form-control" placeholder="Bank Account Holder Name" value="{{ old('holder', $edit_bank->holder) }}" name="holder" type="text" id="holder">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="account">Bank Account Number</label>
                                    <input class="form-control" placeholder="Bank Account Number" value="{{ old('account', $edit_bank->account) }}" name="account" type="text" id="account">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="publish">Web Publish</label>
                                    <select class="form-control" required="" id="publish" value="{{ old('publish', $edit_bank->publish) }}" name="publish">
                                        <option value="">Select Section</option>
                                        <option value="1" {{ $edit_bank->publish == '1' ? 'selected' : '' }}>Public</option>
                                        <option value="0" {{ $edit_bank->publish == '0' ? 'selected' : '' }}>Private</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input class="form-control" placeholder="Specific Address" value="{{ old('address', $edit_bank->address) }}" name="address" type="text" id="address">
                                </div>
                            </div>
                        </div>
                        <div>
                            <br>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <input class="btn btn-primary w-50" type="submit" value="Submit">
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection