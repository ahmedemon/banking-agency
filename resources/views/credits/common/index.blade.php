@extends('layouts.frontend.app')


@push('style')
    <style>
        tbody *:not(.row-actions) {
            font-size: 0.8rem !important;
        }

    </style>
@endpush

@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-img-top">
                                    <div class="text-center" style="height: 180px">
                                        <img id="photoF" src="{{ asset($member->photo) }}"
                                            style="max-height:180px; max-width:300px;" class="text-center">
                                        <img id="signatureF"
                                            src="https://app.bluestarsomithi.com/demo/Signature/default.png"
                                            style="max-height:180px; max-width:300px; display: none;"
                                            class="text-center">
                                    </div>
                                    <script>
                                        $("#photoF").dblclick(function() {
                                            $("#photoF").hide().delay(5000).fadeIn();
                                            $("#signatureF").show().delay(4500).fadeOut();
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-title">
                                    <p class="text-center mb-0 pb-0">Member Name</p>
                                    <h5 class="text-center mt-0 pt-0">{{ $member->m_name }}</h5>
                                </div>
                                <table class="table table-sm">
                                    <tr class="table-success">
                                        <td class="text-right"><strong>Account</strong></td>
                                        <td>:</td>
                                        <td><strong class="text-danger">{{ $member->account }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Area</strong></td>
                                        <td>:</td>
                                        <td>{{ $member->area->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Address</strong></td>
                                        <td>:</td>
                                        <td>{{ $member->address }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Phone</strong></td>
                                        <td>:</td>
                                        <td>{{ $member->m_mobile }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <table class="table table-sm table-striped">
                            <tr></tr>
                        </table>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="row">

                            @include('credits.common.account.loan')
                            @include('credits.common.account.general')
                            @include('credits.common.account.dps')
                            @include('credits.common.account.current')

                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection
