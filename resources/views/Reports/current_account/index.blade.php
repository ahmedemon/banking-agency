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
                                <h4 class="alert alert-success">কারেন্ট একাউন্ট লিস্ট</h4>
                            </div>
                        </div>
                        <table class="table table-bordered table-sm">
                            <thead class="table-secondary data_table">
                                <tr class="align-middle text-center">
                                    <td class="p-0 text-center border border-dark align-middle" colspan="6">কারেন্ট একাউন্ট</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center border border-dark">সঞ্চয় মালিক</td>
                                    <td class="p-0 text-center border border-dark">একাউন্ট নম্বর</td>
                                    <td class="p-0 text-center border border-dark">সঞ্চয় পরিমান</td>
                                    <td class="p-0 text-center border border-dark">সঞ্চয় ফেরত</td>
                                    <td class="p-0 text-center border border-dark">সঞ্চয় স্থিতি</td>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($member->currentAccount as $cAccount) --}}
                                    <tr class="small text-center">
                                        <td class="p-0 border border-secondary">{{$member->m_name}}</td>
                                        <td class="p-0 border border-secondary">{{$member->account}}</td>
                                        <td class="p-0 border border-secondary">{{$member->currentAccount->sum('deposit_amount')}}</td>
                                        <td class="p-0 border border-secondary">{{$member->currentAccount->sum('withdraw')}}</td>
                                        <td class="p-0 border border-secondary">{{$member->currentAccount->sum('deposit_amount') - $member->currentAccount->sum('withdraw')}}</td>
                                    </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                        <hr> <!-- transaction list -->
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h4 class="alert alert-success">কারেন্ট ট্রানিজ্যাকশন লিস্ট</h4>
                            </div>
                        </div>
                        <table class="table table-bordered table-sm">
                            <thead class="table-secondary data_table">
                                <tr class="align-middle text-center">
                                    <td class="p-0 text-center border border-dark align-middle" rowspan="2">ক্রঃ নং</td>
                                    <td class="p-0 text-center border border-dark align-middle" colspan="7">কারেন্ট</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center border border-dark">তারিখ</td>
                                    <td class="p-0 text-center border border-dark">সঞ্চয় জমা</td>
                                    <td class="p-0 text-center border border-dark">উত্তোলন</td>
                                    <td class="p-0 text-center border border-dark">সঞ্চয় স্থিতি</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($member->currentAccount as $account)
                                    {{-- @foreach ($account->transactions as $transaction) --}}
                                    <tr class="small text-center">
                                        <td class="p-0 border border-secondary">{{ $loop->iteration }}</td>
                                        <td class="p-0 border border-secondary">{{$account->date}}</td>
                                        <td class="p-0 border border-secondary">{{$account->deposit_amount}}</td>
                                        <td class="p-0 border border-secondary">{{$account->withdraw}}</td>
                                        <td class="p-0 border border-secondary">{{$account->sum('deposit_amount') - $account->sum('withdraw')}}</td>
                                    </tr>
                                    {{-- @endforeach --}}
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
