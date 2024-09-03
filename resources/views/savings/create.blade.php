@extends('layouts.frontend.app')
@section('content')


    <div class="content-i">
        <div class="content-box">

            <div class="row">
                <div class="col-sm-12">

                    <div class="element-box">
                        <form method="POST" action="{{ route('savings.new') }}" accept-charset="UTF-8"
                            class="form-inline justify-content-center"> @csrf

                            <div class="form-element control-rounded text-center">

                                <label for="account" class="sr-only required">Values</label>
                                <input class="form-control rounded text-center" required autofocus style="font-size: 30px"
                                    placeholder="Input Account Number" name="account" type="number" id="account">

                                <input class="btn btn-primary btn-block mt-2 btn-lg" type="submit" value="Search">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
