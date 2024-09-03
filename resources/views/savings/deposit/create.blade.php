@extends('layouts.frontend.app', ['pageTitle'=>'All Savings Account'])

@push('style')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

@endpush

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
                            <form method="POST" action="{{ route('savings.deposit.store') }}"
                                accept-charset="UTF-8" note="Are you sure about all information and amount are OK?"> @csrf
                                <input name="savings_id" type="hidden" value="{{ $savings->id }}">
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4">
                                        <div class="form-group row">
                                            <label for="date" class="col-form-label col-sm-4">Date</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" name="date" type="date" id="date" value="{{ date('Y-m-d') }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="installment" class="col-form-label col-sm-4">DPS
                                                Installment</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center"
                                                    placeholder="Something error. Please refresh page" disabled=""
                                                    name="Installment" type="number" value="{{ $savings->savings_amount }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="received" class="col-form-label col-sm-4">Total Received</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center"
                                                    placeholder="Something error. Please refresh page" disabled=""
                                                    name="received" type="number" value="{{ $savings->total_deposit }}" id="received">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="deposit" class="col-form-label col-sm-4">Today's Deposit</label>
                                            <div class="col-sm-8">

                                                <input class="form-control text-center mainAmount border-primary border-2" autofocus=""
                                                    name="deposit" type="number" id="deposit" required value="{{ $savings->savings_amount }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group row">
                                            <label for="balance" class="col-form-label col-sm-4">Balance</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center"
                                                    placeholder="Something error. Please refresh page" disabled=""
                                                    name="balance" type="number" value="{{ $savings->balance }}" id="balance">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="due" class="col-form-label col-sm-4">Previous Due</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" disabled="" name="due" type="number"
                                                    value="{{ $savings->due }}" id="due">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="penalty" class="col-form-label col-sm-4">Fine</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" name="penalty" type="number"
                                                    value="0" id="penalty">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="note" class="col-form-label col-sm-4">Details</label>
                                            <div class="col-sm-8">
                                                <input class="form-control text-center" placeholder="Deposit notes"
                                                    name="note" type="text" id="note">
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>
                                <div>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-8">
                                        <div class="row">

                                            <div class="col-sm-12 text-center">
                                                <input class="btn btn-primary btn-block" type="submit" value="Submit">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
