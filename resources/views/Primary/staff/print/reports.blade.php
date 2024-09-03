@extends('layouts.frontend.app')
@section('content')
    <div class="all-wrapper">
        <div class="layout-w">
            <div class="content-box">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

                <div class="row"
                    style="background-color: lightgrey; padding: 10px 0; border-radius: 15px 15px 0 0">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-3" style="width: 20%">
                                <img style="display: block; margin: auto;" src="{{asset('images/SquareLogo.jpg')}}" height="60">
                            </div>

                            <div class="col-sm-6 text-center" style="width: 60%">
                                <div style="font-weight: bolder; font-size: 24px; line-height: 24px">ব্লু স্টার সঞ্চয় ও ঋণ
                                    দান সমবায় সমিতি</div>
                                <div>বেকারত্ব আর দারিদ্রের দুর্বিপাকে কর্মমুখী করবো মোরা জগৎটাকে</div>
                                <div style="font-size: 14px">House 3, Road 9/B, Sector 5, Uttara, Dhaka</div>
                                <div style="font-size: 12px">
                                    <i class="fa fa-phone"></i> 01689655055 , 01670849008
                                    <i class="fa fa-envelope"></i> softwarebazar17@gmail.com
                                    <i class="fa fa-globe"></i> www.somitykeeper.com
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

                                <input id="backbtn" type="button" value="Go Back" onclick="history.back(-1)">

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

                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="element-header text-center">
                        </h6>
                        <!--------------------START - Table with actions-------------------->
                        <div class="table-responsive">

                            <table class="table table-bordered table-v2 table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Designation</th>
                                        <th>DOB</th>
                                        <th>Father Name</th>
                                        <th>NID</th>
                                        <th>Mobile</th>
                                        <th>Address</th>
                                        <th>Salary</th>
                                        <th>Join</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td>1</td>
                                        <td>SH Din Islam</td>
                                        <td>Field Officer</td>
                                        <td></td>
                                        <td>
                                            ---
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td>01846213453</td>
                                        <td></td>
                                        <td>7000</td>
                                        <td>29/06/2021</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <table class="col-sm-12">
                    <tbody>
                        <tr style="border: 0px; font-weight: bold">
                            <td><br><br>Prepared by</td>
                            <td class="text-center"><br><br>Verified by</td>
                            <td class="text-right"><br><br>Approved by</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
