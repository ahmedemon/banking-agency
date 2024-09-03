@extends('layouts.frontend.app')
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-sm-12">
                    <div class="element-box" style="display: none" id="add_form">
                        <h6 class="element-header text-center">New Voucher</h6>
                        <form method="POST" action="{{ route('voucher.expense.update', $edit) }}" accept-charset="UTF-8" note="Create new voucher category using following input." enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="category">Voucher Category</label>
                                        <select class="form-control" required id="category" name="category">
                                            @foreach ($vouchers as $voucher)
                                                <option value="{{$voucher->id}}">{{ $voucher->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input class="form-control" placeholder="Input date if not today" name="date" type="date" id="date">
                                    </div>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="area">Select Area</label>
                                        <select name="area_id" class="form-control">
                                            @foreach ($areas as $area)
                                                <option value="{{$area->id}}">{{$area->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="area">Member Account Number</label>
                                        <input type="number" name="member_account" placeholder="Account number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="branch">Branch Name</label>
                                        {{-- <input name="branch" type="hidden" value="1" id="branch"> --}}
                                        <input class="form-control" placeholder="No Branch Found" disabled name="branch" type="text" value="Main Branch" id="branch">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="voucher_id">Voucher ID</label>
                                        <input class="form-control" placeholder="Input Voucher Id or not" name="voucher_id" type="number" id="voucher_id">
                                    </div>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="voucher_amount">Voucher Amount</label>
                                        <input class="form-control" placeholder="Input voucher amount" required name="voucher_amount" type="number" id="voucher_amount">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="voucher_by">Voucher By</label>
                                        <input class="form-control" placeholder="voucher by the person" name="voucher_by" readonly value="{{ Auth::user()->name }}" type="text" id="voucher_by">
                                    </div>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="calculate_with_profit">Is calculate with profit ?</label>
                                        <select name="calculate_with_profit" class="form-control">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="capture">Attachment File</label>
                                        <input accept="image/*" class="" placeholder="Select or capture file if available" capture style="height:38px" name="capture" type="file" id="capture">
                                    </div>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="note">voucher Details</label>
                                        <input class="form-control" placeholder="Input voucher note here" name="note" type="text" id="note">
                                    </div>
                                </div>
                                <div class="col-sm-2"></div>
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
