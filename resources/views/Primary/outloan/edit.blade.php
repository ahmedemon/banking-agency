@extends('layouts.frontend.app')
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-sm-12">
                    <div class="element-box my-0" id="add_form">
                        <h6 class="element-header text-center">New Out loan Account</h6>
                        <form method="POST" action="{{ route('outloan.update', $edit_loan->id) }}" accept-charset="UTF-8" note="Do you want to create new Out Loan with following information?">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input class="form-control" placeholder="Input Out Loan AC Name" required autofocus value="{{ $edit_loan->name }}" name="name" type="text" id="name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="mobile">Mobile Number</label>
                                        <input class="form-control" placeholder="Out Loan AC Mobile Number" required value="0{{ $edit_loan->mobile }}" name="mobile" type="tel" id="mobile">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="company">Company</label>
                                        <input class="form-control" placeholder="Out Loan AC Company" value="{{ $edit_loan->company }}" name="company" type="text" id="company">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="profession">Profession</label>
                                        <input class="form-control" placeholder="Out Loan AC Profession" value="{{ $edit_loan->profession }}" name="profession" type="text" id="profession">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input class="form-control" placeholder="Specific Address" value="{{ $edit_loan->address }}" name="address" type="text" id="address">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="balance">Balance</label>
                                        <input class="form-control" placeholder="How much need loan?" value="{{ $edit_loan->balance }}" name="balance" type="number" id="balance">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="interest">Interest</label>
                                        <input class="form-control" placeholder="How much you give interest?" value="{{ $edit_loan->interest }}" name="interest" type="number" id="interest">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="active">Status</label>
                                        <select class="form-control" id="active" name="active">
                                            <option value="" {{ $edit_loan->active == "" ? 'selected' : "" }}>Select Account Status</option>
                                            <option value="1" {{ $edit_loan->active == "1" ? 'selected' : "" }}>Active</option>
                                            <option value="0" {{ $edit_loan->active == "0" ? 'selected' : "" }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <br>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <input class="btn btn-primary" type="submit" value="Submit">
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