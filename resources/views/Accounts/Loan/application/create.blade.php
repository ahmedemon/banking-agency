@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <form action="{{ route('loan-application.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-center"><u> ঋণের আবেদন </u></h3>
                                        <p class="text-center lead">লোন প্রক্রিয়াকরণের জন্য অনুগ্রহপূবক লোন কমিটির সাথে যোগাযোগ করুন</p>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <p class="card-header my-0"><strong>Note:</strong> The fields marked with ( <strong class="text-danger">*</strong> ) are required.</p>
                                    </div>
                                </div>
                                {{-- <hr class="border-success"> --}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>সদস্যের আই.ডি নম্বরঃ</label>
                                            <strong class="text-danger">*</strong>
                                            <input type="number" class="form-control" name="member_id" value="{{ old('member_id') }}" required="" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>সদস্যের নামঃ</label>
                                            <strong class="text-danger">*</strong>
                                            <input type="text" class="form-control" name="member_name" value="{{ old('member_name') }}" required="" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>পিতার নামঃ</label>
                                            <strong class="text-danger">*</strong>
                                            <input type="text" class="form-control" name="member_f_name" value="{{ old('member_f_name') }}" required="" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>মাতার নামঃ</label>
                                            <input type="text" class="form-control" name="member_m_name" value="{{ old('member_m_name') }}" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>চাহিত লোনের বিস্তারিত কারণ</label>
                                            <textarea cols="30" rows="2" class="form-control" name="expect_loan_details" value="{{ old('expect_loan_details') }}" placeholder="এখানে আপনি ঋণের ব্যাপারে লিখুন "></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>হিসাবের ধরণঃ</label>

                                            <select name="acount_type" value="{{ old('acount_type') }}" class="form-control" required="">
                                                <option value="">হিসাবের ধরণ নির্বাচন</option>
                                                <option value="1">সুদযুক্ত হিসাব</option>
                                                <option value="2">সুদবিহীন হিসাব</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>লোন গ্রহণের কারণঃ</label>
                                            <strong class="text-danger">*</strong>
                                            <select name="loan_reason" value="{{ old('loan_reason') }}" id="" class="form-control" required="">
                                                <option value="">লোন গ্রহণের কারণ নির্বাচন</option>
                                                <option value="1">পণ্য বা মালমাল ক্রয়</option>
                                                <option value="2">ব্যবসায়</option>
                                                <option value="3">আকষ্মিক পরিস্থিতি মোকাবেলা</option>
                                                <option value="4">ব্যক্তিগত প্রয়োজন</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>পূর্বে লোন গ্রহণ করেছেন কিনা?</label>
                                            <strong class="text-danger">*</strong>
                                            <select name="previous_loan" value="{{ old('previous_loan') }}" id="" class="form-control" required="">
                                                <option value="">পূর্বে লোন গ্রহণ নির্বাচন</option>
                                                <option value="1">ঋণ খেলাপি</option>
                                                <option value="2">সফল</option>
                                                <option value="3">চলমান</option>
                                                <option value="4">না</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>কিস্তি পরিশোধের পদ্ধতি</label>
                                            <strong class="text-danger">*</strong>
                                            <select name="loan_collection_method" value="{{ old('loan_collection_method') }}" id="" class="form-control" required="">
                                                <option value="">লোন গ্রহণের কারণ নির্বাচন</option>
                                                <option value="1">প্রতিদিন</option>
                                                <option value="2">সাপ্তাহিক</option>
                                                <option value="3">অর্ধ মাস</option>
                                                <option value="4">মাসিক</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>ব্যাংক হিসাবের নাম ও শাখার নাম</label>
                                            <strong class="text-danger">*</strong>
                                            <input type="text" class="form-control" name="bank_check_details" value="{{ old('bank_check_details') }}" required=""
                                                placeholder="প্রদত্ত ব্যাংক একাউন্টের চেকের তথ্য">
                                        </div>
                                        <div class="form-group">
                                            <label>চেক এর নম্বর</label>
                                            <strong class="text-danger">*</strong>
                                            <input type="text" class="form-control" name="check_number" value="{{ old('check_number') }}" required=""
                                                placeholder="চেক এর নম্বর-">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>সদস্যের বয়সঃ</label>
                                            <input type="number" class="form-control" name="member_age" value="{{ old('member_age') }}" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>বর্তমান ঠিকানাঃ</label>
                                            <input type="text" class="form-control" name="current_address" value="{{ old('current_address') }}" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>স্থায়ী ঠিকানাঃ</label>
                                            <input type="text" class="form-control" name="permanent_address" value="{{ old('permanent_address') }}"
                                                placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>সদস্যের মোবাইল নম্বরঃ</label>
                                            <strong class="text-danger">*</strong>
                                            <input type="number" class="form-control" name="member_phone" value="{{ old('member_phone') }}" required=""
                                                placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>ব্যাংক হিসাব</label>
                                            <input type="number" class="form-control" name="bank_account" value="{{ old('bank_account') }}" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>বিনিয়োগের ধরণঃ</label>
                                            <strong class="text-danger">*</strong>
                                            <select name="loan_type" value="{{ old('loan_type') }}" id="" class="form-control" required="">
                                                <option value="">বিনিয়োগের ধরণ নির্বাচন</option>
                                                <option value="1">অলাভজনক</option>
                                                <option value="2">সুদবিহীন লোন</option>
                                                <option value="3">মাসিক লোন</option>
                                                <option value="4">১ বছর ভিত্তিক</option>
                                                <option value="5">২ বছর ভিত্তিক</option>
                                                <option value="6">৩ বছর ভিত্তিক</option>
                                                <option value="7">৪ বছর ভিত্তিক</option>
                                                <option value="8">৫ বছর ভিত্তিক</option>
                                                <option value="9">৬ বছর ভিত্তিক</option>
                                                <option value="10">৭ বছর ভিত্তিক</option>
                                                <option value="11">৮ বছর ভিত্তিক</option>
                                                <option value="12">৯ বছর ভিত্তিক</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>মোট ডিপোজিটের পরিমাণঃ</label>
                                            <strong class="text-danger">*</strong>
                                            <input type="number" class="form-control" name="total_deposit" value="{{ old('total_deposit') }}" required=""
                                                placeholder="বর্তমানে সমিতিতে মোট ডিপোজিটের পরিমাণ">
                                        </div>
                                        <div class="form-group">
                                            <label>চাহিত লোনের পরিমাণঃ</label>
                                            <strong class="text-danger">*</strong>
                                            <input type="number" class="form-control" name="expect_loan_amount" value="{{ old('expect_loan_amount') }}"
                                                required="" placeholder="চাহিত লোনের পরিমাণ">
                                        </div>
                                        <div class="form-group">
                                            <label>চাহিত লোন ডিপোজিটের কত শতাংশ?</label><br>
                                            <select name="expect_loan_amount_percentage" value="{{ old('expect_loan_amount_percentage') }}" id="" class="form-control">
                                                <option value="">নির্বাচন করুন</option>
                                                <option value="50"> ৫০%</option>
                                                <option value="90"> ৯০%</option>
                                                <option value="1.5"> ১.৫ গুন</option>
                                                <option value="2"> ২ গুন</option>
                                                <option value="3"> ৩ গুন</option>
                                                <option value="4"> ৪ গুন</option>
                                                <option value="5"> ৫ গুন</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>ব্যাবসা/চাকরি হতে মাসিক মোট আয়</label>
                                            <input type="number" class="form-control" name="yearly_income" value="{{ old('yearly_income') }}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>চাকরির ধরণ</label>
                                            <strong class="text-danger">*</strong>
                                            <select name="member_profession" value="{{ old('member_profession') }}" id="" class="form-control" required="">
                                                <option value="">চাকরির ধরণ নির্বাচন</option>
                                                <option value="government_service">সরকারি চাকুরী</option>
                                                <option value="autonomous">স্বায়ত্বশাসিত</option>
                                                <option value="semi_government">আধা সরকারি</option>
                                                <option value="bank_employment">ব্যাংক</option>
                                                <option value="private_employment">বেসরকারি চাকুরী</option>
                                                <option value="bussiness">ব্যবসা</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label> ব্যাবসা / চাকরীরত প্রতিষ্ঠানের নাম </label>
                                            <strong class="text-danger">*</strong>
                                            <input type="text" class="form-control" name="organization_name" value="{{ old('organization_name') }}" required=""
                                                placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>ব্যবসায়/চাকুরীতে পদবী</label>
                                            <strong class="text-danger">*</strong>
                                            <input type="text" class="form-control" name="member_title" value="{{ old('member_title') }}" required=""
                                                placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>মোট ব্যবসা/চাকুরীর আয়ুষকাল </label>
                                            <input type="number" class="form-control" name="total_year" value="{{ old('total_year') }}" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>মোট ব্যবসা/চাকুরীর বেতন-</label>
                                            <input type="number" class="form-control" name="total_salary" value="{{ old('total_salary') }}" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>আয়ের উপর পরিবারের নির্ভরশীল সদস্য সংখ্যা</label>
                                            <input type="number" class="form-control" name="family_member" value="{{ old('family_member') }}" placeholder="">
                                        </div>

                                        <div class="form-group">
                                            <label>চাকরি/ব্যবসায়ের ধরন </label>
                                            <input type="text" class="form-control" name="business_type" value="{{ old('business_type') }}" placeholder="">
                                        </div>

                                        <div class="form-group">
                                            <label>ভাড়া না নিজস্ব প্রতিষ্ঠান</label>
                                            <input type="text" class="form-control" name="rent_or_owner" value="{{ old('rent_or_owner') }}" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>একক না যৌথ মালিকানা</label>
                                            <input type="text" class="form-control" name="is_ownership" value="{{ old('is_ownership') }}" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>১ম ট্রেড লাইসেন্স ইস্যুর তারিখ</label>
                                            <input type="date" class="form-control" name="licence_issue_date" value="{{ old('licence_issue_date') }}"
                                                placeholder="">
                                        </div>

                                    </div>
                                </div>
                                <hr>
                                <h3 class="text-center"><u>রেফারেন্স ১</u></h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>সদস্যদের আই.ডি নম্বরঃ</label>
                                            <input type="number" class="form-control" name="ref1_nid_no" value="{{ old('ref1_nid_no') }}" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>সদস্যদের নামঃ</label>
                                            <input type="text" class="form-control" name="ref1_name" value="{{ old('ref1_name') }}" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>পেশাঃ</label>
                                            <input type="text" class="form-control" name="ref1_profession" value="{{ old('ref1_profession') }}" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>পূর্বে লোন গ্রহণ করেছেন কিনা?</label>
                                            <select name="ref1_have_previous_loan" value="{{ old('ref1_have_previous_loan') }}" id="" class="form-control">
                                                <option value="">পূর্বে লোন গ্রহণ নির্বাচন</option>
                                                <option value="1">ঋণ খেলাপি</option>
                                                <option value="2">সফল</option>
                                                <option value="3">চলমান</option>
                                                <option value="4">না</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>লোন গ্রহীতার সাথে সম্পর্কঃ</label>
                                            <select name="ref1_releation" value="{{ old('ref1_releation') }}" id="" class="form-control">
                                                <option value="">লোন গ্রহীতার সাথে সম্পর্ক নির্বাচন</option>
                                                <option value="1">নিকট আত্মীয়</option>
                                                <option value="2">আত্মীয়</option>
                                                <option value="3">বন্ধু</option>
                                                <option value="4">বন্ধু দ্বারা রেফারেন্স</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>মোবাইল নম্বরঃ</label>
                                            <input type="number" class="form-control" name="ref1_mobile_no" value="{{ old('ref1_mobile_no') }}"
                                                placeholder="মোবাইল নম্বরঃ">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>গ্রহীতা লোন প্রদান না করলে আমি প্রদানে বাধ্য থাকবঃ </label>
                                            <select name="ref1_quranted_sign" value="{{ old('ref1_quranted_sign') }}" id="" class="form-control">
                                                <option value="">নির্বাচন করুন</option>
                                                <option value="1">হ্যাঁ</option>
                                                <option value="2">না</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h3 class="text-center"><u>রেফারেন্স ২</u></h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>সদস্যদের আই.ডি নম্বরঃ</label>
                                            <input type="number" class="form-control" name="ref2_nid_no" value="{{ old('ref2_nid_no') }}" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>সদস্যদের নামঃ</label>
                                            <input type="text" class="form-control" name="ref2_name" value="{{ old('ref2_name') }}" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>পেশাঃ</label>
                                            <input type="text" class="form-control" name="ref2_profession" value="{{ old('ref2_profession') }}"
                                                placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>পূর্বে লোন গ্রহণ করেছেন কিনা?</label>
                                            <select name="ref2_have_previous_loan" value="{{ old('ref2_have_previous_loan') }}" id="" class="form-control">
                                                <option value="">পূর্বে লোন গ্রহণ নির্বাচন</option>
                                                <option value="1">ঋণ খেলাপি</option>
                                                <option value="2">সফল</option>
                                                <option value="3">চলমান</option>
                                                <option value="4">না</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>লোন গ্রহীতার সাথে সম্পর্কঃ </label>
                                            <select name="ref2_releation" value="{{ old('ref2_releation') }}" id="" class="form-control">
                                                <option value="">লোন গ্রহীতার সাথে সম্পর্ক নির্বাচন</option>
                                                <option value="1">নিকট আত্মীয়</option>
                                                <option value="2">আত্মীয়</option>
                                                <option value="3 ">বন্ধু</option>
                                                <option value="4">বন্ধু দ্বারা রেফারেন্স</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>মোবাইল নম্বরঃ</label>
                                            <input type="number" class="form-control" name="ref2_mobile_no" value="{{ old('ref2_mobile_no') }}"
                                                placeholder="মোবাইল নম্বরঃ">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>গ্রহীতা লোন প্রদান না করলে আমি প্রদানে বাধ্য থাকবঃ </label>
                                            <select name="ref2_quranted_sign" value="{{ old('ref2_quranted_sign') }}" id="" class="form-control">
                                                <option value="">নির্বাচন করুন</option>
                                                <option value="1">হ্যাঁ</option>
                                                <option value="0">না</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-5"></div>
                                    <div class="col-md-2">
                                        <input type="submit" value="বিনিয়োগের জন্য আবেদন করুন"
                                            class="btn btn-success center-block">
                                    </div>
                                </div>
                            </div>

                            <br>
                            <br>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
