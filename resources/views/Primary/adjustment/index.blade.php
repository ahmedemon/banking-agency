@extends('layouts.frontend.app')
@section('content')
<div class="content-w">
                <div class="content-i">
                    <div class="content-box">


                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="element-header text-center" style="margin-bottom: 16px;">এডজাস্টমেন্ট তৈরি</h6>


                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-11">
                                        <a href="dashboard-statistics.html/setting/resolve/general" class="btn btn-outline-secondary btn-sm">General Adjustment</a>
                                        <a href="dashboard-statistics.html/setting/resolve/share" class="btn btn-outline-secondary btn-sm">Share Adjustment</a>
                                        <a href="dashboard-statistics.html/setting/resolve/invest" class="btn btn-outline-secondary btn-sm">Investment Adjustment</a>
                                        <a href="dashboard-statistics.html/setting/resolve/cc" class="btn btn-outline-secondary btn-sm">CC Adjustment</a>
                                        <a href="dashboard-statistics.html/setting/resolve/fdr" class="btn btn-outline-secondary btn-sm">FDR Adjustment</a>
                                        <a href="dashboard-statistics.html/setting/resolve/invest" class="btn btn-outline-secondary btn-sm">account.invest</a>
                                        <a href="dashboard-statistics.html/setting/resolve/member" class="btn btn-outline-secondary btn-sm">account.member_ac_migration</a>
                                    </div>
                                </div>

                                <div class="element-box">
                                    <form method="POST" action="dashboard-statistics.html/adjustment" accept-charset="UTF-8" note="Are you agree for deposit desire amount?"><input name="_token" type="hidden" value="sgrDNHgsfFz8h8LWAVJ8HQGHYEAS8d7OF5paxZx2">
                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="branch" class="col-sm-4">Branch&nbsp;Name</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" required id="branch" name="branch">
                                                            <option value="1" selected="selected">Main Branch</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="date" class="col-form-label col-sm-4">Date</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control text-center" required step="any" placeholder="Something error. Please refresh page" name="date" type="date" id="date">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="account_type" class="col-form-label col-sm-4">Account&nbsp;Type</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control text-center" name="account_type">
                                                            <option value="117">জেনারেল সঞ্চয় ডিপোজিট</option>
                                                            <option value="129">কিস্তি প্রদান</option>
                                                            <option value="122">ডিপিএসে জমা দিন</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="cash_type" class="col-form-label col-sm-4">Cash&nbsp;Type</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control text-center" name="cash_type">
                                                            <option value="in" selected>ক্যাশ ইন</option>
                                                            <!-- <option value="out">Cash Out</option> -->
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="amount" class="col-form-label col-sm-4">পরিমাণ</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control text-center" step="any" placeholder="পরিমাণ" required name="amount" type="number" id="amount">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3"></div>
                                        </div>
                                        <div>
                                            <br>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-5"></div>
                                            <div class="col-sm-4">
                                                <div class="row">
                                                    <div class="col-sm-12 text-right">
                                                        <input class="btn btn-primary" type="submit" value="Submit">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection