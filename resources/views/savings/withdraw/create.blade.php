@extends('layouts.frontend.app', ['pageTitle'=>'All Savings Account'])

@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                        <div class="row">
                            <div class="col-sm-8 mx-auto">
                                <div class="row border">
                                    <div class="col-sm-9 border">
                                        <table class="table table-sm table-striped ">
                                            <tbody>
                                                <tr>
                                                    <td>Account</td>
                                                    <td>{{ $savings->member->account }}</td>
                                                </tr>

                                                <tr>
                                                    <td>Area</td>
                                                    <td colspan="4">{{ $savings->member->area->name }}</td>
                                                </tr>

                                                <tr>
                                                    <td>Name</td>
                                                    <td colspan="4">{{ $savings->member->m_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Address</td>
                                                    <td colspan="4">{{ $savings->member->address }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Phone</td>
                                                    <td>{{ $savings->member->m_mobile }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-sm-3 text-center bg-light">
                                        <img id="photoF" src="{{ asset($savings->member->photo) }}"
                                            style="max-height: 180px; max-width: 300px;" class="text-center">
                                        <img id="signatureF" src="{{ asset('storage/member/' . $savings->member->m_signature) }}"
                                            style="max-height: 180px; max-width: 300px; display: none;" class="text-center">
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
                            <form method="POST" action="{{ route('savings.withdraw.store') }}" accept-charset="UTF-8" note="Are you sure to withdraw from this DPS account." enctype="multipart/form-data">
                            @csrf
                            <input name="savings_id" type="hidden" value="{{ $savings->id }}">
                            <input name="account_id" type="hidden" value="{{ $savings->account_id }}">
                            {{-- <input id="target" name="target" type="hidden" value="90000"> --}}
                            @if ($days != 365)
                                <div class="row">
                                    <div class="col-md-6 offset-3">
                                        <p class="mb-4 alert alert-warning text-dark">
                                            <strong>Remember : </strong>Your DPS duration is less than one year. If you withdraw now, you'll not get any profit.
                                        </p>
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">

                                    <div class="form-group row">
                                        <label for="loan_due" class="col-form-label col-sm-4">Loan Due</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center bg-danger text-white" id="loan_due" step="any"
                                            placeholder="N/A" disabled="" name="loan_due" type="text" value="{{ $savings->member->loans()->sum('loan_amount') }}">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="balance" class="col-form-label col-sm-4">Total Deposit Balance</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center" placeholder="Something error. Please refresh page" disabled="" name="balance" type="number" value="{{ $savings->total_deposit }}" id="balance">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="receivable" class="col-form-label col-sm-4">Total Receivable</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center" placeholder="Something error. Please refresh page" disabled="" name="receivable" type="number" value="{{ $savings->balance }}" id="receivable">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="due" class="col-form-label col-sm-4">Due Amount</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center" placeholder="Something error. Please refresh page" disabled="" name="due" type="number" value="{{ $savings->target_amount - $savings->total_deposit }}" id="due">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="withdraw" class="col-form-label col-sm-4">Withdraw Amount</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center mainAmount" max="{{ $savings->balance }}" placeholder="Amount for withdraw" autofocus="" name="withdraw" type="number" value="{{ $savings->balance }}" id="withdraw">
                                        </div>
                                    </div>
                                                            <div class="form-group row">
                                        <label for="note" class="col-form-label col-sm-4">Withdraw Note</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center" placeholder="Withdrawal note will be here" name="note" type="text" id="note">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5"></div>
                                <div class="col-sm-4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input class="btn btn-primary" style="width: 100%" type="submit" value="Submit">
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
@endsection
