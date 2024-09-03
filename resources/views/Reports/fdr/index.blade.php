@extends('layouts.frontend.report')
@section('report_page')
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali&display=swap" rel="stylesheet">
<style>
    tbody tr, thead{
        transition: 0.1s;
        cursor: default;
    }
    tbody tr:hover{
        background-color: rgb(235, 235, 235);
        transition: 0.1s;
    }
    .reportInfo td{
        width: auto !important;
    }
    .bangla_font2{
        font-family: 'Noto Serif Bengali', serif;
    }
    .data_table td{
        font-size: 13px;
    }
    .details:hover{
        background-color: transparent;
    }
    @media print {
        #printPageButton {
            display: none;
        }
    }
</style>
<div class="container-fluid p-2">
    <div class="content-w px-5 py-3 border">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div  class="cold-md-12 ml-auto">
                        <button class="btn btn-sm btn-outline-secondary" id="printPageButton" onclick="window.print()">Print</button>
                    </div>
                    <div class="col-md-12 px-0">
                        <div class="row">
                            <div class="col-md-3 d-flex justify-content-center align-items-center">
                                <img src="{{ asset('images/logo.png') }}" height="110" width="100">
                            </div>
                            <div class="col-md-6 text-center">
                                {{-- <p>বিসমিল্লাহির রহমানির রহিম</p> --}}
                                <h1 class="bangla_font2">ব্লু-স্টার সঞ্চয় ও ঋনদান সমবায় সমিতি লিঃ</h1>
                                <p class="">৮৩৯/৩৯ খান-এ-সবুর রোড, নতুন রাস্তা, দৌলতপুর, খুলনা।</p>
                                <h1 class="mb-0 bangla_font2">ডেইলি কালেকশন শিট</h1>
                                <hr class="border border-dark w-50 mt-0">
                            </div>
                            <div class="col-md-3 d-flex align-items-end">
                                <table class="table table-sm table-borderless mt-5 mb-0 small">
                                    <tr class="text-right details">
                                        <td class="align-middle">মাসের নামঃ -</td>
                                        <td class="input-group-sm px-0 text-center" style="width: 60% !important;">
                                            <input type="text" class="form-control shadow-none rounded-0 mx-0 float-right">
                                        </td>
                                    </tr>
                                    <tr class="text-right details">
                                        <td class="align-middle">তারিখঃ -</td>
                                        <td class="input-group-sm px-0 text-center" style="width: 60% !important;">
                                            <input type="text" class="form-control shadow-none rounded-0 mx-0 float-right">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 px-0">
                        <table class="table table-sm my-0 reportInfo">
                            <tr class="small text-center details">
                                <td class="align-middle px-0">ফিল্ড অফিসারের নামঃ- </td>
                                <td class="input-group-sm px-0 text-center">
                                    <input type="text" class="form-control shadow-none rounded-0 mx-0">
                                </td>

                                <td class="align-middle px-0">শাখার নঃ- </td>
                                <td class="input-group-sm px-0 text-center">
                                    <input type="text" class="form-control shadow-none rounded-0 mx-0">
                                </td>
                                <td class="align-middle px-0">এরিয়ার নামঃ- </td>
                                <td class="input-group-sm px-0 text-center">
                                    <input type="text" class="form-control shadow-none rounded-0 mx-0">
                                </td>

                            </tr>
                        </table>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h4 class="alert alert-success">ফিক্সড ডিপোজিট একাউন্ট লিস্ট</h4>
                            </div>
                        </div>
                        <table class="table table-bordered table-sm">
                            <thead class="table-secondary data_table">
                                <tr class="align-middle text-center">
                                    <td class="p-0 text-center border border-dark align-middle" colspan="7">ফিক্সড ডিপোজিট</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center border border-dark align-middle">ক্রঃ নং</td>
                                    <td class="p-0 text-center border border-dark">একাউন্ট</td>
                                    <td class="p-0 text-center border border-dark">স্কিম</td>
                                    <td class="p-0 text-center border border-dark">শুরু / শেষ</td>
                                    <td class="p-0 text-center border border-dark">সময়কাল (মাস)</td>
                                    <td class="p-0 text-center border border-dark">সঞ্চয় পরিমান</td>
                                    <td class="p-0 text-center border border-dark">শতকরা</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($member->fdr as $fdr)
                                    <tr class="small text-center">
                                        <td class="p-0 border border-secondary">{{ $loop->iteration }}</td>

                                        <td class="p-0 border border-secondary">{{$fdr->account}}</td>
                                        <td class="p-0 border border-secondary">{{$fdr->scheme->name}}</td>
                                        <td class="p-0 border border-secondary">{{$fdr->starting_date}} / {{$fdr->ending_date}}</td>
                                        <td class="p-0 border border-secondary">{{$fdr->months}}</td>
                                        <td class="p-0 border border-secondary">{{$fdr->amount}}</td>
                                        <td class="p-0 border border-secondary">{{$fdr->percent}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h4 class="alert alert-success">ফিক্সড ডিপোজিট ক্লোজিং লিস্ট</h4>
                            </div>
                        </div>
                        <table class="table table-bordered table-sm">
                            <thead class="table-secondary data_table">
                                <tr class="align-middle text-center">
                                    <td class="p-0 text-center border border-dark align-middle" colspan="6">ক্লোজিং</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center border border-dark align-middle">ক্রঃ নং</td>
                                    <td class="p-0 text-center border border-dark">শুরু</td>
                                    <td class="p-0 text-center border border-dark">বিগত মাস</td>
                                    <td class="p-0 text-center border border-dark">সঞ্চয় স্থিতি</td>
                                    <td class="p-0 text-center border border-dark">পূর্নাঙ্গ মুনাফা</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($closing as $close)
                                    <tr class="small text-center">
                                        <td class="p-0 border border-secondary">{{ $loop->iteration }}</td>

                                        <td class="p-0 border border-secondary">{{$close->account}}</td>
                                        <td class="p-0 border border-secondary">{{$close->passed_month}}</td>
                                        <td class="p-0 border border-secondary">{{$close->fdr_payable_amount}}</td>
                                        <td class="p-0 border border-secondary">{{$close->final_profit}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr> <!-- transaction list -->
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h4 class="alert alert-success">ফিক্সড ডিপোজিট ট্রানিজ্যাকশন লিস্ট</h4>
                            </div>
                        </div>
                        <table class="table table-bordered table-sm">
                            <thead class="table-secondary data_table">
                                <tr class="align-middle text-center">
                                    <td class="p-0 text-center border border-dark align-middle" colspan="7">ফিক্সড ডিপোজিট</td>
                                    <td class="p-0 text-center border border-dark align-middle" colspan="2">স্কিম</td>
                                    <td class="p-0 text-center border border-dark align-middle" colspan="3">মুনাফা</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center border border-dark align-middle">ক্রঃ নং</td>
                                    <td class="p-0 text-center border border-dark">এফডিআর আইডি</td>
                                    <td class="p-0 text-center border border-dark">শুরু / শেষ</td>
                                    <td class="p-0 text-center border border-dark">মাস</td>
                                    <td class="p-0 text-center border border-dark">সঞ্চয়</td>
                                    <td class="p-0 text-center border border-dark">শতকরা</td>
                                    <td class="p-0 text-center border border-dark">ধরন</td>

                                    <td class="p-0 text-center border border-dark">স্কিম</td>
                                    <td class="p-0 text-center border border-dark">সময়কাল</td>

                                    <td class="p-0 text-center border border-dark">মুনাফা</td>
                                    <td class="p-0 text-center border border-dark">মাস | বছর</td>
                                    <td class="p-0 text-center border border-dark">উত্তোলন</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($member->fdr as $fdr)
                                    @foreach ($fdr->profit as $profit)
                                        <tr class="small text-center">
                                            <td class="p-0 border border-secondary">{{ $loop->iteration }}</td>

                                            <td class="p-0 border border-secondary">{{$fdr->id}}</td>
                                            <td class="p-0 border border-secondary">{{$fdr->starting_date}} / {{$fdr->ending_date}}</td>
                                            <td class="p-0 border border-secondary">{{$fdr->months}}</td>
                                            <td class="p-0 border border-secondary">{{$fdr->amount}}</td>
                                            <td class="p-0 border border-secondary">{{$fdr->percent}}</td>
                                            <td class="p-0 border border-secondary">
                                                {{ $fdr->scheme->type == 1 ? 'Fixed Profit (Fixed)' : '' }}
                                                {{ $fdr->scheme->type == 2 ? 'Monthly Profit (Monthly)' : '' }}
                                            </td>

                                            <td class="p-0 border border-secondary">{{$fdr->scheme->name}}</td>
                                            <td class="p-0 border border-secondary">{{$fdr->scheme->duration}}</td>

                                            <td class="p-0 border border-secondary">{{$profit->profit}}</td>
                                            <td class="p-0 border border-secondary">{{$profit->month}} | {{$profit->year}}</td>
                                            <td class="p-0 border border-secondary">{{$profit->withdraw}}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
