@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row element-box justify-content-center">
                    <div class="col-sm-6">
                        <div class="row border">
                            <div class="col-sm-9 border" >
                                <table class="table table-sm table-striped ">
                                    <tbody>
                                        <tr>
                                            <td>Account</td>
                                            <td>{{$dps->member->account}}</td>
                                        </tr>

                                        <tr>
                                            <td>Area</td>
                                            <td colspan="4">{{$dps->member->area->name}}</td>
                                        </tr>

                                        <tr>
                                            <td>Name</td>
                                            <td colspan="4">{{$dps->member->m_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td colspan="4">{{$dps->member->address}}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>{{$dps->member->m_mobile}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-3 text-center">
                                <img id="photoF" src="{{ asset($dps->member->m_photo ? 'storage/uploads/members/'.$dps->member->m_photo : 'images/default_member_image.jpg') }}" style="max-height:180px; max-width:300px;" class="text-center">
                                <img id="signatureF" src="{{ asset('storage/uploads/members/'.$dps->member->signature) }}" style="max-height:180px; max-width:300px; display: none;" class="text-center">
                            </div>
                            <script>
                                $("#photoF").dblclick(function() {
                                    $("#photoF").hide().delay(5000).fadeIn();
                                    $("#signatureF").show().delay(4500).fadeOut();
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class="row element-box">
                    <div class="col-sm-6 offset-3">
                        <form action="{{ route('dps.closing.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="savings_id" value="{{$dps->id}}">
                            <input type="hidden" name="account" value="{{$dps->member->account}}">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group row">
                                        <label for="date" class="col-form-label col-sm-4">Closing Date</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center" id="date" name="date" type="date" value="{{ old('date') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="loan_due" class="col-form-label col-sm-4">Loan Due</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center bg-danger text-white" id="loan_due" step="any" placeholder="N/A" disabled="" name="loan_due" type="text" value="{{ $dps->member->loans()->sum('loan_amount') }}">{{-- this should be change --}}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="balance" class="col-form-label col-sm-4">Total Deposit Balance</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center" placeholder="Something error. Please refresh page" disabled="" name="balance" type="number" value="{{$dps->total_deposit}}" id="balance">{{-- this should be change --}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="receivable" class="col-form-label col-sm-4">Total Receivable</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center" placeholder="Something error. Please refresh page" disabled="" name="receivable" type="number" value="{{$dps->balance}}" id="receivable">{{-- this should be change --}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="due" class="col-form-label col-sm-4">Due Amount</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center" placeholder="Something error. Please refresh page" disabled="" name="due" type="number" value="{{ $dps->target_amount - $dps->total_deposit }}" id="due">{{-- this should be change --}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="withdraw" class="col-form-label col-sm-4">Withdraw Amount</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center mainAmount" max="{{ $dps->balance }}" placeholder="Amount for withdraw" autofocus="" name="withdraw" type="number" value="{{ $dps->balance }}" id="withdraw">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="note" class="col-form-label col-sm-4">Withdraw Note</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center" placeholder="Withdrawal note will be here" name="note" type="text" id="note" value="{{ old('note') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <button class="btn btn-success col-md-12" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        jQuery(document).ready(function($) {
            // Disable scroll when focused on a number input.
            $('form').on('focus', 'input[type=number]', function(e) {
                $(this).on('wheel', function(e) {
                    e.preventDefault();
                });
            });
            // Restore scroll on number inputs.
            $('form').on('blur', 'input[type=number]', function(e) {
                $(this).off('wheel');
            });
            // Disable up and down keys.
            $('form').on('keydown', 'input[type=number]', function(e) {
                if (e.which == 38 || e.which == 40)
                    e.preventDefault();
            });
        });
    </script>

@endsection
