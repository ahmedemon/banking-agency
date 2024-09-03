@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box" id="add_form">
                            <form method="POST" action="{{ route('fixed-diposit-scheme.update', $fds_edit->id) }}" accept-charset="UTF-8">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-4 offset-4">
                                        <div class="form-group">
                                            <label for="name">Scheme Name</label>
                                            <input class="form-control" placeholder="Fixed Deposit Scheme Name" required="" autofocus="" name="name" value="{{old('name', $fds_edit->name)}}" type="text" id="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 offset-4">
                                        <div class="form-group">
                                            <label for="type">Fixed Deposit Type</label>
                                            <select class="form-control" id="type" name="type">
                                                <option value="0" {{$fds_edit->profit == 0 ? 'selected' : ''}}>Fixed Profit</option>
                                                <option value="1" {{$fds_edit->profit == 1 ? 'selected' : ''}}>Monthly Profit</option>
                                                <option value="2" {{$fds_edit->profit == 2 ? 'selected' : ''}}>Yearly Profit</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row duration">
                                    <div class="col-sm-4 offset-4">
                                        <div class="form-group">
                                            <label for="duration">Fixed Deposit Duration (months)</label>
                                            <input class="form-control" placeholder="Sequence in month" min="1" required="" name="duration" value="{{old('duration', $fds_edit->duration)}}" type="number" id="duration">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 offset-4">
                                        <div class="form-group">
                                            <label for="profit">Profit in percent</label>
                                            <div class="input-group">
                                                <input step="any" class="form-control" placeholder="Profit in percent"
                                                    min="0" max="100" required="" name="profit" value="{{old('profit', $fds_edit->profit)}}" type="number" id="profit">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 offset-4">
                                        <div class="form-group">
                                            <label for="note">Note</label>
                                            <input class="form-control" placeholder="Note" name="note" value="{{old('note', $fds_edit->note)}}" type="text" id="note">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 offset-4 text-center">
                                        <input class="btn btn-success w-100" type="submit" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
