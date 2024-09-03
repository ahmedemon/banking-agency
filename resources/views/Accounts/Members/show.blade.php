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
                                            <td>1400413784</td>
                                        </tr>

                                        <tr>
                                            <td>Area</td>
                                            <td colspan="4">Uttara Area</td>
                                        </tr>

                                        <tr>
                                            <td>Name</td>

                                            <td colspan="4">vodai</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td colspan="4">, , , </td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-3 text-center" style="background: #D5D543 ">
                                <img id="photoF" src="https://demo.oslbd.org/demo/Profile/default.png"
                                    style="max-height:180px; max-width:300px;" class="text-center">
                                <img id="signatureF" src="https://demo.oslbd.org/demo/Signature/default.png"
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


            <div class="container">

                <div class="row">
                    <div class="col-sm">
                        <a class="element-box el-tablo" style="background: #04157a" href="#">
                            <div class="label">Share Balance</div>
                            <div class="text-center custom">0 - ৳ </div>
                        </a>
                    </div>

                    <div class="col-sm">
                        <a class="element-box el-tablo" style="background: #E22800" href="#">
                            <div class="label">General Savings</div>
                            <div class="text-center custom">0 - ৳ </div>
                        </a>
                    </div>

                    <div class="col-sm">
                        <a class="element-box el-tablo" style="background: #00E20E" href="#">
                            <div class="label">Monthly Savings ( 0 Accounts )</div>
                            <div class="text-center custom"> 0 - ৳ </div>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm">
                        <a class="element-box el-tablo" style="background: #E5D108" href="#">
                            <div class="label">Loan Due</div>
                            <div class="text-center custom"> 0 - ৳ </div>
                        </a>
                    </div>

                    <div class="col-sm">
                        <a class="element-box el-tablo" style="background: #08C0E5" href="#">
                            <div class="label">FDR Balance</div>
                            <div class="text-center custom">0 - ৳ </div>
                        </a>
                    </div>

                    <div class="col-sm">
                        <a class="element-box el-tablo" style="background: #0D0002" href="#">
                            <div class="label">CC Loan</div>
                            <div class="text-center custom">0 - ৳ </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
