@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                {{-- @if ($errors->count())
                    {{ $errors }}
                @endif --}}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <div class="row border">
                                <div class="col-sm-9 border">
                                    <table class="table table-sm table-striped ">
                                        <tbody>
                                            <tr>
                                                <td>Account</td>
                                                <td>:</td>
                                                <td>{{$member->account}}</td>
                                            </tr>
                                            <tr>
                                                <td>Area</td>
                                                <td>:</td>
                                                <td colspan="4">{{$member->area->name}}</td>
                                            </tr>
                                            <tr>
                                                <td>Name</td>
                                                <td>:</td>
                                                <td colspan="4">{{$member->m_name}}</td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td>:</td>
                                                <td colspan="4">{{$member->address }}</td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td>:</td>
                                                <td>{{$member->m_mobile}}</td>
                                            </tr>
                                            <tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-3 text-center" style="background: #D5D543 ">
                                    <img id="photoF" src="{{asset($member->photo)}}" style="max-height:180px; max-width:300px;" class="text-center">
                                    <img id="signatureF" src="{{ asset('storage/uploads/member' . $member->signature) }}" style="max-height:180px; max-width:300px; display: none;" class="text-center">
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
                            <form method="POST" action="{{ route('fixed-deposit.store') }}" accept-charset="UTF-8"
                                    note="Press OK to create FDR account using following information."
                                    enctype="multipart/form-data" novalidate>
                                @csrf
                                <input type="hidden" name="account" hidden value="{{ $member->account }}">
                                <input name="scheme_id" type="hidden" value="{{ $fixed_diposit_scheme->id }}">
                                <div class="row">
                                    <div class="col-sm-6 offset-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="date" class="col-form-label col-sm-12">Starting Date</label>
                                                <div class="">
                                                    <input class="form-control text-center" placeholder="No need to select date for Today" name="starting_date" value="{{ old('starting_date') }}" type="date" id="starting_date">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="date" class="col-form-label col-sm-12">Ending Date</label>
                                                <div class="">
                                                    <input class="form-control text-center" placeholder="No need to select date for when is your diposit will end" name="ending_date" value="{{ old('ending_date') }}" type="date" id="ending_date">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label for="months" class="col-form-label col-sm-4">Duration in month</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center shadow-none" placeholder="Something error. Please reload" name="months" type="number" value="12" id="months">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="amount" class="col-form-label col-sm-4">FDR Amount</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center mainAmount" placeholder="Amount of FDR" required="" autofocus="" name="amount" value="{{ old('amount') }}" type="number" id="amount">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="profit" class="col-form-label col-sm-4">Profit (Monthly)</label>
                                            <div class="col-sm-4 input-group">
                                                <input id="percent" class="form-control text-center" placeholder="Profit in percent" name="percent" type="number" value="{{$fixed_diposit_scheme->profit}}">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">%</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 input-group">
                                                <input class="form-control text-center" placeholder="Profit for this duration" required="" name="profit" value="{{ old('profit') }}" type="number" id="profit">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">৳</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="profit" class="col-form-label col-sm-4">Profit for TotalTime</label>
                                            <div class="col-sm-8 input-group">
                                                <input class="form-control text-center" placeholder="Profit for total duration" required="" type="number" id="total_profit" disabled>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">৳</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="note" class="col-form-label col-sm-4">Note</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control text-center" placeholder="Information with this FDR to be remember or Blank" rows="2" name="note" value="{{ old('note') }}" cols="50" id="note"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="note" class="col-form-label col-sm-4">Attachment</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" placeholder="Attachment file" capture="" name="capture" value="{{ old('capture') }}" type="file">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="note" class="col-form-label col-sm-4">Attachment 2</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" placeholder="Attachment file 2" capture2="" name="capture2" value="{{ old('capture2') }}" type="file">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="cheque" class="col-form-label col-sm-4">Cheque number</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control text-center" placeholder="Cheque number" rows="1" name="cheque" value="{{ old('cheque') }}" cols="50" id="cheque"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5"></div>
                                    <div class="col-sm-4">
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <input class="btn btn-primary w-100 btn-lg" type="submit" value="Submit">
                                            </div>
                                        </div>
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
<script type="text/javascript">
    $(document).ready(function () {
        $("#profit").val($("#amount").val() * $("#percent").val() / 100);
        $("#total_profit").val(($("#amount").val() * $("#percent").val() / 100) * $("#months").val());
    });
    $("#amount, #percent").bind("keyup change", function () {
        $("#profit").val(parseInt($("#amount").val() * $("#percent").val() / 100));
        $("#total_profit").val(($("#amount").val() * $("#percent").val() / 100) * $("#months").val());
    });
    $("#profit").bind("keyup change", function () {
        $("#percent").val(($("#profit").val() / $("#amount").val() * 100).toFixed(2));
    });
</script>
@endsection
