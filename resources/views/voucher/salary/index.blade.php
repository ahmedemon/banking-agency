@extends('layouts.frontend.app')
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">

            <div class="row">
                <div class="col-sm-12">
                    <h6 class="element-header text-center">Print out Collection Sheet</h6>
                    <div class="element-box">
                        <form method="POST" action="dashboard-statistics.html/report/sheet" accept-charset="UTF-8" class="form-inline justify-content-center"><input name="_token" type="hidden" value="rCGYOMVruXEEvSBDVMX5X46vb3xGjb1hXkO5cTiP">
                            <div class="form-element control-rounded text-center">


                                <label for="area" class="sr-only">Select Area</label>
                                <select class="form-control" multiple required name="area[]">
                                    <option value="1">Uttara Area</option>
                                    <option value="2">Dhanmondi Area</option>
                                    <option value="3">Mohakhali Area</option>
                                </select>



                                <input class="btn btn-primary" type="submit" value="Report">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection