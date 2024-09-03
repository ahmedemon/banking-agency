@extends('layouts.frontend.report')
@section('report_page')
    <div class="layout-w container mt-5">
        <div class="content-box ">
            <div class="all-wrapper">
                <div class="layout-w">
                    <div class="content-box">
                        <div class="row" style="background-color: lightgrey; padding: 10px 0; border-radius: 15px 15px 0 0">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-3" style="width: 20%">
                                        <img style="display: block; margin: auto;" alt="LOGO" src="{{ asset('images/logo.png') }}" height="60">
                                    </div>
                                    <div class="col-sm-6 text-center" style="width: 60%">
                                        <div style="font-weight: bolder; font-size: 24px; line-height: 24px">ব্লু স্টার সঞ্চয় ও ঋণ দান সমবায় সমিতি</div>
                                        <div>বেকারত্ব আর দারিদ্রের দুর্বিপাকে কর্মমুখী করবো মোরা জগৎটাকে</div>
                                        <div style="font-size: 14px"></div>
                                        <div style="font-size: 12px">

                                        </div>
                                    </div>
                                    <div class="col-sm-3 text-right" style="width: 10%">
                                        <p style="position:relative;bottom:0;"></p>
                                        <style type="text/css">
                                            @media print {
                                                #backbtn {
                                                    display: none;
                                                }
                                            }
                                        </style>
                                        <input id="backbtn" type="button" value="Go Back" onclick="window.history.back()">
                                        <style type="text/css">
                                            @media print {
                                                #printbtn {
                                                    display: none;
                                                }
                                            }
                                        </style>
                                        <input id="printbtn" type="button" value="Print" onclick="window.print();">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row border">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                                <div class="element-box-tp">
                                    <div class="row">
                                        <table class="table table-sm table-bordered">
                                            <tbody style="font-size: 12px">
                                                <tr>
                                                    <td colspan="4" class="text-center border-dark">
                                                        <h5>FDR Statement Report</h5>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="10%" class="p-0 border-dark text-center">1</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">Member Name</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">Azadul</td>
                                                </tr>
                                                <tr>
                                                    <td width="10%" class="p-0 border-dark text-center">2</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">Account No</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">560</td>
                                                </tr>
                                                <tr>
                                                    <td width="10%" class="p-0 border-dark text-center">3</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">Area</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">Uttara Area</td>
                                                </tr>
                                                <tr>
                                                    <td width="10%" class="p-0 border-dark text-center">4</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">Scheme</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">০৫ বৎসর মেয়াদী</td>
                                                </tr>
                                                <tr>
                                                    <td width="10%" class="p-0 border-dark text-center">5</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">Opening date</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">01-07-2021</td>
                                                </tr>
                                                <tr>
                                                    <td width="10%" class="p-0 border-dark text-center">6</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">Closeing date</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">01-07-2026</td>
                                                </tr>
                                                <tr>
                                                    <td width="10%" class="p-0 border-dark text-center">7</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">Amoun Of FDR</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">1000000</td>
                                                </tr>
                                                <tr>
                                                    <td width="10%" class="p-0 border-dark text-center">9</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">Monthly Profit</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">150000</td>
                                                </tr>
                                                <tr>
                                                    <td width="10%" class="p-0 border-dark text-center">10</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">Profit Get</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">535000</td>
                                                </tr>
                                                <tr>
                                                    <td width="10%" class="p-0 border-dark text-center">11</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">Fixed Profit</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark"></td>
                                                </tr>
                                                <tr>
                                                    <td width="10%" class="p-0 border-dark text-center">12</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">Profit Withdraw</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">0</td>
                                                </tr>
                                                <tr>
                                                    <td width="10%" class="p-0 border-dark text-center">13</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">Current Profit Balance</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">535000</td>
                                                </tr>
                                                <tr>
                                                    <td width="10%" class="p-0 border-dark text-center">14</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">Status</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">1</td>
                                                </tr>
                                                <tr>
                                                    <td width="10%" class="p-0 border-dark text-center">15</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">Note</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">0</td>
                                                </tr>
                                                <tr>
                                                    <td width="10%" class="p-0 border-dark text-center">16</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">Cheque</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">0</td>
                                                </tr>
                                                <tr>
                                                    <td width="10%" class="p-0 border-dark text-center">17</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">Last Transaction</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">
                                                        N/A
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="10%" class="p-0 border-dark text-center">18</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">process by</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">Mahfuz Akand</td>
                                                </tr>
                                                <tr>
                                                    <td width="10%" class="p-0 border-dark text-center">19</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">Account Created</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">16-10-2021</td>
                                                </tr>
                                                <tr>
                                                </tr>
                                                <tr>
                                                    <td width="10%" class="p-0 border-dark text-center">20</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">Closed at</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">
                                                        N/A
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="10%" class="p-0 border-dark text-center">21</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">Unique FDR ID</td>
                                                    <td width="45%" class="py-0 pr-0 pl-4 border-dark">33</td>
                                                </tr>

                                            </tbody>
                                            <tfoot>

                                            </tfoot>
                                        </table>


                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="element-box-tp">
                                    <div class="row">
                                        <table class="table table-sm table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Date</th>
                                                    <th>Note</th>
                                                    <th>Previous Amount</th>
                                                    <th>Withdraw</th>
                                                    <th>Balance</th>

                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr style="font-size: 12px">
                                                    <td class="text-left py-0 pr-0 pl-1" colspan="3"> Total: </td>
                                                    <td class="text-left py-0 pr-0 pl-1" style="font-weight: bold">0</td>
                                                    <td class="text-left py-0 pr-0 pl-1" style="font-weight: bold">0</td>
                                                    <td class="text-left py-0 pr-0 pl-1" style="font-weight: bold">0</td>
                                                </tr>
                                            </tfoot>
                                        </table>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="col-sm-12">
                            <tbody class="initialism">
                                <tr class="small font-italic font-weight-bold">
                                    <td><br><br>Prepared by</td>
                                    <td class="text-center"><br><br>Verified by</td>
                                    <td class="text-right"><br><br>Approved by</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
