 @extends('layouts.frontend.report')

@push('css')
    {{-- <link href="https://fonts.googleapis.com/css2?family=Atma:wght@700&display=swap" rel="stylesheet"> --}}
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

    .bn_number{
        font-family: 'SutonnyMj', serif;
        font-size: 15px;
    }
    @media print {
        #printPageButton {
            display: none;
        }
    }
</style>
@endpush

@section('report_page')

<div class="container-fluid p-5">
    <div class="content-w">
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
                                <h2 class="mb-3 bangla_font2"><u>ডেইলি কালেকশন শিট</u></h2>
                            </div>
                            <div class="col-md-3 d-flex align-items-end">
                                <table class="table table-sm table-borderless mt-5 mb-0 small">
                                    <tr class="text-right details">
                                        <td class="align-middle">মাসের নামঃ -</td>
                                        <td class="input-group-sm px-0 text-center" style="width: 60% !important;">
                                            <input type="text" class="form-control shadow-none rounded-0 mx-0 float-right" readonly value="{{ date('F', strtotime(request()->date)) }}">
                                        </td>
                                    </tr>
                                    <tr class="text-right details">
                                        <td class="align-middle">তারিখঃ -</td>
                                        <td class="input-group-sm px-0 text-center" style="width: 60% !important;">
                                            <input type="text" readonly class="form-control shadow-none rounded-0 mx-0 float-right" value="{{ date('d-m-Y', strtotime(request()->date)) }}">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 px-0">
                    <table class="table table-sm my-0 reportInfo">
                        <tr class="small text-center details">

                            <td class="align-middle px-0">শাখাঃ</td>
                            <td class="input-group-sm px-0 text-center">
                                @if (request()->branch == 'all')
                                    <input type="text" class="form-control shadow-none rounded-0 mx-0" value="সকল শাখা" readonly>
                                @else
                                    <input type="text" class="form-control shadow-none rounded-0 mx-0" value="{{ $data['branch'] }}" readonly>
                                @endif
                            </td>
                            <td class="align-middle px-0">এরিয়াঃ</td>
                            <td class="input-group-sm px-0 text-center">
                                @if (request()->area == 'all')
                                    <input type="text" class="form-control shadow-none rounded-0 mx-0" value="সকল এরিয়া" readonly>
                                @else
                                    <input type="text" class="form-control shadow-none rounded-0 mx-0" value="{{ $data['area'] }}" readonly>
                                @endif
                            </td>

                            <td class="align-middle px-0">ফিল্ড অফিসারের নামঃ</td>
                            <td class="input-group-sm px-0 text-center">
                                @if (request()->area == 'all')
                                    <input type="text" class="form-control shadow-none rounded-0 mx-0" value="সকল অফিসার" readonly>
                                @else
                                    <input type="text" class="form-control shadow-none rounded-0 mx-0" value="{{ request()->staff }}" readonly>
                                @endif
                            </td>

                        </tr>
                    </table>
                    <table class="table table-bordered table-sm">
                        <thead class="table-secondary data_table">
                            <tr class="align-middle text-center">
                                <td class="py-0 text-center border border-dark align-middle" rowspan="2">ক্রঃ নং</td>
                                <td class="py-0 text-center border border-dark align-middle" rowspan="2">সদস্য হিসাব নম্বর</td>
                                <td class="py-0 text-center border border-dark align-middle" rowspan="2">সদস্যের নাম</td>
                                {{-- <td class="py-0 text-center border border-dark align-middle" rowspan="2">লেজার ফলিও</td> --}}
                                <td class="py-0 text-center border border-dark align-middle" colspan="4">সঞ্চয়</td>
                                <td class="py-0 text-center border border-dark align-middle" colspan="5">ঋন</td>
                                <td class="py-0 text-center border border-dark align-middle" colspan="4">ডি পি এস</td>
                            </tr>
                            <tr>
                                <td class="py-0 text-center align-middle border border-dark">সঞ্চয় পরিমান</td>
                                <td class="py-0 text-center align-middle border border-dark">সঞ্চয় জমা</td>
                                <td class="py-0 text-center align-middle border border-dark">সঞ্চয় ফেরত</td>
                                <td class="py-0 text-center align-middle border border-dark">সঞ্চয় স্থিতি</td>

                                <td class="py-0 text-center align-middle border border-dark">কিস্তি নং</td>
                                <td class="py-0 text-center align-middle border border-dark">ঋনের বিতরন</td>
                                <td class="py-0 text-center align-middle border border-dark">ঋনের পরিমান</td>
                                <td class="py-0 text-center align-middle border border-dark">কিস্তির পরিমান</td>
                                <td class="py-0 text-center align-middle border border-dark">ঋন স্থিতি</td>

                                <td class="py-0 text-center align-middle border border-dark">সঞ্চয় পরিমান</td>
                                <td class="py-0 text-center align-middle border border-dark">সঞ্চয় জমা</td>
                                <td class="py-0 text-center align-middle border border-dark">সঞ্চয় ফেরত</td>
                                <td class="py-0 text-center align-middle border border-dark">সঞ্চয় স্থিতি</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $key=>$report)
                                <tr class="small text-center">
                                    <td class="py-0 border align-middle border-secondary bn_number">{{ $key = $key + 1}}</td>
                                    <td class="py-0 border align-middle border-secondary">{{ $report->account }}</td>
                                    <td class="py-0 border align-middle border-secondary text-left px-1">{{ $report->name }}</td>

                                    <td class="py-0 border align-middle border-secondary text-right pr-2 bn_number">{{ $report->gen_ac_amt }}</td>
                                    <td class="py-0 border align-middle border-secondary text-right pr-2 bn_number">{{ $report->gen_deposit }}</td>
                                    <td class="py-0 border align-middle border-secondary text-right pr-2 bn_number">{{ $report->gen_withdraw }}</td>
                                    <td class="py-0 border align-middle border-secondary text-right pr-2 bn_number">{{ $report->gen_balance }}</td>

                                    <td class="py-0 border align-middle border-secondary bn_number">{{ $report->loan_install_no }}</td>
                                    <td class="py-0 border align-middle border-secondary text-right pr-2 bn_number">{{ $report->loan_dist_amt }}</td>
                                    <td class="py-0 border align-middle border-secondary text-right pr-2 bn_number">{{ $report->loan_total_amt }}</td>
                                    <td class="py-0 border align-middle border-secondary text-right pr-2 bn_number">{{ $report->loan_install_amt }}</td>
                                    <td class="py-0 border align-middle border-secondary text-right pr-2 bn_number">{{ $report->loan_total_amt - $report->loan_paid_amt }}</td>

                                    <td class="py-0 border align-middle border-secondary text-right pr-2 bn_number">{{ $report->dps_amt }}</td>
                                    <td class="py-0 border align-middle border-secondary text-right pr-2 bn_number">{{ $report->dps_deposit }}</td>
                                    <td class="py-0 border align-middle border-secondary text-right pr-2 bn_number">{{ $report->dps_withdraw }}</td>
                                    <td class="py-0 border align-middle border-secondary text-right pr-2 bn_number">{{ $report->dps_balance }}</td>
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
