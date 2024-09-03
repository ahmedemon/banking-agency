@extends('layouts.frontend.app')
@section('content')
    <div class="content-w container">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box">
                            <form method="POST" action="{{ route('closing.search') }}" accept-charset="UTF-8" class="form-inline justify-content-center">
                                @csrf
                                <div class="form-element control-rounded text-center d-flex flex-column w-50">
                                    <label for="type" class="sr-only">Close credential</label>
                                    <select class="form-control rounded text-center" required="" id="type" name="closing_type">
                                        <option value="">Select to close</option>
                                        <option value="1">Loan Account</option>
                                        <option value="2">FDR Account</option>
                                        <option value="3">DPS Account</option>
                                    </select>
                                    <label for="value" class="sr-only">Values</label>
                                    <input class="form-control rounded text-center mt-3" placeholder="Input AC Number" required="" autofocus="" name="account" type="number" id="value">
                                    <input class="btn btn-primary btn-lg mt-3" type="submit" value="Search">
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
