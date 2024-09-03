@extends('layouts.frontend.app', ['pageTitle' => 'Staff List'])

@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="element-header text-center">Print Staff List</h6>
                        <div class="element-box">
                            <form method="POST" action="https://app.bluestarsomithi.com/panel/print-staff" accept-charset="UTF-8" target="blank" class="form-inline justify-content-center"><input name="_token" type="hidden" value="CVeX8xgfEjkezYoe2Sp6Opoop8c7GybpeVUSqTbX">
                                <div class="form-element control-rounded text-center">
                                    <label for="branch" class="sr-only">Select Branch</label>
                                    <select class="form-control rounded" id="branch" name="branch">
                                            <option selected value="">All Branch</option>
                                        @foreach ($allBranch as $branch)
                                            <option value="{{$branch->id}}">{{$branch->name}}</option>
                                        @endforeach
                                    </select>

                                    <label for="status" class="sr-only">Status</label>
                                    <select class="form-control rounded text-center" id="status" name="status">
                                        <option selected value="3">All</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>

                                    <input class="btn btn-sm btn-primary" type="submit" value="Report">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
