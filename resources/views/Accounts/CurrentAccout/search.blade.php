@extends('layouts.frontend.app')
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-sm-6 offset-3">
                    <div class="element-box">
                        <div class="py-4">
                            <h6 class="element-header text-center pb-3">Member Search for Current Account</h6>
                            <form method="POST" action="{{route('current-account.search')}}" accept-charset="UTF-8" class="form-inline justify-content-center"><input name="_token" type="hidden" value="nJ2QC4ZVZwnytZRBGdCxQpZTEl32qKFxvtQNYukZ">
                                @csrf
                                <div class="form-element control-rounded text-center">
                                    <input class="form-control rounded text-center" placeholder="Input Account Number" required autofocus name="account" type="number" id="account">
                                    <input class="btn btn-primary" type="submit" value="Search">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
