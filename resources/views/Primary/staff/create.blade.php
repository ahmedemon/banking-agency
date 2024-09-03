@extends('layouts.frontend.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="element-box" style="display: visible" id="add_form">
            <h3 class="card-header text-center py-4 bg-success rounded text-white text-uppercase">New Staff</h3>
            <form method="POST" action="{{route('staff.store')}}" accept-charset="UTF-8" note="Do you want to create new branch with following information?" enctype="multipart/form-data">
                @csrf
                {{-- <input name="_token" type="hidden" value="4vpKH4KaXgiGypL51ErLVCwC0sYAIkyC4PllG1qZ"> --}}
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <p class="card-header my-0"><strong>Note:</strong> The fields marked with ( <strong class="text-danger">*</strong> ) are required.</p>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="join">Joining Date</label>
                            <strong class="text-danger">*</strong>
                            <input class="form-control" placeholder="Joining Date" required autofocus name="join" type="date" value="{{ old('join') }}" id="join">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name">Staff Name</label>
                            <strong class="text-danger">*</strong>
                            <input class="form-control" placeholder="Input Staff Name" required name="name" type="text" id="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="birthday">Date of Birth</label>
                            <strong class="text-danger">*</strong>
                            <input class="form-control" placeholder="Legal Birthday" required name="birthday" type="date" id="birthday" value="{{ old('birthday') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="father">Father Name</label>
                            <input class="form-control" placeholder="Name of Father" name="father" type="text" id="father" value="{{ old('father') }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="mother">Mother Name</label>
                            <input class="form-control" placeholder="Name of Mother" name="mother" type="text" id="mother" value="{{ old('mother') }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nid">National ID Number</label>
                            <input class="form-control" placeholder="Voter ID number" name="nid" type="text" id="nid" value="{{ old('nid') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="" selected>Select gender</option>
                                <option value="Female">Female</option>
                                <option value="Male">Male</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="mobile">Mobile Number</label>
                            <input class="form-control" placeholder="Active Mobile Number" name="mobile" type="text" id="mobile" value="{{ old('mobile') }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="address">Location Address</label>
                            <textarea rows="1" class="form-control" placeholder="Wright down full address" name="address" cols="50" id="address">{{ old('address') }}</textarea>
                        </div>
                    </div>
                </div>

                <legend style="margin-bottom: 10px;"><span>Upload Files</span></legend>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input class="form-control" placeholder="Ex: Chairman, Precedent" name="designation" type="text" id="designation" value="{{ old('designation') }}">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="picture">Profile Picture ( 450 X 570 pixel )</label>
                            <input class="form-control" placeholder="Tap for upload photo" accept="image/*" style="padding-bottom: 5px; padding-top: 5px;" name="picture" type="file" id="picture">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="sign">Signature</label>
                            <input class="form-control" placeholder="Tap for upload photo" style="padding-bottom: 5px; padding-top: 5px;" name="sign" type="file" id="sign">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="publish">Publish</label>
                            <select class="form-control" id="publish" name="publish">
                                <option value="1">Public</option>
                                <option value="0">Private</option>
                            </select>
                        </div>
                    </div>
                </div>
                <legend style="margin-bottom: 10px;"><span>Office Information</span>
                </legend>
                <div class="row">
                    <div class="col-sm office">
                        <div class="form-group">
                            <label for="post">User Role</label>
                            <strong class="text-danger">*</strong>
                            <select class="form-control" id="post" name="user_role" required>
                                @foreach ($allRoles as $role)
                                    <option value="{{$role->id}}">{{$role->role_designation}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm branch">
                        <div class="form-group">
                            <label for="branch">Select Branch</label>
                            <strong class="text-danger">*</strong>
                            <select class="form-control" id="branch" name="branch" required>
                                @foreach ($allBranch as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm office">
                        <div class="form-group">
                            <label for="active">Staff Status</label>
                            <select class="form-control" id="active" name="active">
                                <option value="{{ '0' }}">Inactive</option>
                                <option value="{{ '1' }}">Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm office">
                        <div class="form-group">
                            <label for="interview">Interview Date</label>
                            <input class="form-control" placeholder="Date of exam" name="interview" type="date" id="interview" value="{{ old('interview') }}">
                        </div>
                    </div>
                    <div class="col-sm office">
                        <div class="form-group">
                            <label for="security_money">Security Money</label>
                            <input class="form-control" placeholder="Amount of security money" name="security_money" type="number" value="{{ old('security_money') }}" id="security_money">
                        </div>
                    </div>
                </div>
                <legend style="margin-bottom: 10px;"><span>Salary Information</span>
                </legend>
                <div class="row">
                    <div class="col-sm office">
                        <div class="form-group">
                            <label for="salary">Basic Salary</label>
                            <input class="form-control" placeholder="Basic amount" name="salary" type="number" id="salary" value="{{ old('salary') }}">
                        </div>
                    </div>
                    <div class="col-sm office">
                        <div class="form-group">
                            <label for="house">House Rent</label>
                            <input class="form-control" placeholder="house rent" name="house" type="number" id="house" value="{{ old('house') }}">
                        </div>
                    </div>
                    <div class="col-sm office">
                        <div class="form-group">
                            <label for="medical">Medical allowance</label>
                            <input class="form-control" placeholder="Medical allowance " name="medical" type="number" id="medical" value="{{ old('medical') }}">
                        </div>
                    </div>
                    <div class="col-sm office">
                        <div class="form-group">
                            <label for="convenience">Convenience</label>
                            <input class="form-control" placeholder="Convenience" name="convenience" type="number" id="convenience" value="{{ old('convenience') }}">
                        </div>
                    </div>






                    <div class="col-sm office">
                        <div class="form-group">
                            <label for="transport">Transport allowance</label>
                            <input class="form-control" placeholder="Transportation" name="transport" type="number" id="transport" value="{{ old('transport') }}">
                        </div>
                    </div>
                    <div class="col-sm office">
                        <div class="col-sm office">
                            <div class="form-group">
                                <label for="mobile_bill">Mobile Allowance</label>
                                <input class="form-control" placeholder="Mobile bill" name="mobile_bill" type="number" id="mobile_bill" value="{{ old('mobile_bill') }}">
                            </div>
                        </div>
                    </div>
                </div>

                <legend style="margin-bottom: 10px;"><span></span></legend>

                <div class="row">
                    <div class="col-sm-12 text-center">
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
