@extends('layouts.frontend.app')

@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">

            <div class="row">
                <div class="col-sm-12">
                    <h6 class="element-header text-center">Member Search for Withdraw Collect</h6>
                    <div class="element-box">
                        <form method="POST" action="{{ route('savings.withdraw.search') }}" accept-charset="UTF-8" class="form-inline justify-content-center"> @csrf
                            <div class="form-element control-rounded text-center">
                                <label for="value" class="sr-only">Member Account</label>
                                <input class="form-control rounded text-center" placeholder="Input AC Number"
                                required autofocus name="account" type="number" id="value">

                                <input class="btn btn-primary" type="submit" value="Search">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
