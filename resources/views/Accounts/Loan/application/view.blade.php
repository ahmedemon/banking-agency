@extends('layouts.frontend.report')
@section('report_page')
    <div class="content-w container">
        <div class="content-i">
            <div class="all-wrapper">
                <div class="layout-w">
                    <div class="content-box bg-white">
                        <link href="https://app.bluestarsomithi.com/fox/css/maince5p.css?version=4.4.1" rel="stylesheet">
                        <style>
                            @media  print {
                                @page  {
                                    size: auto
                                }
                            }

                            .table-bordered td {
                                border: 1px solid black !important;
                            }

                            .table th, .table td {
                                padding: 0px;
                            }

                            h6 {
                                padding: 2px;
                            }

                            thead tr, tfoot tr {
                                font-weight: bold;
                            }
                            table td {
                                padding-left: 2px !important;
                                padding-right: 2px !important;
                            }
                            @media  only screen and (max-width: 720px) {
                                table {
                                    font-size: 10px !important;
                                }
                            }
                            @media  only screen and (min-width: 721px) {
                                table {
                                    font-size: 12px !important;
                                }
                            }
                        </style>
                        <style type="text/css">
                            /*@media  print { @page  { size: portrait } }*/
                            .tablestyle{
                                width: 10in;
                                margin: 0 auto;
                                border-collapse: collapse;
                                border: none;
                                mso-border-alt: solid windowtext 0.5pt;
                                mso-yfti-tbllook: 480;
                                mso-padding-alt: 0in 5.4pt 0in 5.4pt;
                                mso-border-insideh: 0.5pt solid windowtext;
                                mso-border-insidev: 0.5pt solid windowtext;
                            }
                            .tdtitlestyle{
                                width: 132.95pt;
                                border: solid windowtext 1pt;
                                border-top: none;
                                mso-border-top-alt: solid windowtext 0.5pt;
                                mso-border-alt: solid windowtext 0.5pt;
                                padding: 0in 5.4pt 0in 5.4pt;
                            }
                            .tdstyle{
                                width: 128.05pt;
                                border-top: none;
                                border-left: none;
                                border-bottom: solid windowtext 1pt;
                                border-right: solid windowtext 1pt;
                                mso-border-top-alt: solid windowtext 0.5pt;
                                mso-border-left-alt: solid windowtext 0.5pt;
                                mso-border-alt: solid windowtext 0.5pt;
                                padding: 0in 5.4pt 0in 5.4pt;
                            }
                        </style>
                        <style type="text/css">/* Chart.js */
                            @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style>
                        <link rel="stylesheet"
                            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                        <div class="row" style="background-color: lightgrey; padding: 10px 0; border-radius: 15px 15px 0 0">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-3" style="width: 20%">
                                        <img style="display: block; margin: auto;" alt="LOGO" src="https://app.bluestarsomithi.com/demo/SquareLogo.jpg" height="60">
                                    </div>

                                    <div class="col-sm-6 text-center" style="width: 60%">
                                        <div style="font-weight: bolder; font-size: 24px; line-height: 24px">সমিতি কিপার
                                            সঞ্চয় ও ঋণ দান সমবায় সমিতি</div>
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
                        <div class="Section1" style="margin: 0 auto;">
                            <p class="MsoNormal" align="center" style="text-align: center;">
                                <b style="mso-bidi-font-weight: normal;">
                                    <u>
                                        <span style="font-size: 14pt; mso-bidi-font-size: 12pt; font-family: SolaimanLipi;">
                                            ঋণের আবেদন ও অনুমোদন পত্র | Totally not Completed is site
                                        </span>
                                    </u>
                                </b>
                            </p>
                            <p class="MsoNormal">
                                <span style="font-size: 10pt; mso-bidi-font-size: 12pt; font-family: SolaimanLipi;">বরাবর, সভাপতি মহোদয়</span>
                            </p>
                            <p class="MsoNormal">
                                <span style="font-size: 10pt; mso-bidi-font-size: 12pt; font-family: SolaimanLipi;">
                                    আমি উক্ত প্রতিষ্ঠান পরিচালিত দারিদ্র্য বিমোচন কর্মসূচীর আওতাধীন সমিতির
                                    অধিক্ষেত্রাধীন এলাকার একজন নিয়মিত সদস্য/সদস্যা। এই সমিতি হতে ঋণ গ্রহণের নিমিত্তে আমি
                                    আমার বিস্তারিত তথ্যাদি নিন্মে উল্লেখ করিলামঃ
                                </span>
                            </p>
                            <br>
                            <table class="MsoNormalTable tablestyle border-top border-dark" border="2" cellspacing="7" cellpadding="8"
                                width="900">
                                <tbody>
                                    <tr>
                                        <td width="177" valign="top" class="tdtitlestyle">
                                            সদস্যের আই.ডি নম্বরঃ
                                        </td>
                                        <td width="171" colspan="2" valign="top" class="tdtitlestyle">
                                            {{$loan_application->member_id}}
                                        </td>
                                        <td width="156" colspan="5" valign="top" class="tdtitlestyle">
                                            সদস্যের বয়সঃ
                                        </td>
                                        <td width="192" colspan="3" valign="top" class="tdtitlestyle">
                                            {{$loan_application->member_age}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="177" valign="top" class="tdtitlestyle">
                                            সদস্যের নামঃ
                                        </td>
                                        <td width="171" colspan="2" valign="top" class="tdstyle">
                                            {{$loan_application->member_name}}
                                        </td>
                                        <td width="156" colspan="5" valign="top" class="tdstyle">
                                            বর্তমান ঠিকানাঃ
                                        </td>
                                        <td width="192" colspan="3" valign="top" class="tdstyle">
                                            {{$loan_application->current_address}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="177" valign="top" class="tdtitlestyle">
                                            পিতার নামঃ
                                        </td>
                                        <td width="171" colspan="2" valign="top" class="tdstyle">
                                            {{$loan_application->member_f_name}}
                                        </td>
                                        <td width="156" colspan="5" valign="top" class="tdstyle">
                                            স্থায়ী ঠিকানাঃ
                                        </td>
                                        <td width="192" colspan="3" valign="top" class="tdstyle">
                                            {{$loan_application->permanent_address}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="177" valign="top" class="tdtitlestyle">
                                            মাতার নামঃ
                                        </td>
                                        <td width="171" colspan="2" valign="top" class="tdstyle">
                                            {{$loan_application->member_m_name}}
                                        </td>
                                        <td width="156" colspan="5" valign="top" class="tdstyle">
                                            এন.আই.ডি নং
                                        </td>
                                        <td width="192" colspan="3" valign="top" class="tdstyle">
                                            {{$loan_application->member_nid}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="177" valign="top" class="tdtitlestyle">
                                            মোবাইল নং
                                        </td>
                                        <td width="171" colspan="2" valign="top" class="tdstyle">
                                            {{$loan_application->member_phone}}
                                        </td>
                                        <td width="156" colspan="5" valign="top" class="tdstyle">
                                            ব্যাংক হিসাব
                                        </td>
                                        <td width="192" colspan="3" valign="top" class="tdstyle">
                                            Blank
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="177" valign="top" class="tdtitlestyle">
                                            চাহিত লোনের বিস্তারিতঃ
                                        </td>
                                        <td width="519" colspan="10" valign="top" class="tdstyle">
                                            {{ $loan_application->expect_loan_details }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="177" valign="top" class="tdtitlestyle">
                                            হিসাবের ধরণঃ
                                        </td>
                                        <td width="171" colspan="2" valign="top" class="tdstyle">
                                            {{$loan_application->acount_type == 1 ? 'সুদযুক্ত হিসাব' : 'সুদবিহীন হিসাব'}}
                                        </td>
                                        <td width="108" colspan="3" valign="top" class="tdstyle">
                                            শেয়ার সংখ্যাঃ
                                        </td>
                                        <td width="240" colspan="5" valign="top" class="tdstyle">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="177" valign="top" class="tdtitlestyle">
                                            যোগদানের তারিখঃ
                                        </td>
                                        <td width="171" colspan="2" valign="top" class="tdstyle">

                                        </td>
                                        <td width="108" colspan="3" valign="top" class="tdstyle">
                                            বিনিয়োগের ধরণঃ
                                        </td>
                                        <td width="240" colspan="5" valign="top" class="tdstyle">
                                            ৫ বছর ভিত্তিক
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="177" rowspan="9" valign="top" class="tdtitlestyle">
                                            সদস্যদের পেশাঃ

                                        </td>
                                        <td width="171" colspan="2" valign="top" class="tdstyle">
                                            Job
                                        </td>
                                        <td width="348" colspan="8" valign="top" class="tdstyle">
                                            Business
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="171" colspan="2" rowspan="3" class="tdstyle">
                                            সরকারি চাকুরী/ স্বায়ত্বশাসিত /আধা সরকারি/ ব্যাংক /বেসরকারি চাকুরী / ব্যবসা:
                                        </td>
                                        <td width="41" colspan="2" rowspan="3" valign="top" class="tdstyle">
                                            সরকারি চাকুরী
                                        </td>
                                        <td width="177" colspan="5" valign="top" class="tdstyle">
                                            ব্যবসায়ের ধরন-
                                        </td>
                                        <td width="130" valign="top" class="tdstyle">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="177" colspan="5" valign="top" class="tdstyle">
                                            প্রতিষ্ঠানের নাম
                                        </td>
                                        <td width="130" valign="top" class="tdstyle">
                                            sk builders
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="177" colspan="5" valign="top" class="tdstyle">
                                            ভাড়া না নিজস্ব প্রতিষ্ঠান-
                                        </td>
                                        <td width="130" valign="top" class="tdstyle">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="171" colspan="2" valign="top" class="tdstyle">
                                            প্রতিষ্ঠানের নাম-
                                        </td>
                                        <td width="41" colspan="2" valign="top" class="tdstyle">

                                        </td>
                                        <td width="177" colspan="5" valign="top" class="tdstyle">
                                            একক না যৌথ মালিকানা-
                                        </td>
                                        <td width="130" valign="top" class="tdstyle">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="171" colspan="2" valign="top" class="tdstyle">
                                            পদবী-
                                        </td>
                                        <td width="41" colspan="2" valign="top" class="tdstyle">
                                            স্টাফ
                                        </td>
                                        <td width="177" colspan="5" valign="top" class="tdstyle">
                                            ১ম ট্রেড লাইসেন্স ইস্যুর তারিখ-
                                        </td>
                                        <td width="130" valign="top" class="tdstyle">


                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="171" colspan="2" valign="top" class="tdstyle">
                                            মোট আয়ুষকাল-
                                        </td>
                                        <td width="41" colspan="2" valign="top" class="tdstyle">
                                            5
                                        </td>
                                        <td width="177" colspan="5" valign="top" class="tdstyle">

                                        </td>
                                        <td width="130" valign="top" class="tdstyle">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="171" colspan="2" valign="top" class="tdstyle">
                                            মোট বেতন-
                                        </td>
                                        <td width="41" colspan="2" valign="top" class="tdstyle">

                                        </td>
                                        <td width="177" colspan="5" valign="top" class="tdstyle">
                                            মাসিক মোট আয়-
                                        </td>
                                        <td width="130" valign="top" class="tdstyle">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="171" colspan="2" valign="top" class="tdstyle">
                                            আয়ের উপর পরিবারের নির্ভরশীল সদস্য সংখ্যা-
                                        </td>
                                        <td width="41" colspan="2" valign="top" class="tdstyle">

                                        </td>
                                        <td width="177" colspan="5" valign="top" class="tdstyle">

                                        </td>
                                        <td width="130" valign="top" class="tdstyle">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="177" valign="top" class="tdtitlestyle">
                                            সদস্যের সার্বিক অবস্থা:
                                        </td>
                                        <td width="519" colspan="10" valign="top" class="tdstyle">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="177" valign="top" class="tdtitlestyle">
                                            মোট ডিপোজিটের পরিমাণঃ
                                        </td>
                                        <td width="163" valign="top" class="tdstyle">
                                            9
                                        </td>
                                        <td width="155" colspan="5" valign="top" class="tdstyle">
                                            চাহিত লোনের পরিমাণঃ
                                        </td>
                                        <td width="200" colspan="4" valign="top" class="tdstyle">
                                            1
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="177" valign="top" class="tdtitlestyle">
                                            চাহিত লোন ডিপোজিটের কত শতাংশ?
                                        </td>
                                        <td width="519" colspan="10" class="tdstyle">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="177" valign="top" class="tdtitlestyle">
                                            লোন গ্রহণের কারণঃ
                                        </td>
                                        <td width="177" colspan="3" valign="top" class="tdstyle">
                                            ব্যবসায়

                                        </td>
                                        <td width="176" colspan="5" valign="top" class="tdstyle">

                                        </td>
                                        <td width="166" colspan="2" valign="top" class="tdstyle">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="177" valign="top" class="tdtitlestyle">
                                            পূর্বে লোন গ্রহণ করেছেন কিনা?
                                        </td>
                                        <td width="177" colspan="3" valign="top" class="tdstyle">

                                            সফল

                                        </td>
                                        <td width="176" colspan="5" valign="top" class="tdstyle">
                                            কিস্তি পরিশোধের পদ্ধতি
                                        </td>
                                        <td width="166" colspan="2" valign="top" class="tdstyle">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="177" rowspan="2" valign="top" class="tdtitlestyle">
                                            প্রদত্ত ব্যাংক একাউন্টের চেকের তথ্য
                                        </td>
                                        <td width="519" colspan="10" valign="top" class="tdstyle">

                                            চেক এর নম্বর: 2564564
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="519" colspan="10" valign="top" class="tdstyle">
                                            Name of Bank &amp; Branch-: social islami bank

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="177" valign="top" class="tdtitlestyle">Reference -1</td>
                                        <td width="519" colspan="10" valign="top" class="tdstyle">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="177" valign="top" class="tdtitlestyle">
                                            সদস্যদের আই.ডি নম্বরঃ
                                        </td>
                                        <td width="163" valign="top" class="tdstyle">

                                        </td>
                                        <td width="155" colspan="5" valign="top" class="tdstyle">
                                            সদস্যদের নামঃ
                                        </td>
                                        <td width="200" colspan="4" valign="top" class="tdstyle">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="177" valign="top" class="tdtitlestyle">
                                            পেশাঃ
                                        </td>
                                        <td width="163" valign="top" class="tdstyle">

                                        </td>
                                        <td width="155" colspan="5" valign="top" class="tdstyle">
                                            মোবাইল নম্বরঃ

                                        </td>
                                        <td width="200" colspan="4" valign="top" class="tdstyle">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="177" valign="top" class="tdtitlestyle">
                                            পূর্বে লোন গ্রহণ করেছেন কিনা?

                                        </td>
                                        <td width="163" valign="top" class="tdstyle">

                                        </td>
                                        <td width="155" colspan="5" valign="top" class="tdstyle">
                                            লোন গ্রহীতার সাথে সম্পর্কঃ
                                        </td>
                                        <td width="200" colspan="4" valign="top" class="tdstyle">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="496" colspan="7" valign="top" class="tdtitlestyle">

                                            গ্রহীতা লোন প্রদান না করলে আমি প্রদানে বাধ্য থাকবঃ

                                        </td>
                                        <td width="200" colspan="4" valign="top" class="tdstyle">
                                            <!--  -->

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="177" class="tdtitlestyle">
                                            জামিনদারের স্বাক্ষরঃ

                                        </td>
                                        <td width="519" colspan="10" valign="top" class="tdstyle">
                                            <!--  -->
                                            <img src="https://app.bluestarsomithi.com/demo/loan_application" alt="" height="50">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="177" valign="top" class="tdtitlestyle">
                                            Reference -2

                                        </td>
                                        <td width="519" colspan="10" valign="top" class="tdstyle">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="177" valign="top" class="tdtitlestyle">
                                            সদস্যদের আই.ডি নম্বরঃ
                                        </td>
                                        <td width="163" valign="top" class="tdstyle">

                                        </td>
                                        <td width="155" colspan="5" valign="top" class="tdstyle">
                                            সদস্যদের নামঃ
                                        </td>
                                        <td width="200" colspan="4" valign="top" class="tdstyle">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="177" valign="top" class="tdtitlestyle">
                                            পেশাঃ
                                        </td>
                                        <td width="163" valign="top" class="tdstyle">

                                        </td>
                                        <td width="155" colspan="5" valign="top" class="tdstyle">
                                            মোবাইল নম্বরঃ

                                        </td>
                                        <td width="200" colspan="4" valign="top" class="tdstyle">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="177" valign="top" class="tdtitlestyle">
                                            পূর্বে লোন গ্রহণ করেছেন কিনা?
                                        </td>
                                        <td width="163" valign="top" class="tdstyle">

                                        </td>
                                        <td width="155" colspan="5" valign="top" class="tdstyle">
                                            লোন গ্রহীতার সাথে সম্পর্কঃ
                                        </td>
                                        <td width="200" colspan="4" valign="top" class="tdstyle">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="496" colspan="7" valign="top" class="tdtitlestyle">
                                            গ্রহীতা লোন প্রদান না করলে আমি প্রদানে বাধ্য থাকবঃ
                                        </td>
                                        <td width="200" colspan="4" valign="top" class="tdstyle"></td>
                                    </tr>
                                    <tr>
                                        <td width="177" class="tdtitlestyle">
                                            জামিনদারের স্বাক্ষরঃ
                                        </td>
                                        <td width="519" colspan="10" valign="top" class="tdstyle">
                                            <!--  -->
                                            <img src="https://app.bluestarsomithi.com/demo/loan_application" alt="" height="50">
                                        </td>
                                    </tr>
                                    <!--[if !supportMisalignedColumns]-->
                                    <tr height="0">
                                        <td width="177" style="border: none;"></td>
                                        <td width="163" style="border: none;"></td>
                                        <td width="8" style="border: none;"></td>
                                        <td width="8" style="border: none;"></td>
                                        <td width="35" style="border: none;"></td>
                                        <td width="67" style="border: none;"></td>
                                        <td width="39" style="border: none;"></td>
                                        <td width="8" style="border: none;"></td>
                                        <td width="26" style="border: none;"></td>
                                        <td width="35" style="border: none;"></td>
                                        <td width="130" style="border: none;"></td>
                                    </tr>
                                    <!--[endif]-->
                                </tbody>
                            </table>

                            <p class="MsoNormal" style="text-align: justify;">
                                <span style="font-size: 10pt; mso-bidi-font-size: 12pt; font-family: SolaimanLipi;">
                                    উপরিউক্ত প্রদত্ত তথ্যাদি সঠিক রয়েছে এবং আমি এই প্রতিষ্ঠানের যাবতীয় শর্তাবলী মেনে ঋণ
                                    গ্রহণ করিলাম এবং উক্ত ঋণ সমিতির নিয়ম মোতাবেক যথাসময়ে পরিশোধে বাধ্য থাকিবে। সমিতি
                                    কর্তৃপক্ষ কর্তৃক আরোপিত নিয়মাবলি, যখন যা প্রয়োজন তা মেনে চলতে বাধ্য থাকিব। তাছাড়া
                                    আমার অবর্তমানে স্বামী/স্ত্রী বা আমার পরিবারের অন্য সদস্য/সদস্যারা/উত্তরাধিকারীগণ এই
                                    ঋণ পরিশোধে বাধ্য থাকিবে।
                                </span>
                            </p>

                            <p class="MsoNormal" style="text-indent: 0.5in;">
                                <span style="font-size: 11pt; mso-bidi-font-size: 13pt; font-family: SutonnyMJ;">
                                    <span style="mso-spacerun: yes;"></span>
                                </span>
                                <span style="font-size: 6pt; mso-bidi-font-size: 8pt; font-family: SutonnyMJ;">
                                    <o:p></o:p>
                                </span>
                            </p>

                            <p class="MsoNormal">
                                <span style="font-size: 10pt; mso-bidi-font-size: 12pt; font-family: SolaimanLipi;">
                                    আমি স্বজ্ঞানে স্বেচ্ছায় নিন্মে স্বাক্ষর করিলাম।
                                </span>
                            </p>

                            <div style="mso-element: para-border-div; border: none; border-bottom: solid windowtext 1pt; mso-border-bottom-alt: solid windowtext 0.75pt; padding: 0in 0in 1pt 0in;">
                                <p class="MsoNormal" align="center"
                                    style="text-align: left; border: none; mso-border-bottom-alt: solid windowtext 0.75pt; padding: 0in; mso-padding-alt: 0in 0in 1pt 0in;">
                                    <span style="font-size: 13pt; mso-bidi-font-size: 13pt; font-family: SolaimanLipi;">
                                        <span style="mso-spacerun: yes;"></span><span
                                            style="mso-spacerun: yes;"></span><span style="mso-spacerun: yes;"></span>ঋণ
                                        গ্রহীতার নামঃ
                                    </span>
                                </p>

                                <p class="MsoNormal" align="center"
                                    style="text-align: left; border: none; mso-border-bottom-alt: solid windowtext 0.75pt; padding: 0in; mso-padding-alt: 0in 0in 1pt 0in;">
                                    <span style="font-size: 13pt; mso-bidi-font-size: 13pt; font-family: SolaimanLipi;">
                                        <span style="mso-spacerun: yes;"></span><span
                                            style="mso-spacerun: yes;"></span><span style="mso-spacerun: yes;"></span>ঋণ
                                        গ্রহীতার নামঃ
                                    </span>
                                </p>

                                <p class="MsoNormal" align="center"
                                    style="text-align: center; border: none; mso-border-bottom-alt: solid windowtext 0.75pt; padding: 0in; mso-padding-alt: 0in 0in 1pt 0in;">
                                    <span style="font-size: 10pt; mso-bidi-font-size: 12pt; font-family: SolaimanLipi;">
                                        <o:p>&nbsp;</o:p>
                                    </span>
                                </p>
                            </div>

                            <p class="MsoNormal">
                                <span style="font-size: 13pt; font-family: SutonnyMJ;">
                                    <o:p>&nbsp;</o:p>
                                </span>
                            </p>

                            <p class="MsoNormal">
                                <span style="font-family: SolaimanLipi;"><span style="mso-spacerun: yes;"></span>
                                    <o:p></o:p>
                                </span>
                            </p>

                            <p class="MsoNormal">
                                <span style="font-family: SolaimanLipi;">
                                    <o:p>&nbsp;</o:p>
                                </span>
                            </p>

                            <p class="MsoNormal">
                                <span style="font-family: SolaimanLipi;">
                                    <o:p>&nbsp;</o:p>
                                </span>
                            </p>

                            <p class="MsoNormal">
                                <span style="font-family: SolaimanLipi;">
                                    <o:p>&nbsp;</o:p>
                                </span>
                            </p>

                            <p class="MsoNormal" align="center" style="text-align: center;">
                                <b style="mso-bidi-font-weight: normal;">
                                    <u>
                                        <span style="font-family: SolaimanLipi;">অফিস কর্তৃক পূরণীয়</span>
                                    </u>
                                </b>
                            </p>

                            <p class="MsoNormal" style="text-indent: 0.5in; line-height: 150%;">
                                <span style="font-size: 5pt; line-height: 150%; font-family: SutonnyMJ;">
                                    <o:p>&nbsp;</o:p>
                                </span>
                            </p>

                            <p class="MsoNormal">
                                <span style="font-size: 10pt; mso-bidi-font-size: 12pt; font-family: SolaimanLipi;">
                                    আবেদিত ঋণ গ্রহীতা জনাব মোঃ সাইফুল ইসলাম কর্তৃক প্রদত্ত উপরিউক্ত তথ্যাদি সঠিক রয়েছে
                                    মর্মে প্রতীয়মান। তিনি টাকা ঋণের জন্য সমিতি বরাবরে আবেদন করেন। উল্লেখ্য, সমিতিতে
                                    তাহার --------------------- টাকা ডিপোজিট জমা রয়েছে এবং তিনি একজন নিয়মিত সদস্য।
                                </span>
                            </p>

                            <p class="MsoNormal">
                                <span style="font-family: SolaimanLipi;">
                                    <o:p>&nbsp;</o:p>
                                </span>
                            </p>

                            <p class="MsoNormal" align="center" style="text-align: center;">
                                <b style="mso-bidi-font-weight: normal;">
                                    <u>
                                        <span style="font-family: SolaimanLipi;">লোন কর্মকর্তার স্বাক্ষর</span>
                                    </u>
                                </b>
                            </p>

                            <p class="MsoNormal">
                                <span
                                    style="font-size: 5pt; font-family: SutonnyMJ; mso-bidi-font-family: 'Times New Roman';">
                                    <o:p>&nbsp;</o:p>
                                </span>
                            </p>

                            <p class="MsoNormal">
                                <span style="font-size: 10pt; mso-bidi-font-size: 12pt; font-family: SolaimanLipi;">
                                    সার্বিক বিবেচনায় আবেদিত ঋণ গ্রহীতার অনুকূলে অনুমোদনযোগ্য লোনের
                                    পরিমাণ------------------------ টাকা।
                                </span>
                                <span style="font-size: 3pt; mso-bidi-font-size: 5pt; font-family: SutonnyMJ;">
                                    <o:p></o:p>
                                </span>
                            </p>

                            <p class="MsoNormal" style="margin-left: 3.5in;">
                                <span style="font-size: 11pt; mso-bidi-font-size: 13pt; font-family: SutonnyMJ;">
                                    <o:p>&nbsp;</o:p>
                                </span>
                            </p>

                            <p class="MsoNormal" align="right" style="margin-left: 3.5in; text-align: right;">
                                <span style="font-size: 11pt; mso-bidi-font-size: 13pt; font-family: SutonnyMJ;"><span
                                        style="mso-spacerun: yes;"></span><span
                                        style="mso-spacerun: yes;"></span>-------------------------<o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" align="right" style="text-align: right;">
                                <span style="font-size: 10pt; mso-bidi-font-size: 12pt; font-family: SolaimanLipi;">
                                    <span style="mso-spacerun: yes;"></span>
                                    <b style="mso-bidi-font-weight: normal;">লোন সেক্রেটারীর স্বাক্ষর</b>
                                </span>
                            </p>

                            <p class="MsoNormal" align="right" style="text-align: right;">
                                <b style="mso-bidi-font-weight: normal;">
                                    <span
                                        style="font-size: 10pt; mso-bidi-font-size: 12pt; font-family: SolaimanLipi;"><span
                                            style="mso-spacerun: yes;"></span></span>
                                </b>
                                <span style="font-size: 10pt; mso-bidi-font-size: 12pt; font-family: SolaimanLipi;">
                                    (লোন কমিটির সভাপতি)<b style="mso-bidi-font-weight: normal;">
                                        <o:p></o:p>
                                    </b>
                                </span>
                            </p>

                            <p class="MsoNormal" align="center" style="text-align: center;">
                                <b style="mso-bidi-font-weight: normal;">
                                    <u>
                                        <span
                                            style="font-size: 10pt; mso-bidi-font-size: 12pt; font-family: SolaimanLipi;">
                                            অনুমোদিত ঋণের পরিমাণঃ
                                        </span>
                                    </u>
                                </b>
                            </p>

                            <p class="MsoNormal">
                                <span style="font-size: 10pt; mso-bidi-font-size: 12pt; font-family: SolaimanLipi;">
                                    <o:p>&nbsp;</o:p>
                                </span>
                            </p>

                            <p class="MsoNormal">
                                <span style="font-size: 10pt; mso-bidi-font-size: 12pt; font-family: SolaimanLipi;">
                                    আবেদিত ঋণ গ্রহীতার --------------------------------- টাকা ঋণ মঞ্জুর করা হলো।
                                </span>
                            </p>

                            <p class="MsoNormal" align="right" style="margin-left: 3.5in; text-align: right;">
                                <span style="font-size: 11pt; mso-bidi-font-size: 13pt; font-family: SutonnyMJ;">
                                    <o:p>&nbsp;</o:p>
                                </span>
                            </p>

                            <p class="MsoNormal" align="right" style="margin-left: 3.5in; text-align: right;">
                                <span
                                    style="font-size: 11pt; mso-bidi-font-size: 13pt; font-family: SutonnyMJ;">-------------------------
                                    <o:p></o:p></span>
                            </p>

                            <p class="MsoNormal" align="right" style="text-align: right;">
                                <span style="font-size: 10pt; mso-bidi-font-size: 12pt; font-family: SolaimanLipi;">
                                    অনুমোদনকারীর স্বাক্ষরঃ
                                </span>
                            </p>

                            <p class="MsoNormal" align="right" style="text-align: right;">
                                <span
                                    style="font-size: 10pt; mso-bidi-font-size: 12pt; font-family: SolaimanLipi;">সভাপতি</span>
                            </p>

                            <p class="MsoNormal" align="right" style="text-align: right;">
                                <span style="font-size: 10pt; mso-bidi-font-size: 12pt; font-family: SolaimanLipi;">

                                </span>
                            </p>

                            <p class="MsoNormal">
                                <span style="font-size: 5pt; font-family: SutonnyMJ;">
                                    <o:p>&nbsp;</o:p>
                                </span>
                            </p>
                            <p class="MsoNormal">
                                <span style="font-size: 5pt; font-family: SutonnyMJ;">
                                    <o:p>&nbsp;</o:p>
                                </span>
                            </p>
                            <p class="MsoNormal">
                                <span style="font-size: 5pt; font-family: SutonnyMJ;">
                                    <o:p>&nbsp;</o:p>
                                </span>
                            </p>
                            <p class="MsoNormal">
                                <span style="font-size: 5pt; font-family: SutonnyMJ;">
                                    <o:p>&nbsp;</o:p>
                                </span>
                            </p>

                            <p class="MsoNormal">
                                <span style="font-size: 5pt; font-family: SutonnyMJ;">
                                    <o:p>&nbsp;</o:p>
                                </span>
                            </p>
                            <p class="MsoNormal">
                                <span style="font-size: 5pt; font-family: SutonnyMJ;">
                                    <o:p>&nbsp;</o:p>
                                </span>
                            </p>
                            <p class="MsoNormal">
                                <span style="font-size: 5pt; font-family: SutonnyMJ;">
                                    <o:p>&nbsp;</o:p>
                                </span>
                            </p>
                            <p class="MsoNormal">
                                <span style="font-size: 5pt; font-family: SutonnyMJ;">
                                    <o:p>&nbsp;</o:p>
                                </span>
                            </p>
                            <p class="MsoNormal">
                                <span style="font-size: 5pt; font-family: SutonnyMJ;">
                                    <o:p>&nbsp;</o:p>
                                </span>
                            </p>
                            <p class="MsoNormal">
                                <span style="font-size: 5pt; font-family: SutonnyMJ;">
                                    <o:p>&nbsp;</o:p>
                                </span>
                            </p>
                            <p class="MsoNormal">
                                <span style="font-size: 5pt; font-family: SutonnyMJ;">
                                    <o:p>&nbsp;</o:p>
                                </span>
                            </p>

                            <p class="MsoNormal">
                                <span style="font-size: 5pt; font-family: SutonnyMJ;">
                                    <o:p>&nbsp;</o:p>
                                </span>
                            </p>
                            <p class="MsoNormal">
                                <span style="font-size: 5pt; font-family: SutonnyMJ;">
                                    <o:p>&nbsp;</o:p>
                                </span>
                            </p>
                            <p class="MsoNormal">
                                <o:p>&nbsp;</o:p>
                            </p>
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
        </div>
    </div>
@endsection
