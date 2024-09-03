@extends('layouts.frontend.app')
@section('content')
    <div class="row py-5">
        <div class="col-sm-6 offset-3">
            <div class="card-header bg-success">
                <h3 class="text-center text-white my-0 font-weight-regular">{{$member->m_name}}</h3>
            </div>
            <div class="element-box">
                <div class="row border">
                    <div class="col-sm-9 border" style="background: #DDC1F5">
                        <table class="table table-sm table-striped ">
                            <tbody>
                                <tr>
                                    <td>Account</td>
                                    <td>:</td>
                                    <td>{{$member->account}}</td>
                                </tr>
                                <tr>
                                    <td>Area</td>
                                    <td>:</td>
                                    <td colspan="4">{{$member->area->name}}</td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>:</td>
                                    <td colspan="4">{{$member->m_name}}</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>:</td>
                                    <td colspan="4">{{$member->m_village}}, {{$member->m_post}}, {{$member->m_thana}}, {{$member->m_district}}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>:</td>
                                    <td>{{$member->m_mobile}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-3 px-0 text-center">
                        <img id="photoF" src="{{asset($member->photo)}}" class="w-100" class="text-center">
                        <div class="pt-2">
                            @if($member->m_signature)
                            <img id="signatureF" src="{{asset('storage/uploads/members/' . $member->m_signature)}}" class="w-75" class="text-center">
                            @else
                                <small class="text-muted">Signature not found</small>
                            @endif
                            <b class="h6">Signature</b>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
