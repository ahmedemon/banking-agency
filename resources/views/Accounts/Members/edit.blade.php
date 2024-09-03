@extends('layouts.frontend.app')
@section('content')
<div class="content-w">

    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper">
                <div class="element-box">

                        <form method="POST" action="{{route('members.update', $member->id)}}" accept-charset="UTF-8" id="formValidate" note="Have you provide all information properly?" enctype="multipart/form-data" novalidate="true">
                            @csrf
                            @method('PUT')
                            {{-- <input name="_token" type="hidden"
                                value="oHIr7uIGVAkpDnJxNbihN3KfVlLwJ9QxFiLpUjmU"> --}}
                            <div class="steps-w">
                                <div class="step-triggers">
                                    <a class="step-trigger active" href="#member" style="background: lightgray;">Member</a>
                                    <a class="step-trigger" href="#nominee" style="background: lightpink;">Nominee</a>




                                </div>
                                <div class="step-contents">
                                    <div class="step-content active" id="member"
                                        style="background: lightgray; padding-top: 15px; padding-bottom: 15px; border-radius: 5px">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="area">Select Area</label>
                                                    <select class="form-control" required="" id="area" name="area_id">
                                                        <option value="">Select Area</option>
                                                        @foreach ($areas as $area)
                                                            <option value="{{ $area->id }}" {{ $area->id == old('area_id', $member->area_id) ? 'selected' : '' }}>{{ $area->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group has-error has-danger">
                                                    <label for="m_name">Member Name</label>
                                                    <input data-error="Name can't be blank" class="form-control" placeholder="Member's Full Name" autofocus="" required="" name="m_name" type="text" id="m_name" value="{{ old('m_name',$member->m_name)}}">

                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_mobile">Mobile Number</label>
                                                    <input class="@error('m_mobile') is-invalid @enderror form-control" placeholder="01XXXXXXXXX" pattern="01[3-9]\d{8}" name="m_mobile" type="tel" id="m_mobile" value="{{old('m_mobile',$member->m_mobile)}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_birthday">Date of Birth</label>
                                                    <input class="@error('m_birthday') is-invalid @enderror form-control" name="m_birthday" type="date" id="m_birthday" value="{{ old('m_birthday',$member->m_birthday)}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_father">Member's Father</label>
                                                    <input class="@error('m_father') is-invalid @enderror form-control" placeholder="Name of Member's Father" name="m_father" type="text" id="m_father" value="{{ old('m_father',$member->m_father)}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_mother">Member's Mother</label>
                                                    <input class="@error('m_mother') is-invalid @enderror form-control" placeholder="Name of Member's Mother" name="m_mother" type="text" id="m_mother" value="{{ old('m_mother',$member->m_mother)}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_companion">Husband / Spouse</label>
                                                    <input class="@error('m_companion') is-invalid @enderror form-control" placeholder="Name of life partner" name="m_companion" type="text" id="m_companion" value="{{ old('m_companion',$member->m_companion)}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_nid">National ID Number</label>
                                                    <input class="@error('m_nid') is-invalid @enderror form-control" placeholder="NID number of member" name="m_nid" type="text" id="m_nid" value="{{ old('m_nid',$member->m_nid)}}">
                                                </div>
                                            </div>


                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_gender">Gender of member</label>
                                                    <select class="form-control" id="m_gender" name="m_gender">
                                                        <option value="0">Female</option>
                                                        <option value="1" selected="selected">Male</option>
                                                        <option value="2">Other</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input class="@error('email') is-invalid @enderror form-control" placeholder="Email Address" name="email" type="text" id="email" value="{{ old('email',$member->email)}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="second_mobile">Secondary Number</label>
                                                    <input class="@error('second_mobile') is-invalid @enderror form-control" placeholder="Additional Mobile Number" pattern="01[3-9]\d{8}" name="second_mobile" type="tel"id="second_mobile" value="{{old('',$member->second_mobile)}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="profession">Profession</label>
                                                    <input class="@error('profession') is-invalid @enderror form-control" placeholder="Like Business / Farmer" name="profession" type="text" id="profession" value="{{ old('profession',$member->profession)}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="business">member.business_name</label>
                                                    <input class="@error('business') is-invalid @enderror form-control" placeholder="member.input_business_name_if_available" name="business" type="text" id="business" value="{{ old('business',$member->business)}}">
                                                </div>
                                            </div>
                                        </div>
                                        <legend><span>Present Address</span></legend>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="m_village" class="col-form-label col-sm-4">Village</label>
                                                    <div class="col-sm-8">
                                                        <input class="@error('m_village') is-invalid @enderror form-control" placeholder="Name of present Village" name="m_village" type="text" id="m_village" value="{{ old('m_village',$member->m_village)}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="m_post" class="col-form-label col-sm-4">Post Office</label>
                                                    <div class="col-sm-8">
                                                        <input class="@error('m_post') is-invalid @enderror form-control" placeholder="Name of present Post Office" name="m_post" type="text" id="m_post" value="{{ old('m_post',$member->m_post)}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="m_thana" class="col-form-label col-sm-4">Thana</label>
                                                    <div class="col-sm-8">
                                                        <input class="@error('m_thana') is-invalid @enderror form-control" placeholder="Name of present Upozila/Thana" name="m_thana" type="text" id="m_thana" value="{{ old('m_thana',$member->m_thana)}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="m_district" class="col-form-label col-sm-4">District</label>
                                                    <div class="col-sm-8">
                                                        <input class="@error('m_district') is-invalid @enderror form-control" placeholder="Name of present District" name="m_district" type="text" id="m_district" value="{{ old('m_district',$member->m_district)}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <legend><span>Permanent Address <input type="checkbox"
                                                    id="same"><small>(same)</small></span>
                                        </legend>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="p_village" class="col-form-label col-sm-4">Village</label>
                                                    <div class="col-sm-8">
                                                        <input class="@error('p_village') is-invalid @enderror form-control" placeholder="Name of permanent village" name="p_village" type="text" id="p_village" value="{{ old('p_village',$member->p_village)}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="p_post" class="col-form-label col-sm-4">Post Office</label>
                                                    <div class="col-sm-8">
                                                        <input class="@error('p_post') is-invalid @enderror form-control" placeholder="Name of permanent Post" name="p_post" type="text" id="p_post" value="{{ old('p_post',$member->p_post)}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="p_thana" class="col-form-label col-sm-4">Thana</label>
                                                    <div class="col-sm-8">
                                                        <input class="@error('p_thana') is-invalid @enderror form-control" placeholder="Name of permanent Thana/Upozila" name="p_thana" type="text" id="p_thana" value="{{ old('p_thana',$member->p_thana)}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="p_district" class="col-form-label col-sm-4">District</label>
                                                    <div class="col-sm-8">
                                                        <input class="@error('p_district') is-invalid @enderror form-control" placeholder="Name of permanent district" name="p_district" type="text" id="p_district" value="{{ old('p_district',$member->p_district)}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <legend><span>Upload files</span></legend>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_photo"
                                                        title="Max filesize 500 kb, Dimension 450(w)X650(h)">Member Profile
                                                        Picture</label>
                                                    <input class="@error('m_photo') is-invalid @enderror form-control" title="Max filesize 500 kb, Dimension 450(w)X650(h)" name="m_photo" type="file" id="m_photo" value="{{ old('m_photo',$member->m_photo)}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_signature"
                                                        title="Max filesize 500 kb, Dimension 450(w)X650(h)">Signature
                                                        card</label>
                                                    <input class="@error('m_signature') is-invalid @enderror form-control" title="Max filesize 500 kb, Dimension 450(w)X650(h)" name="m_signature" type="file" id="m_signature" value="{{ old('m_signature',$member->m_signature)}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="nid_attachment"
                                                        title="Max filesize 500 kb, Dimension 450(w)X650(h)">Nation ID
                                                        Copy</label>
                                                    <input class="@error('nid_attachment') is-invalid @enderror form-control" title="Max filesize 500 kb, Dimension 450(w)X650(h)" name="nid_attachment" type="file" id="nid_attachment" value="{{ old('nid_attachment',$member->nid_attachment)}}">
                                                </div>
                                            </div>
                                        </div>
                                        <legend><span>Membership Information</span></legend>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="share_value">Share</label>
                                                    <div class="row col-sm-12">
                                                        <input step="100" min="0" class="form-control col-sm-7"
                                                            id="share_value" placeholder="Share Value" name="share_value"
                                                            type="number">
                                                        <input class="@error('sh') is-invalid @enderror form-control col-sm-5" id="share"
                                                            placeholder="Share Qty" name="share" type="number">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="field_name">Charge for</label>
                                                    <input class="@error('field_name') is-invalid @enderror form-control" placeholder="Charge for" name="field_name" type="text" id="field_name" value="{{ old('field_name',$member->field_name)}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="field_value">Charge amount</label>
                                                    <input class="@error('field_value') is-invalid @enderror form-control" placeholder="Charge amount" name="field_value" type="number" id="field_value" value="{{ old('field_value',$member->field_value)}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="admission_fee">Admission Fee</label>
                                                    <input class="@error('admission_fee') is-invalid @enderror form-control" placeholder="Admission Fee" name="admission_fee" type="number" id="admission_fee" value="{{ old('admission_fee',$member->admission_fee)}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="form_fee">Admission Form Fee</label>
                                                    <input class="@error('form_fee') is-invalid @enderror form-control" placeholder="member.amount_for_admission_form_fee" name="form_fee" type="number" id="form_fee" value="{{ old('form_fee',$member->form_fee)}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="regular_savings">Savings Target / Day</label>
                                                    <input class="@error('regular_savings') is-invalid @enderror form-control" placeholder="Amount for regular savings" name="regular_savings" type="number" id="regular_savings" value="{{ old('regular_savings',$member->regular_savings)}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="total">Total</label>
                                                    <input class="@error('total') is-invalid @enderror form-control" placeholder="Amount for admission form" disabled="" name="total" type="number" id="total" value="{{ old('total',$member->total)}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="join">Joining Date</label>
                                                    <input class="@error('join') is-invalid @enderror form-control" placeholder="No selection for today" name="join" type="date" id="join" value="{{ old('join',$member->join)}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="account">Account Number</label>
                                                    <input class="@error('account') is-invalid @enderror form-control" placeholder="Account Number" required="" name="account" type="text" id="account" value="{{ old('account',$member->account)}}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="active">Account Activation</label>
                                                    <select class="form-control" id="active" name="active">
                                                        <option value="0"{{ old('active', $member->active) ? ' selected' : '' }}>Inactive</option>
                                                        <option value="1"{{ old('active', $member->active) ? ' selected' : '' }}>Active</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 form-buttons-w text-center">
                                                <button type="submit" class="btn btn-success disabled"
                                                    style="font-weight: bolder"> Update
                                                </button>
                                            </div>
                                            <div class="col-sm-6 form-buttons-w text-center">
                                                <a class="btn btn-primary step-trigger-btn" href="#nominee">Nominee</a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="step-content" id="nominee"
                                        style="background: lightpink; padding-top: 15px; padding-bottom: 15px; border-radius: 5px">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="n_name">Nominee Name</label>
                                                    <input class="@error('n_name') is-invalid @enderror form-control" placeholder="Nominee's Full Name" name="n_name" type="text" id="n_name" value="{{ old('n_name',$member->n_name)}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="n_relation">Nominee relation with Member</label>
                                                    <input class="@error('n_relation') is-invalid @enderror form-control" placeholder="ex: Brother/ Father / Son etc." name="n_relation" type="text" id="n_relation" value="{{ old('n_relation',$member->n_relation)}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="n_father">Nominee's Father Name</label>
                                                    <input class="@error('n_father') is-invalid @enderror form-control" placeholder="Name of Nominee's Father" name="n_father" type="text" id="n_father" value="{{ old('n_father',$member->n_father)}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="n_mother">Nominee's Mother Name</label>
                                                    <input class="@error('n_mother') is-invalid @enderror form-control" placeholder="Nominee's Mother Name" name="n_mother" type="text" id="n_mother" value="{{ old('n_mother',$member->n_mother)}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="n_nid">National ID Number</label>
                                                    <input class="@error('n_nid') is-invalid @enderror form-control" placeholder="NID number of Nominee" name="n_nid" type="text" id="n_nid" value="{{ old('n_nid',$member->n_nid)}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="n_mobile">Mobile Number</label>
                                                    <input class="@error('n_mobile') is-invalid @enderror form-control" placeholder="91XXXXXXXX" pattern="01[3-9]\d{8}" name="n_mobile" type="tel" id="n_mobile" value="{{old('n_mobile',$member->n_mobile)}}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="n_photo">member.nominee's_photo_id</label>
                                                    <input class="@error('di') is-invalid @enderror form-control" name="n_photo" type="file" id="n_photo"> </div value="{{ old('di',$member->di)}}">
                                            </div>
                                        </div>
                                        <legend><span>Nominee Address</span></legend>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="n_village" class="col-form-label col-sm-4">Village</label>
                                                    <div class="col-sm-8">
                                                        <input class="@error('n_village') is-invalid @enderror form-control" placeholder="Name of Nominee's Village" name="n_village" type="text" id="n_village" value="{{ old('n_village',$member->n_village)}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="n_post" class="col-form-label col-sm-4">Post Office</label>
                                                    <div class="col-sm-8">
                                                        <input class="@error('n_post') is-invalid @enderror form-control" placeholder="Name of Nominee's Post Office" name="n_post" type="text" id="n_post" value="{{ old('n_post',$member->n_post)}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="n_thana" class="col-form-label col-sm-4">Thana</label>
                                                    <div class="col-sm-8">
                                                        <input class="@error('n_thana') is-invalid @enderror form-control" placeholder="Name of Nominee's Upozila/Thana" name="n_thana" type="text" id="n_thana" value="{{ old('n_thana',$member->n_thana)}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="n_district"
                                                        class="col-form-label col-sm-4">District</label>
                                                    <div class="col-sm-8">
                                                        <input class="@error('n_district') is-invalid @enderror form-control" placeholder="Name of Nominee's District" name="n_district" type="text" id="n_district" value="{{ old('n_district',$member->n_district)}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 form-buttons-w text-center">
                                                <a class="btn btn-primary step-trigger-btn" href="#member">Member</a>
                                            </div>
                                            <div class="col-sm-4 form-buttons-w text-center">
                                            </div>
                                            <div class="col-sm-4 form-buttons-w text-center">
                                                <button class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
