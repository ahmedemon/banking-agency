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
                    <div class="cold-md-12 ml-auto">
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
                                <h1 class="mb-0 bangla_font2">ডেইলি লোন কালেকশন শিট</h1>
                                <hr class="border border-dark w-75 mt-0">
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
                                <td class="align-middle px-0">কোড নংঃ- </td>
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
                                <td class="align-middle px-0">সিট নংঃ -</td>
                                <td class="input-group-sm px-0 text-center">
                                    <input type="text" class="form-control shadow-none rounded-0 mx-0">
                                </td>
                            </tr>
                        </table>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h4 class="alert alert-success">লোন একাউন্ট</h4>
                            </div>
                        </div>
                        <table class="table table-bordered table-sm">
                            <thead class="table-secondary data_table">
                                <tr class="align-middle text-center">
                                    <td class="p-0 text-center border border-dark align-middle" colspan="13">লোন একাউন্ট</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center border border-dark">সদস্য</td>
                                    <td class="p-0 text-center border border-dark">একাউন্ট নম্বর</td>
                                    <td class="p-0 text-center border border-dark">এরিয়া</td>
                                    <td class="p-0 text-center border border-dark">স্কিম</td>
                                    <td class="p-0 text-center border border-dark">সময়কাল</td>
                                    <td class="p-0 text-center border border-dark">ইনস্টলমেন্ট</td>
                                    <td class="p-0 text-center border border-dark">ইনস্টলমেন্ট পরিমান</td>
                                    <td class="p-0 text-center border border-dark">লেজার নং</td>
                                    <td class="p-0 text-center border border-dark">পন্য</td>
                                    <td class="p-0 text-center border border-dark">মূল</td>
                                    <td class="p-0 text-center border border-dark">মোট সঞ্চয়</td>
                                    <td class="p-0 text-center border border-dark">সঞ্চয় ফেরত</td>
                                    <td class="p-0 text-center border border-dark">বাকি সঞ্চয়</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($loans as $loan)
                                <tr class="small text-center">
                                    <td class="p-0 border border-secondary">{{$loan->member->m_name}}</td>
                                    <td class="p-0 border border-secondary">{{$loan->account_id}}</td>
                                    <td class="p-0 border border-secondary">{{$loan->member->area->name}}</td>
                                    <td class="p-0 border border-secondary">{{ Str::ucfirst($loan->scheme) }}</td>
                                    <td class="p-0 border border-secondary">{{ Str::ucfirst($loan->scheme) }}</td>
                                    <td class="p-0 border border-secondary">{{ date('d M Y', strtotime($loan->date)) }} - {{ date('d M Y', strtotime($loan->expire_date)) }}</td>
                                    <td class="p-0 border border-secondary">{{ $loan->installment_count }}/{{ $loan->installment }}</td>
                                    <td class="p-0 border border-secondary">{{ $loan->installment_amount }}</td>
                                    <td class="p-0 border border-secondary">{{ $loan->ledger_no }}</td>
                                    <td class="p-0 border border-secondary">{{ $loan->product ? $loan->product : '-' }}</td>
                                    <td class="p-0 border border-secondary">{{ $loan->loan_amount }}</td>
                                    <td class="p-0 border border-secondary">{{ $loan->total_amount }}</td>
                                    <td class="p-0 border border-secondary">{{ $loan->total_paid }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr> <!-- transaction list -->
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h4 class="alert alert-success">লোন একাউন্ট ট্রানজ্যাকশন লিস্ট</h4>
                            </div>
                        </div>
                        <table class="table table-bordered table-sm">
                            <thead class="table-secondary data_table">
                                <tr class="align-middle text-center">
                                    <td class="p-0 text-center border border-dark align-middle" colspan="8">লোন একাউন্ট</td>
                                </tr>
                                <tr>
                                    <td class="p-0 text-center border border-dark">ক্রঃ নং</td>
                                    <td class="p-0 text-center border border-dark">তারিখ</td>
                                    <td class="p-0 text-center border border-dark">মূল</td>
                                    <td class="p-0 text-center border border-dark">মুনাফা</td>
                                    <td class="p-0 text-center border border-dark">সঞ্চয় জমা</td>
                                    <td class="p-0 text-center border border-dark">জরিমানা</td>
                                    <td class="p-0 text-center border border-dark">নোট</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($loans->installments()->get()->sortByDesc('date') as $install)
                                    <tr class="small text-center">
                                        <td class="p-0 border border-secondary">{{ $loop->iteration }}</td>

                                        <td class="p-0 border border-secondary">{{ date('d M Y', strtotime($install->date)) }}</td>
                                        <td class="p-0 border border-secondary">{{ $loans->installment_principle }}</td>
                                        <td class="p-0 border border-secondary">{{ $loans->interest_per_installment }}</td>
                                        <td class="p-0 border border-secondary">{{ $install->amount }}</td>
                                        <td class="p-0 border border-secondary">{{ $install->penalty }}</td>
                                        <td class="p-0 border border-secondary">{{ $install->note ? $install->note : '-' }}</td>
                                    </tr>
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
