@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <div class="row border">
                                <div class="col-sm-9 border">
                                    <table class="table table-sm table-striped ">
                                        <tbody>
                                            <tr>
                                                <td>Account</td>
                                                <td>{{$loan->member->account}}</td>
                                            </tr>

                                            <tr>
                                                <td>Area</td>
                                                <td colspan="4">{{$loan->member->area->name}}</td>
                                            </tr>

                                            <tr>
                                                <td>Name</td>
                                                <td colspan="4">{{$loan->member->m_name}}</td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td colspan="4">{{$loan->member->address}}</td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td>{{$loan->member->m_mobile}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-3 text-center">
                                    <img id="photoF" src="{{ asset($loan->member->m_photo ? 'storage/uploads/members/'.$loan->member->m_photo : 'images/default_member_image.jpg') }}" style="max-height:180px; max-width:300px;" class="text-center">
                                    <img id="signatureF" src="{{ asset('storage/uploads/members/' . $loan->member->signature) }}" style="max-height:180px; max-width:300px; display: none;" class="text-center">
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
                        <h6 class="element-header text-center">Loan/Investment Closing</h6>
                        <div class="element-box">
                            <form method="POST" action="{{ route('loan.closing.store') }}" accept-charset="UTF-8" note="Are you sure about all information and amount are OK?">
                            @csrf
                            <input name="account" type="hidden" value="{{ $loan->member->account }}">
                            <input name="loan_id" type="hidden" value="{{ $loan->id }}">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="distribute_date" class="col-form-label col-sm-4">Distribute date</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center" disabled="" type="date" value="{{$loan->date}}" id="distribute_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="expire_date" class="col-form-label col-sm-4">Expire date</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center" placeholder="Input Leger Number" disabled="" type="date" value="{{$loan->expire_date}}" id="expire_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="distribute_amount" class="col-form-label col-sm-4">Distributed Amount</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center" placeholder="Input invest amount" disabled="" type="number" value="{{$loan->total_amount}}" id="distribute_amount">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="return_amount" class="col-form-label col-sm-4">Returned Amount</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center" placeholder="Nothing returned" disabled="" type="number" value="{{$loan->total_paid}}" id="return_amount">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="principle" class="col-form-label col-sm-4">Principle</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center" placeholder="Returnable Principle" disabled="" type="number" value="{{$loan->loan_amount}}" id="principle">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="due_principle" class="col-form-label col-sm-4">Paid Principle</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center" placeholder="Due Principle" readonly="" type="number" value="{{$loan->total_paid}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="profit" class="col-form-label col-sm-4">Profit</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center" placeholder="Profit amount" disabled="" type="number" value="{{$loan->total_interest}}" id="profit">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="paid_profit" class="col-form-label col-sm-4">Paid Profit</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center" placeholder="Due Profit amount" readonly="" type="number" value="{{$loan->total_paid_profit}}" id="paid_profit">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="loan_passed" class="col-form-label col-sm-4">Loan Passed</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center" placeholder="{{ $loan->installment_count }}/{{ $loan->installment }}" disabled="" value="" id="loan_passed">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="total_due" class="col-form-label col-sm-4">Due Principal</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center" placeholder="Amount in due" readonly="" type="number" value="{{$loan->due_principle}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="due_profit" class="col-form-label col-sm-4">Due Profit</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center" placeholder="Amount in due" readonly="" type="number" value="{{$loan->due_profit}}" id="due_profit">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="total_due" class="col-form-label col-sm-4">Total due amount</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center" placeholder="Amount in due" disabled="" type="number" value="{{$loan->due_amount}}" id="total_due">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="overdue" class="col-form-label col-sm-4">Overdue</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center" placeholder="Overdue amount" disabled="" type="number" value="{{ $loan->due_amount }}" id="overdue">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="penalty" class="col-form-label col-sm-4">Penalty</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center" placeholder="Penalty amount" required="" name="penalty" type="number" value="0" id="penalty">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="discount" class="col-form-label col-sm-4">Discount % | ৳</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input step="any" id="percent" class="form-control" placeholder="Input in percent" min="0" max="99" name="percent" type="number">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <input class="form-control" placeholder="Input in number" name="discount" type="number" id="discount" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="collect" class="col-form-label col-sm-4">Collect for closing</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" min="{{ $loan->due_principle }}" name="collect" type="number" id="collect" readonly required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="note" class="col-form-label col-sm-4">Closing note</label>
                                        <div class="col-sm-8">
                                            <input rows="1" class="form-control" placeholder="Note" name="note" type="text" id="note">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <br>
                            </div>
                            <div class="row">
                                <div class="d-none d-md-block col-sm-6 text-center">
                                    <input class="btn btn-secondary" type="reset" value="Reset">
                                </div>
                                <div class="col-sm-6 text-center">
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
    <script type="text/javascript">
        const $percent = $('#percent');
        const $discount = $('#discount');
        const $collect = $('#collect');
        const $penalty = $('#penalty');
        const $total_due = $('#total_due');
        const $due_profit = $('#due_profit');




        $percent.keyup(function () {
            let collectAmount = parseInt($total_due.val()) + parseInt($penalty.val()) - parseInt($discount.val());
            let discountAmount = (parseInt($due_profit.val()) + parseInt($penalty.val())) * $percent.val() / 100;
            $discount.val(discountAmount);
            $collect.val(collectAmount);
        });
        $discount.keyup(function () {
            $percent.val(parseFloat($(this).val() * 100 / (parseInt($due_profit.val()) + parseInt($penalty.val()))).toFixed(2));
           $collect.val(parseInt($total_due.val()) + parseInt($penalty.val()) - parseInt($(this).val()));
        });
    //    $collect.keyup(function () {
    //         $discount.val(parseInt($due_profit.val()) + parseInt($penalty.val()) - parseInt($(this).val()));
    //         $percent.val(parseFloat($discount.val() * 100 / parseFloat(parseInt($total_due.val()) + parseInt($penalty.val()))).toFixed(2));
    //     });
        $penalty.keyup(function () {
            $percent.val(parseFloat($discount.val() * 100 / parseFloat(parseInt($total_due.val()) + parseInt($penalty.val()))).toFixed(2));
            $collect.val(parseInt($total_due.val()) + parseInt($penalty.val()) - parseInt($discount.val()));
        });
    </script>
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
