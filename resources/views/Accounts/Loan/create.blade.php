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
                                                <td>{{ $member->account }}</td>
                                            </tr>

                                            <tr>
                                                <td>Area</td>
                                                <td colspan="4">{{ $member->area->name }}</td>
                                            </tr>

                                            <tr>
                                                <td>Name</td>

                                                <td colspan="4">{{ $member->m_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td colspan="4">{{ $member->address }}</td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td>{{ $member->m_mobile }}</td>
                                            </tr>

                                            <tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-3 text-center">
                                    <img id="photoF" src="{{ asset($member->photo) }}"
                                        style="max-height:180px; max-width:300px;" class="text-center">
                                    <img id="signatureF" src="{{ asset('storage/member/' . $member->m_signature) }}"
                                        style="max-height:180px; max-width:300px; display: none;" class="text-center">
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






                        <div class="element-box">
                            <form method="POST" action="{{ route('loan.store') }}" accept-charset="UTF-8"
                                note="Are you sure about all information and amount are OK?" enctype="multipart/form-data"> @csrf
                                <input name="account_id" type="hidden" value="{{ $member->account }}">



                                <div class="row">
                                    <div class="col-sm">
                                        <div class="form-group row">
                                            <label for="date" class="col-form-label col-sm-4">Date</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" name="date" value="{{ old('date') ? date('Y-m-d', strtotime(old('date'))) : '' }}" type="date" id="date">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="schema" class="col-form-label col-sm-4 required">Select
                                                Schema</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" onchange="InstallmentSequence();" required=""
                                                    id="schema" name="scheme" value="{{ old('scheme') }}">
                                                    <option selected="selected" value="">Select Schema</option>
                                                    <option {{ old('schema') == 'daily' ? 'selected' : '' }} value="daily">Daily</option>
                                                    <option {{ old('schema') == 'weekly' ? 'selected' : '' }} value="weekly">Weekly</option>
                                                    <option {{ old('schema') == 'half_month' ? 'selected' : '' }} value="half_month">Half Month</option>
                                                    <option {{ old('schema') == 'monthly' ? 'selected' : '' }} value="monthly">Monthly</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                            </div>
                                            <label for="invest" class="col-form-label col-sm-4 required">Invest Amount</label>
                                            <div class="col-sm-8">
                                                <small class="text-danger font-weight-bold">বিঃদ্রঃ আপনার General Account এ কমপক্ষে আবেদন কৃত লোন এর ১০% টাকা থাকতে হবে.</small>
                                                <input class="form-control mainAmount" placeholder="Input invest amount"
                                                min="" required="" max="" autofocus="" name="loan_amount" value="{{ old('loan_amount') }}" type="number"
                                                id="invest">
                                                <small class="text-danger font-weight-bold" id="msgGeneralAcLoan" style="display: none"></small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="interest" class="col-form-label col-sm-4 required">Interest % |
                                                ৳</label>
                                            <div class="col-sm-4">
                                                <div class="input-group">
                                                    <input step="any" id="percent" class="form-control"
                                                        placeholder="Input in percent" min="0" max="99" name="percent" value="{{ old('percent') }}"
                                                        type="number" value="0">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="form-control" placeholder="Input in number" required=""
                                                    name="interest" value="{{ old('interest') }}" type="number" value="0" id="interest">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="installment" class="col-form-label col-sm-4 required">Installment
                                                Number</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Number of total installment"
                                                    required="" name="installment" value="{{ old('installment') }}" type="number" id="installment">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="start" class="col-form-label col-sm-4 required">Start
                                                Installment</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Collect start late from * days"
                                                    required="" name="collection_start" value="{{ old('collection_start') }}" type="number" value="0" id="start">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="category"
                                                class="col-form-label col-sm-4 required">Loan Category</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" required="" id="category" name="category_id" value="{{ old('category_id') }}">
                                                    <option value="">Select a loan category</option>
                                                    @foreach ($loanCategories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }} - <small class="text-secondary">Max: {{ $category->max_amount }}Tk - for {{ $category->duration }} days</small></option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="form-group row">
                                            <label for="open_fee" class="col-form-label col-sm-4">Loan Open Fee</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Input amount or keep blank"
                                                    name="open_fee" value="{{ old('open_fee') }}" type="number" id="open_fee">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="insurance_fee" class="col-form-label col-sm-4">Insurance Fee</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Input amount or keep blank"
                                                    name="insurance_fee" value="{{ old('insurance_fee') }}" type="number" id="insurance_fee">
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-sm">

                                        <div class="form-group row">
                                            <label for="savings" class="col-form-label col-sm-4">General Savings Balance</label>
                                            <div class="col-sm-8">
                                                <input class="form-control border border-success" readonly="" id="savings" name="" type="text" value="{{$member->ac_balance}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="DPS" class="col-form-label col-sm-4">Current DPS Balance</label>
                                            <div class="col-sm-8">
                                                <input class="form-control border border-success" readonly="" id="dps" name="" type="text" value="{{$member->current_dps_balance}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="total" class="col-form-label col-sm-4">Total Amount</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Sum of total amount" required
                                                    disabled="" name="total" value="{{ old('total') }}" type="number" id="total">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="installment_amount" class="col-form-label col-sm-4">Installment
                                                Amount</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="In installment amount"
                                                    required="" disabled="" name="installment_amount" value="{{ old('installment_amount') }}" type="number"
                                                    id="installment_amount">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="duration" class="col-form-label col-sm-4">Installment Sequence
                                                (days)</label>
                                            <div class="col-sm-8">
                                                <!-- <input class="form-control" placeholder="Investment collection sequence in days" required name="duration" value="{{ old('duration') }}" type="number" id="duration"> -->
                                                <input type="text" name="sequence" value="{{ old('sequence') }}" id="duration" class="form-control"
                                                    placeholder="Investment collection sequence in days" readonly="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="expire" class="col-form-label col-sm-4">Expire Date</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" readonly=""
                                                    placeholder="Fill up all installment related field" name="expire_date" value="{{ old('expire_date') ? date('d-M-Y',strtotime(old('expire_date'))) : ''}}"
                                                    type="text" id="expire">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="penalty_capital" class="col-form-label col-sm-4">Fine Per
                                                Installment</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" step="any"
                                                    placeholder="Keep blank for no fine" name="penalty_capital" value="{{ old('penalty_capital') }}"
                                                    type="number" id="penalty_capital">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="leger" class="col-form-label col-sm-4">Leger No</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Input Leger Number" readonly name="ledger_no" value="{{ old('ledger_no',$member->account) }}" type="text" id="leger" value="{{ $member->account }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="product" class="col-form-label col-sm-4">Product Info</label>
                                            <div class="col-sm-8">
                                                <input class="form-control"
                                                    placeholder="If you selling any product then input details here"
                                                    name="product" value="{{ old('product') }}" type="text" id="product">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="security_docs" class="col-form-label col-sm-4">Security
                                                document</label>
                                            <div class="col-sm-8">
                                                <input class="form-control"
                                                    placeholder="Document or papers take as security otherwise keep this field blank"
                                                    name="security_docs" value="{{ old('security_docs') }}" type="text" id="security_docs">
                                            </div>
                                        </div>
                                        {{-- <div class="form-group row">
                                            <label for="loan_duration" class="col-form-label col-sm-4">Loan
                                                Duration</label>
                                            <div class="col-sm-8">
                                                <input class="form-control"
                                                    placeholder="Number of days / Loan Active days" name="loan_duration" value="{{ old('loan_duration') }}"
                                                    type="number" id="loan_duration">
                                            </div>
                                        </div> --}}

                                        <div class="form-group row">
                                            <label for="reference_acc" class="col-form-label col-sm-4">Reference
                                                Account</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Acc" name="reference_acc" value="{{ old('reference_acc') }}"
                                                    type="number" id="reference_acc">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4 text-center">
                                        <input class="btn btn-primary" style="width:100%" type="submit" value="Submit">
                                    </div>
                                    <div class="col-sm-4"></div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('javascripts')
<script type="text/javascript">
    function InstallmentSequence() {
        var schema = $('#schema').val();
        if (schema === 'daily') {
            $('#duration').val(1);
        } else if (schema === 'weekly') {
            $('#duration').val(7);
        } else if (schema === 'half_month') {
            $('#duration').val(15);
        } else if (schema === 'monthly') {
            $('#duration').val(30);
        }
    }
</script>
<script type="text/javascript">
    // Interest and calculate total amount with invest and interest
    $("#invest, #interest").keyup(function () {
        var invest = $('#invest').val();
        var savigns = $('#savings').val();

        $("#percent").val(parseFloat($("#interest").val() * 100 / parseFloat($("#invest").val())).toFixed(2));
        $("#total").val(parseInt($("#interest").val()) + parseInt($("#invest").val()));

        // Calculate fee amount 2% of invest amount
        $("#open_fee").val(parseInt(invest * 2 / 100));
        // Calculate fee amount 1% of invest amount
        $("#insurance_fee").val(parseInt(invest * 1 / 100));

        // show the general message if the savings amount is atleast 10% invest amount
        console.log(savigns);
        if (parseFloat(savigns) >= parseFloat(invest * 0.1)) {
            $('#msgGeneralAcLoan').css('display', 'none');
        } else {
            $('#msgGeneralAcLoan').text('আপনার General Account এ আবেদন কৃত লোন এর ১০% থেকে কম সঞ্চয় আছে।');
            $('#msgGeneralAcLoan').css('display', 'block');

        }
    });
    $("#percent").keyup(function () {
        $("#interest").val(parseInt($("#invest").val() * $("#percent").val() / 100));
        $("#total").val(parseInt($("#interest").val()) + parseInt($("#invest").val()));
    });

    // Calculate per installment amount
    $("#installment").keyup(function () {
        $("#installment_amount").val(parseInt($("#total").val() / $("#installment").val()));
    });

    // Generate expire date
    $("#date, #installment, #duration, #start").change(function () {
        if ($("#date").val() == "") {
            var d = new Date();
            var formDate = d.getFullYear() + '-' + parseInt(d.getMonth() + 1) + '-' + d.getDate();
        } else {
            var formDate = $("#date").val()
        }

        var schema = $('#schema').val();
        if (schema === 'daily') {
            var addition = parseInt($("#installment").val()) * parseInt($("#duration").val()) + parseInt($("#start").val()) - 1;
        } else if (schema === 'weekly') {
            var addition = parseInt($("#installment").val()) * parseInt($("#duration").val()) + parseInt($("#start").val());
        } else if (schema === 'half_month') {
            var addition = parseInt($("#installment").val()) * parseInt($("#duration").val()) + parseInt($("#start").val());
        } else if (schema === 'monthly') {
            var addition = parseInt($("#installment").val()) * parseInt($("#duration").val()) + parseInt($("#start").val());
        }


        var holiday_active = '0';

        if (holiday_active == 1) {
            if (formDate) { //addition &&

                $.ajax({
                    type: 'POST',
                    url: "https://app.bluestarsomithi.com/panel/ajax/get-holiday",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'formDate': formDate,
                        'currentAddition': addition,
                        'schema': schema
                    },
                    success: function (data) {
                        //expire day create with holiday calculation
                        var obj = JSON.parse(data);
                        console.log(obj);

                        addition += parseInt(obj);
                        var newdate = new Date(formDate);
                        newdate.setDate(newdate.getDate() + addition);
                        var dd = newdate.getDate();
                        var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"];
                        var mm = monthNames[newdate.getMonth()];
                        var y = newdate.getFullYear();
                        var expire = dd + '-' + mm + '-' + y;

                        if (formDate != "" & $("#invest").val() != "" & $("#installment").val() != "" & $("#duration").val() != "" & $("#start").val() != "") {
                            $("#expire").val(expire);
                        } else {
                            $("#expire").val(expire);
                        }
                    }
                });
            }
        } else {
            //expire day create without holiday calculation
            var newdate = new Date(formDate);
            newdate.setDate(newdate.getDate() + addition);
            var dd = newdate.getDate();
            var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"];
            var mm = monthNames[newdate.getMonth()];
            var y = newdate.getFullYear();
            var expire = dd + '-' + mm + '-' + y;

            if (formDate != "" & $("#invest").val() != "" & $("#installment").val() != "" & $("#duration").val() != "" & $("#start").val() != "") {
                $("#expire").val(expire);
            }
        }


        // var addition = parseInt($("#installment").val()) * parseInt($("#duration").val()) + parseInt($("#start").val());
        // var newdate = new Date(formDate);
        // newdate.setDate(newdate.getDate() + addition);
        // var dd = newdate.getDate();
        // var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"];
        // var mm = monthNames[newdate.getMonth()];
        // var y = newdate.getFullYear();
        // var expire = dd + '-' + mm + '-' + y;

        // if (formDate != "" & $("#invest").val() != "" & $("#installment").val() != "" & $("#duration").val() != "" & $("#start").val() != "") {
        //     $("#expire").val(expire);
        // }
    });

    $("#loan_durations").change(function () {
        var loan_duration = $('#loan_duration').val();
        // console.log(loan_duration);
        if ($("#date").val() == "") {
            var d = new Date();
            var formDate = d.getFullYear() + '-' + parseInt(d.getMonth() + 1) + '-' + d.getDate();
        } else {
            var formDate = $("#date").val()
        }

        var addition = parseInt($("#loan_duration").val()) + parseInt($("#start").val());
        var newdate = new Date(formDate);
        newdate.setDate(newdate.getDate() + addition);
        var dd = newdate.getDate();
        var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"];
        var mm = monthNames[newdate.getMonth()];
        var y = newdate.getFullYear();
        var expire = dd + '-' + mm + '-' + y;

        if (formDate != "" & $("#loan_duration").val() != "") {
            $("#expire").val(expire);
        } else {
            $("#expire").val('');
        }
    });

    // Show hide deposit with installment
    $('document').ready(function () {
        if ($('#one').is(':checked')) {
            $(".deposit").show('slow');
            $("#deposit_amount, #initial_deposit").attr('required', true);
            $("#penalty_saving").attr('disabled', false);
        }
        $("#one").click(function () {
            $(".deposit").show('slow');
            $("#deposit_amount, #initial_deposit").attr('required', true);
            $("#penalty_saving").attr('disabled', false);
        });
        $("#zero").click(function () {
            $(".deposit").hide('slow');
            $("#deposit_amount, #initial_deposit").attr('required', false);
            $("#penalty_saving").attr('disabled', true);
        })
    })
</script>
<script type="text/javascript">

    var reference = 1;
    $('#add-reference').click(function () {
        ++reference;
        $(".reference-box.sample").clone().removeClass('sample hidden').addClass('' + reference).insertAfter(".col-sm-2 div.reference-box:last");

        $(".reference-box." + reference + " h5").html('Reference ' + reference);
        $(".reference-box." + reference + " .modal-button").attr('data-target', '#person' + reference);
        $(".reference-box." + reference + " .modal").attr('id', 'person' + reference);
        $(".reference-box." + reference + " .member-button").attr('onclick', 'memberPick(' + reference + ')');
        $(".reference-box." + reference + " .accountInputId").attr('id', 'accountNumber' + reference);
        $(".reference-box." + reference + " .checkMember").attr('onclick', 'checkMember(' + reference + ')');
        $(".reference-box." + reference + " .goBack").attr('onclick', 'goBack(' + reference + ')');

        $(".reference-box." + reference + " .reference-new input").each(function () {
            $(this).attr('id', 'reference' + reference + $(this).attr('name'));
            $(this).attr('name', 'reference[' + reference + '][' + $(this).attr('name') + ']');
        });
        $(".reference-box." + reference + " .reference-new label").each(function () {
            $(this).attr('for', 'reference' + reference + $(this).attr('for'));
        });
        $(".reference-box." + reference + " .reference-new button").attr('onclick', 'referenceSubmit(' + reference + ')');

        $('.reference-add').hide();

    });

    function memberPick(reference) {
        $(".reference-box." + reference + " .reference-member").removeClass('hidden');
        $(".reference-box." + reference + " .reference-button").addClass('hidden');
    }

    function goBack(reference) {
        $(".reference-box." + reference + " .reference-member").addClass('hidden');
        $(".reference-box." + reference + " .reference-button").removeClass('hidden');
    }

    function checkMember(reference) {
        var csrf = $('input[name="_token"]').val();
        var account = $("#accountNumber" + reference);
        $.ajax({
            type: "POST",
            url: "https://app.bluestarsomithi.com/panel/ajax/reference/3",
            data: {
                '_token': csrf, 'account': account.val()
            },
            success: function (data) {
                var response = JSON.parse(data);
                if (response.success != false) {

                    $(".reference-box." + reference + " .reference-info .accountId").val(response.info.memberId).attr('name', 'reference[' + reference + '][id]');
                    $(".reference-box." + reference + " .reference-info .accountRelation").val($(".reference-box." + reference + " .reference-member .accountInputRelation").val()).attr('name', 'reference[' + reference + '][relation]');

                    $(".reference-box." + reference + " .reference-info .accountNumber").html(response.info.account);
                    $(".reference-box." + reference + " .reference-info .accountName").html(response.info.name);
                    $(".reference-box." + reference + " .reference-info .accountMobile").html(response.info.mobile);
                    $(".reference-box." + reference + " .reference-info").removeClass('hidden');
                    $(".reference-box." + reference + " .reference-button").addClass('hidden').remove();
                    $(".reference-box." + reference + " .reference-member").addClass('hidden').remove();

                    $(".reference-box." + reference + " .col").addClass('success');

                    if (reference < 5) {
                        $('.reference-add').show();
                    }

                } else {
                    alert(response.message);
                }
            }
        });

    }

    function referenceSubmit(reference) {

        var valid = true;

        $(".reference-box." + reference + " .reference-new input").filter('[required]:visible').each(function () {
            if ($(this).val() == "") {
                $(this).attr('style', 'border-color: red');
                valid = false;
            } else {
                $(this).removeAttr('style');
            }
        });
        if (valid) {
            var name = $("#reference" + reference + "name").val();
            var mobile = $("#reference" + reference + "mobile").val();

            $('#person' + reference + '.modal').modal('toggle');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();

            $(".reference-box." + reference + " .reference-info .accountInput").remove();

            $(".reference-box." + reference + " .reference-info .accountNumber").html('New Person');
            $(".reference-box." + reference + " .reference-info .accountName").html(name);
            $(".reference-box." + reference + " .reference-info .accountMobile").html(mobile);
            $(".reference-box." + reference + " .reference-info").removeClass('hidden');
            $(".reference-box." + reference + " .reference-button").addClass('hidden');
            $(".reference-box." + reference + " .reference-member").remove();
            $(".reference-box." + reference + " .col").addClass('success');


            if (reference < 5) {
                $('.reference-add').show();
            }
        }

    }

    $('#close-reference').click(function () {
        $(this).closest('.col-sm-2').remove();
    })
</script>
@endpush
