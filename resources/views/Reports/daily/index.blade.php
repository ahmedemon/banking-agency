@extends('layouts.frontend.app')


@section('content')
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
</style>
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-md-12 px-0">
                    <div class="row justify-content-center">
                        {{-- <div class="col-md-3 d-flex justify-content-center align-items-center">
                        </div> --}}
                        <div class="col-sm-10 col-md-8  col-lg-6 text-center">
                            <img src="{{ asset('images/logo.png') }}" height="60" >

                            <h1 class="bangla_font2">ব্লু-স্টার সঞ্চয় ও ঋনদান সমবায় সমিতি লিঃ</h1>
                            <p class="">৮৩৯/৩৯ খান-এ-সবুর রোড, নতুন রাস্তা, দৌলতপুর, খুলনা।</p>
                            <h2 class="mb-3 bangla_font2"><u>ডেইলি কালেকশন শিট</u></h2>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-4 px-0">

                    <form action="{{ route('report.show') }}" method="POST" id="formValidate"> @csrf
                        <div class="input-group-sm px-0 row my-1">
                            <label class="align-middle px-0 col-4">শাখাঃ</label>
                            <select name="branch" id="branch" class="form-control shadow-none rounded-0 mx-0 col-8">
                                <option value="all">All Branch</option>
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group-sm px-0 row my-1">
                            <label class="align-middle px-0 col-4">এরিয়াঃ</label>
                            <select name="area" id="area" class="form-control shadow-none rounded-0 mx-0 col-8" required>
                                <option value="all" selected>All Area</option>
                                <option value="">Select Branch First</option>
                            </select>
                        </div>
                        <div class="input-group-sm px-0 row my-1">
                            <label class="align-middle px-0 col-4">ফিল্ড অফিসারের নামঃ</label>
                            <input type="text" readonly name="staff" id="staff" class="form-control bg-light shadow-none rounded-0 mx-0 col-8" placeholder="Select Area First">
                        </div>
                        <div class="input-group-sm px-0 row my-1">
                            <label class="align-middle px-0 col-4">তারিখঃ</label>
                            <input type="date" name="date" id="date" class="form-control bg-light shadow-none rounded-0 mx-0 col-8">
                        </div>
                        <div class="input-group-sm px-0 text-center" colspan='2'>
                            <input type="submit" class="btn btn-success btn-sm mx-0" value="Show Report">
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const branchesData = {!! $branches !!};
    const areasData = {!! $areas !!};
    const staffsData = {!! $staffs !!};

    const branch = document.getElementById('branch');
    const area = document.getElementById('area');

    branch.onchange = function () {
        $options = `<option value="">Select Area</option>`;

        if (branch.value == 'all') {
            $options = `<option value="all" selected>All Area</option><option value="">Select Branch First</option>`;
        }

        areasData.forEach(function (itemArea) {
            if(itemArea.branch_id == branch.value){
                $options += `<option value="${itemArea.id}">${itemArea.name}</option>`;
            }
        });
        area.innerHTML = $options;
    }

    area.onchange = function () {
        areasData.forEach(function (itemArea) {
            if(itemArea.id == area.value){
                staffsData.forEach(function (itemStaff) {
                    if (itemStaff.id == itemArea.associate_id) {
                        document.getElementById('staff').value = itemStaff.name;
                    }
                });
            }
        });
    }

</script>
@endsection
