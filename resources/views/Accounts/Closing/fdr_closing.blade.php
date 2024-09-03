@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <div class="row border">
                                <div class="col-sm-9 border" style="background: #DDC1F5">
                                    <table class="table table-sm table-striped ">
                                        <tbody>
                                            <tr>
                                                <td>Account</td>
                                                <td>{{$fixed_diposit->member->account}}</td>
                                            </tr>

                                            <tr>
                                                <td>Area</td>
                                                <td colspan="4">{{$fixed_diposit->member->area->name}}</td>
                                            </tr>

                                            <tr>
                                                <td>Name</td>
                                                <td colspan="4">{{$fixed_diposit->member->m_name}}</td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td colspan="4">{{$fixed_diposit->member->address}}</td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td>{{$fixed_diposit->member->m_mobile}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-3 text-center" style="background: #D5D543 ">
                                    <img id="photoF" src="" style="max-height:180px; max-width:300px;" class="text-center">
                                    <img id="signatureF" src="" style="max-height:180px; max-width:300px; display: none;" class="text-center">
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
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="element-header text-center" style="margin-bottom: 16px;">Monthly FDR Closing form</h6>
                        <div class="element-box">
                            <form method="POST" action="{{ route('closing.store') }}" accept-charset="UTF-8" note="Close FDR account by withdraw (Saving amount + Profit)">
                                @csrf
                                <input type="hidden" name="fdr_id" value="{{ $fixed_diposit->id}}">
                                <input type="hidden" name="fdr_account" value="{{ $fixed_diposit->member->account}}">
                                <div class="row">
                                    <div class="col-sm-6 offset-3">
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="start_date" class="col-form-label">Start Date</label>
                                                <input class="form-control text-center" placeholder="FDR opening date" name="start_date" readonly type="date" value="{{ $fixed_diposit->starting_date }}" id="start_date">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="passed_month" class="col-form-label">Passed Months</label>
                                                <input class="form-control text-center" placeholder="Amount of FDR" readonly name="passed_month" type="text" value="{{$fixed_diposit->months}}" id="passed_month">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="amount" class="col-form-label">FDR Amount</label>
                                                <input class="form-control text-center" placeholder="FDR opening date" readonly="" type="number" value="{{$fixed_diposit->amount}}" id="amount">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="profit" class="col-form-label">Payable Profit</label>
                                                <input class="form-control text-center" placeholder="Amount of FDR" readonly="" type="number" value="{{$payable_profit}}" id="profit">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="fdr_payable" class="col-form-label">Total Payable Amount</label>
                                                <input class="form-control text-center" placeholder="FDR opening date" readonly="" name="fdr_payable_amount" type="number" value="{{$fixed_diposit->amount}}" id="fdr_payable_amount">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="final_profit" class="col-form-label">Final Profit</label>
                                                <input id="final_profit_total" class="form-control text-center" placeholder="Closing note or blank" name="final_profit" type="text" value="{{$payable_profit}}">
                                            </div>

                                            <div class="col-sm-12">
                                                <label for="note" class="col-form-label">Closing Note</label>
                                                <textarea rows="3" class="form-control text-center" placeholder="Closing note or blank" name="note" id="note"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 offset-3">
                                        <input class="btn btn-primary col-md-12" type="submit" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
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
