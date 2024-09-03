@extends('layouts.frontend.app',['pageTitle' => "Add Members"])
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="element-wrapper">
                    <div class="col-md-12 mb-3">
                        <p class="card-header my-0"><strong>Note:</strong> The fields marked with ( <strong class="text-danger">*</strong> ) are required.</p>
                    </div>
                    <div class="element-box">
                        <form method="POST" action="{{ route('members.store') }}" accept-charset="UTF-8" id="formValidate"
                            note="Have you provide all information properly?" enctype="multipart/form-data"
                            novalidate="true">
                            @csrf

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
                                                    <strong class="text-danger">*</strong>
                                                    <select class="form-control" required="" id="area" name="area_id"
                                                        required>
                                                        <option value="">Select an Area</option>
                                                        @foreach ($areas as $area)
                                                            <option {{
                                                                $area->id == old('area_id') ? "selected" : ''
                                                            }} value="{{ $area->id }}">{{ $area->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_name">Member Name</label>
                                                    <strong class="text-danger">*</strong>
                                                    <input data-error="Name can't be blank" class="form-control"
                                                        placeholder="Member's Full Name" autofocus="" required=""
                                                        name="m_name" type="text" id="m_name" value="{{ old('m_name') }}">

                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_mobile">Mobile Number</label>
                                                    <input class="form-control" placeholder="01XXXXXXXXX"
                                                        pattern="01[3-9]\d{8}" name="m_mobile" type="tel" id="m_mobile"
                                                        value="{{ old('m_mobile') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_birthday">Date of Birth</label>
                                                    <input class="form-control" name="m_birthday" type="date"
                                                        id="m_birthday" value={{ old('m_birthday') }}>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_father">Member's Father</label>
                                                    <input class="form-control" placeholder="Name of Member's Father"
                                                        name="m_father" type="text" id="m_father" value="{{ old('m_father') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_mother">Member's Mother</label>
                                                    <input class="form-control" placeholder="Name of Member's Mother"
                                                        name="m_mother" type="text" id="m_mother" value="{{ old('m_mother') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_companion">Husband / Spouse</label>
                                                    <input class="form-control" placeholder="Name of life partner"
                                                        name="m_companion" type="text" id="m_companion" value="{{ old('m_companion') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_nid">National ID Number</label>
                                                    <input class="form-control" placeholder="NID number of member"
                                                        name="m_nid" type="number" id="m_nid" value="{{ old('m_nid') }}">
                                                </div>
                                            </div>


                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_gender">Gender of member</label>
                                                    <select class="form-control" id="m_gender" name="m_gender">
                                                        <option value="">Select gender</option>
                                                        <option value="1" {{ old('m_gender') == '1' ? 'selected' : '' }}>Male</option>
                                                        <option value="2" {{ old('m_gender') == '2' ? 'selected' : '' }}>Female</option>
                                                        {{-- <option value="3" {{ old('m_gender') == '3' ? 'selected' : '' }}>Other</option> --}}
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input class="form-control" placeholder="Email Address" name="email"
                                                        type="text" id="email" value="{{ old('email') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="second_mobile">Secondary Number</label>
                                                    <input class="form-control" placeholder="Additional Mobile Number"
                                                        pattern="01[3-9]\d{8}" name="second_mobile" type="tel"
                                                        id="second_mobile"  value="{{ old('second_mobile') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="profession">Profession</label>
                                                    <input class="form-control" placeholder="Like Business / Farmer"
                                                        name="profession" type="text" id="profession" value="{{ old('profession') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="business">Member Business Name</label>
                                                    <input class="form-control"
                                                        placeholder="Member business if available"
                                                        name="business" type="text" id="business" value="{{ old('business') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <legend><span>Present Address</span></legend>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="m_village" class="col-form-label col-sm-4">Village</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" placeholder="Name of present Village"
                                                            name="m_village" type="text" id="m_village" value="{{ old('m_village') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="m_post" class="col-form-label col-sm-4">Post Office</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control"
                                                            placeholder="Name of present Post Office" name="m_post"
                                                            type="text" id="m_post" value="{{ old('m_post') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="m_thana" class="col-form-label col-sm-4">Thana</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control"
                                                            placeholder="Name of present Upozila/Thana" name="m_thana"
                                                            type="text" id="m_thana" value="{{ old('m_thana') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="m_district" class="col-form-label col-sm-4">District</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control" placeholder="Name of present District"
                                                            name="m_district" type="text" id="m_district"  value="{{ old('m_district') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <legend><span>Permanent Address
                                            <input type="checkbox" name="same" id="sameAddr" onchange="setSameAddress();" {{ old('same') ? 'checked' : '' }}><small>(same)</small>
                                        </span></legend>

                                        <div id="permanent_address">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label for="p_village" class="col-form-label col-sm-4">Village</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control"
                                                                placeholder="Name of permanent village" name="p_village"
                                                                type="text" id="p_village" value="{{ old('p_village') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label for="p_post" class="col-form-label col-sm-4">Post Office</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" placeholder="Name of permanent Post"
                                                                name="p_post" type="text" id="p_post" value="{{ old('p_post') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label for="p_thana" class="col-form-label col-sm-4">Thana</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control"
                                                                placeholder="Name of permanent Thana/Upozila" name="p_thana"
                                                                type="text" id="p_thana"  value="{{ old('p_thana') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label for="p_district" class="col-form-label col-sm-4">District</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control"
                                                                placeholder="Name of permanent district" name="p_district"
                                                                type="text" id="p_district"  value="{{ old('p_district') }}">
                                                        </div>
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
                                                    <input class="form-control"
                                                        title="Max filesize 500 kb, Dimension 450(w)X650(h)" name="m_photo"
                                                        type="file" id="m_photo">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="m_signature"
                                                        title="Max filesize 500 kb, Dimension 450(w)X650(h)">Signature
                                                        card</label>
                                                    <input class="form-control"
                                                        title="Max filesize 500 kb, Dimension 450(w)X650(h)"
                                                        name="m_signature" type="file" id="m_signature">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="nid_attachment"
                                                        title="Max filesize 500 kb, Dimension 450(w)X650(h)">Nation ID
                                                        Copy</label>
                                                    <input class="form-control"
                                                        title="Max filesize 500 kb, Dimension 450(w)X650(h)"
                                                        name="nid_attachment" type="file" id="nid_attachment">
                                                </div>
                                            </div>
                                        </div>

                                        <legend><span>Membership Information</span></legend>

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="admission_fee">Admission Fee</label>
                                                    <input class="form-control" placeholder="Admission Fee"
                                                        name="admission_fee" type="number" id="admission_fee" value="{{ old('admission_fee') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="form_fee">Admission Form Fee</label>
                                                    <input class="form-control"
                                                        placeholder="Admission form fee" name="form_fee"
                                                        type="number" id="form_fee" value="{{ old('form_fee') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="regular_savings">Savings Target / Day</label>
                                                    <input class="form-control" placeholder="Amount for regular savings" name="regular_savings"
                                                           type="number" id="regular_savings"  value="{{ old('regular_savings') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="total">Total</label>
                                                    <input class="form-control" placeholder="Amount for admission form"
                                                        disabled="" name="total" type="number" id="total" value="{{ old('total') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="join">Joining Date</label>
                                                    <input class="form-control" placeholder="No selection for today"
                                                        name="join" type="date" id="join"  value="{{ old('join') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="account">Account Number</label>
                                                    <strong class="text-danger">*</strong>
                                                    <input class="form-control" placeholder="Account Number" required=""
                                                        name="account" type="text" value="{{ old('account',$last_account_num) }}" id="account">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="active">Account Activation</label>
                                                    <select class="form-control" id="active" name="active">
                                                        <option value="1" value="{{ old('active', 1) == '1' ? 'selected' : '' }}">Active</option>
                                                        <option value="0" value="{{ old('active') == '0' ? 'selected' : '' }}">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 form-buttons-w text-center">
                                                <button type="submit" class="btn btn-success disabled"
                                                    style="font-weight: bolder"> Quick Submit
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
                                                    <input class="form-control" placeholder="Nominee's Full Name"
                                                        name="n_name" type="text" id="n_name" value="{{ old('n_name') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="n_relation">Nominee relation with Member</label>
                                                    <input class="form-control"
                                                        placeholder="ex: Brother/ Father / Son etc." name="n_relation"
                                                        type="text" id="n_relation" value="{{ old('n_relation') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="n_father">Nominee's Father Name</label>
                                                    <input class="form-control" placeholder="Name of Nominee's Father"
                                                        name="n_father" type="text" id="n_father" value="{{ old('n_father') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="n_mother">Nominee's Mother Name</label>
                                                    <input class="form-control" placeholder="Nominee's Mother Name"
                                                        name="n_mother" type="text" id="n_mother" value="{{ old('n_mother') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="n_nid">National ID Number</label>
                                                    <input class="form-control" placeholder="NID number of Nominee"
                                                        name="n_nid" type="text" id="n_nid" value="{{ old('n_nid') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="n_mobile">Mobile Number</label>
                                                    <input class="form-control" placeholder="91XXXXXXXX"
                                                        pattern="01[3-9]\d{8}" name="n_mobile" type="tel" id="n_mobile" value="{{ old('n_mobile') }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="n_photo">Member nominee phoot</label>
                                                    <input class="form-control" name="n_photo" type="file" id="n_photo">
                                                </div>
                                            </div>
                                        </div>
                                        <legend><span>Nominee Address</span></legend>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="n_village" class="col-form-label col-sm-4">Village</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control"
                                                            placeholder="Name of Nominee's Village" name="n_village"
                                                            type="text" id="n_village" value="{{ old('n_village') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="n_post" class="col-form-label col-sm-4">Post Office</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control"
                                                            placeholder="Name of Nominee's Post Office" name="n_post"
                                                            type="text" id="n_post" value="{{ old('n_post') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="n_thana" class="col-form-label col-sm-4">Thana</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control"
                                                            placeholder="Name of Nominee's Upozila/Thana" name="n_thana"
                                                            type="text" id="n_thana" value="{{ old('n_thana') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="n_district"
                                                        class="col-form-label col-sm-4">District</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control"
                                                            placeholder="Name of Nominee's District" name="n_district"
                                                            type="text" id="n_district" value="{{ old('n_district') }}">
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
                                                <button class="btn btn-primary">Submit Form</button>
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
    <script>
        function setSameAddress(){
            const isSameAddr = document.getElementById('sameAddr');
            const p_village  = document.getElementById('p_village');
            const m_village  = document.getElementById('m_village');
            const p_post     = document.getElementById('p_post');
            const m_post     = document.getElementById('m_post');
            const p_thana    = document.getElementById('p_thana');
            const m_thana    = document.getElementById('m_thana');
            const p_district = document.getElementById('p_district');
            const m_district = document.getElementById('m_district');

            p_village.removeAttribute('readonly');
            p_village.value = '';
            p_post.removeAttribute('readonly');
            p_post.value = '';
            p_thana.removeAttribute('readonly');
            p_thana.value = '';
            p_district.removeAttribute('readonly');
            p_district.value = '';

            $(function () {
                $('#permanent_address').show().slideDown(300);
            })

            if (isSameAddr.checked) {

                $(function () {
                    $('#permanent_address').show().slideUp();
                })

                p_village.setAttribute('readonly', '');
                p_village.value = m_village.value;
                p_post.setAttribute('readonly', '');
                p_post.value = m_post.value;
                p_thana.setAttribute('readonly', '');
                p_thana.value = m_thana.value;
                p_district.setAttribute('readonly', '');
                p_district.value = m_district.value;
            }

        }
    </script>
@endsection
