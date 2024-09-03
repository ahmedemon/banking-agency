@extends('layouts.frontend.app')
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-sm-12">
                    <div class="element-box my-0" id="add_form">
                        <h6 class="element-header text-center mb-5">New Voucher Category</h6>
                        <hr class="border-success">
                        <form method="POST" action="{{route('voucher.category.update', $voucher->id)}}" accept-charset="UTF-8" note="Create new voucher category using following input.">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6 offset-3">
                                    <div class="form-group">
                                        <label for="type">Voucher Category Type</label>
                                        <select class="form-control" required id="type" name="type">
                                            <option value="0" {{$voucher->type == '0' ? 'selected' : ''}}>Expense</option>
                                            <option value="1" {{$voucher->type == '1' ? 'selected' : ''}}>Income</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 offset-3">
                                    <div class="form-group">
                                        <label for="name">Category Name</label>
                                        <input class="form-control" placeholder="Input Category Name" required autofocus name="name" value="{{ old('name', $voucher->name) }}" type="text" id="name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 offset-3">
                                    <div class="form-group">
                                        <label for="active">Status</label>
                                        <select class="form-control" required id="active" name="active">
                                            <option value="1" {{$voucher->active == '1' ? 'selected' : ''}}>Active</option>
                                            <option value="0" {{$voucher->active == '0' ? 'selected' : ''}}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <br>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 text-center"></div>
                                <div class="col-sm-4 text-center">
                                    <div class="row">
                                        <div class="col-sm-12 text-center">
                                            <input class="btn btn-primary" type="submit" value="Submit">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-center"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
