@extends('layouts.frontend.app')
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-sm-12">
                    <div class="element-box" id="add_form">
                        <h6 class="element-header text-center">Edit Loan Category</h6>
                        <hr class="border-success">
                        <form method="POST" action="{{route('loancategory.update', $edit_category->id)}}" accept-charset="UTF-8" note="Do you want to create new loan category?" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="name">Category Name</label>
                                                <input class="form-control" placeholder="Name of category" required autofocus name="name" value="{{ old('name', $edit_category->name) }}" type="text" id="name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="interest_rate">Interest Rate</label>
                                                <input class="form-control" placeholder="Interest rate from 1-100 " step="any" min="0" max="100" name="interest_rate" value="{{ old('interest_rate', $edit_category->interest_rate) }}" type="number" id="interest_rate">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="duration">Loan duration (days)</label>
                                                <input class="form-control" placeholder="Loan duration in days" name="duration" value="{{ old('duration', $edit_category->duration) }}" type="number" id="duration">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="max_amount">Max loan amount</label>
                                                <input class="form-control" placeholder="Max amount for loan provide" name="max_amount" value="{{ old('max_amount', $edit_category->max_amount) }}" type="number" id="max_amount">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <br>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6 text-center">
                                    <input class="btn btn-success w-100" type="submit" value="Update Loan Category">
                                </div>
                                <div class="col-sm-3"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
