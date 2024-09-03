@extends('layouts.frontend.app',['pageTitle'=>'New DPS account'])
@section('content')
    <div class="content-w">
        <style>
            .mainAmount {
                font-style: normal;
                font-size: 36px;
                font-weight: bold;
                color: green;
                padding: 0 12px !important;
            }

        </style>
        <div class="content-i">
            <div class="content-box">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <div class="row">
                                <div class="col-sm-12 col-lg-8 mx-lg-auto">
                                    <div class="row border">
                                        <div class="col-sm-9 border">
                                            <table class="table table-sm table-striped my-2">
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
                                                        <td>{{ $member->m_phone }}</td>
                                                    </tr>

                                                    <tr>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            @if ($num_savings != 0)
                                                <div class="row">
                                                    <div class="col-md-6 mx-auto">
                                                        <p class="alert alert-warning text-center">
                                                            This user has {{ $num_savings }} active savings.
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-sm-3 text-center bg-light">
                                            <img id="photoF" src="{{ asset($member->photo) }}"
                                                style="max-height:180px; max-width:300px;" class="text-center">
                                            @if (!empty($member->m_signature))
                                                <img id="signatureF"
                                                    src="{{ asset('storage/members/' . $member->m_signature) }}"
                                                    style="max-height:180px; max-width:300px; display: none;"
                                                    class="text-center">
                                            @endif
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
                    </div>
                </div>

                <div class="row">




                    <div class="col-sm-12">
                        <div class="element-box">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form method="POST" action="{{ route('savings.store') }}" accept-charset="UTF-8"
                                        note="Are you sure about all information and amount are OK?">
                                        @csrf
                                        <input name="account_id" type="hidden" value="{{ $member->account }}">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="date" class="col-form-label col-sm-4">Date of entry</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" name="start_date" type="date"
                                                            id="date" value="{{ date('Y-m-d') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="opening_charge" class="col-form-label col-sm-4">Monthly
                                                        Savings
                                                        Opening Charge</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control"
                                                            placeholder="DPS Opening Charge" value="100"
                                                            name="opening_charge" type="number" id="opening_charge">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="scheme" class="col-form-label col-sm-4">DPS
                                                        Scheme</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" require="" id="scheme"
                                                            name="scheme_id">
                                                            <option selected="selected" value="">Select any Scheme</option>
                                                            @foreach ($schemes as $scheme)
                                                                <option value="{{ $scheme->id }}">{{ $scheme->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="start" class="col-form-label col-sm-4">Start After
                                                        (Days)</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control"
                                                            placeholder="Start installment after days" name="start_after"
                                                            type="number" value="0" id="start">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="savings" class="col-form-label col-sm-4">Amount per
                                                        installment</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control mainAmount"
                                                            placeholder="Savings per installment in amount" required=""
                                                            min="1" autofocus="" name="savings_amount" type="number"
                                                            id="savings">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="leger" class="col-form-label col-sm-4">Leger No</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" placeholder="Input Leger Number" readonly
                                                            name="ledger_no" type="number" id="ledger" value="{{ $member->account }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="installment" class="col-form-label col-sm-4">Number of
                                                        installment</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control"
                                                            placeholder="Number if installment will continue" required=""
                                                            name="installment" type="number" id="installment">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="sequence" class="col-form-label col-sm-4">Installment
                                                        Sequence</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control disabled"
                                                            placeholder="Select DPS Scheme First" disabled
                                                            type="number" id="sequence">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="interest" class="col-form-label col-sm-4">Interest % | ৳</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input step="any" id="percent" class="form-control"
                                                    placeholder="Input in percent" min="0" max="300" name="interest_percent"
                                                    type="number" value="0">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <input class="form-control" placeholder="Input in number" required=""
                                                name="interest" type="number" value="0" id="interest">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="total" class="col-form-label col-sm-4">Total Amount</label>
                                        <div class="col-sm-8">
                                            <input class="form-control  disabled"
                                                placeholder="Input installment amount and installment number" disabled
                                                type="number" id="total">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="penalty" class="col-form-label col-sm-4">Fine per missed
                                            Installment</label>
                                        <div class="col-sm-8">
                                            <input class="form-control disabled"
                                                placeholder="If miss to submit installment fine will apply" required=""
                                                name="penalty" type="number" value="0" id="penalty">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="expire" class="col-form-label col-sm-4">Expire Date</label>
                                        <div class="col-sm-8">
                                            <input class="form-control disabled"
                                                placeholder="Fill up sequence and start date" readonly name="expire_date"
                                                type="text" id="expire">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="holiday" class="col-form-label col-sm-4">Apply Holiday</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" required="" id="holiday" name="holiday">
                                                <option value="1" {{ old('holiday', 1) == 1 ? 'selected' : '' }}>Apply
                                                    Holiday</option>
                                                <option value="0" {{ old('holiday') == 0 ? 'selected' : '' }}>Holiday Not
                                                    Apply</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6"></div>
                            </div>
                            <div>
                                <br>
                                <hr>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <input class="btn btn-primary w-50 btn-lg" type="submit" value="Submit">
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

@push('javascripts')

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

    <script type="text/javascript">
        // Interest and calculate total amount with invest and interest
        $("#savings, #installment, #interest").bind("keyup change", function() {
            var saveTotal = parseInt($("#savings").val()) * parseInt($("#installment").val());
            $("#percent").val(parseFloat($("#interest").val() * 100 / parseFloat(saveTotal)).toFixed(2));
            $("#total").val(parseInt(saveTotal) + parseInt($("#interest").val()));
        });

        // $("#interest").bind('keyup change', function () {
        //     $("#percent").val(parseFloat($("#interest").val() * 100 / parseFloat(saveTotal)).toFixed(2));
        // })

        $("#percent").keyup(function() {
            var saveTotal = parseInt($("#savings").val()) * parseInt($("#installment").val());
            $("#interest").val($(this).val() * saveTotal / 100);
            $("#total").val(saveTotal + parseInt($("#interest").val()));
        });

        // Generate expire date
        $("#date, #start, #sequence, #installment, #scheme").bind("keyup change", function() {
            if ($("#date").val() == "") {
                var d = new Date();
                var formDate = d.getFullYear() + '-' + parseInt(d.getMonth() + 1) + '-' + d.getDate();
            } else {
                var formDate = $("#date").val()
            }
            var addition = parseInt($("#start").val()) + parseInt($("#installment").val()) * parseInt($("#sequence")
                .val());
            var newdate = new Date(formDate);
            newdate.setDate(newdate.getDate() + addition);
            var dd = newdate.getDate();
            var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"];
            var mm = monthNames[newdate.getMonth()];
            var y = newdate.getFullYear();
            var expire = dd + '-' + mm + '-' + y;

            if (formDate != "" & $("#start").val() != "" & $("#installment").val() != "" & $("#sequence").val() !=
                "") {
                $("#expire").val(expire);
            }
        });

        $(function() {
            $("#scheme").change(function() {
                $.post('{{ route('ajax.scheme.sequence') }}', {
                    '_token': "{{ csrf_token() }}",
                    'id': $("#scheme").val(),
                }, function(data) {
                    if (data) {
                        $("#sequence").val(data);
                    } else {
                        $("#sequence").val("Not found");
                    }
                });
            });
        });
    </script>
@endpush
