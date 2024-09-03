@extends('layouts.frontend.app')
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">

            <div class="row">
                <div class="col-sm-12">
                    <h6 class="element-header text-center">New Fixed Diposit Scheme</h6>
                    <div class="element-box">
                        <form method="POST" action="{{ route('fixed-diposit.fdn_new') }}" accept-charset="UTF-8" class="form-inline justify-content-center">
                            @csrf
                            <div class="form-element control-rounded text-center">
                                <label for="scheme" class="sr-only">Scheme</label>
                                <select class="form-control rounded mt-3 text-center w-100" required="" id="scheme" name="scheme">
                                    <option value="">Select Scheme</option>
                                    @foreach ($fds as $item)
                                        <option value="{{ $item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>

                                <label for="value" class="sr-only">Values</label>
                                <input class="form-control rounded text-center mt-3 mainAmount" required="" autofocus="" name="account" type="number" id="value" placeholder="Enter Account Number">

                                <input class="btn btn-primary mt-3 btn-lg btn-block" type="submit" value="Search">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
