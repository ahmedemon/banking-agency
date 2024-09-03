@extends('layouts.frontend.app', ['pageTitle' => 'Add new area'])
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="element-box" style="display: visible" id="add_form">
                <h3 class="card-header text-center py-4 bg-success rounded text-white text-uppercase">New Branch</h3>
                <form method="POST" action="{{ route('area-list.store') }} " accept-charset="UTF-8"
                    note="Do you want to create new branch with following information?">
                    @csrf
                    {{-- <input name="_token" type="hidden" value="4vpKH4KaXgiGypL51ErLVCwC0sYAIkyC4PllG1qZ"> --}}
                    <div class="row">
                        <div class="col-md-6 mx-auto mt-3">

                            @include('partials.message')

                            <div class="form-group">
                                <label for="branch_id">Branch Name</label>
                                <select class="form-control" required autofocus name="branch_id">
                                    <option value=""> Select branch </option>
                                    @foreach ($branches as $branch)
                                        <option value="{{ $branch->id }}" {{
                                            $branch->id == old('branch_id') ? 'selected' : ''
                                        }}>{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Area Name</label>
                                <input class="form-control" placeholder="Area Name" required name="name"
                                    type="text" id="name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="associate">Associate</label>
                                <select class="form-control" name='associate_id' required>
                                    <option value=""> Select Associate </option>
                                    @foreach ($staffs as $staff)
                                        <option value="{{ $staff->id }}" {{
                                        $staff->id == old('associate_id') ? "selected" : '' }}>{{
                                        $staff->name
                                        }}</option>
                                    @endforeach
                                </select>
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
