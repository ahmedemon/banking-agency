@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="element-header text-center">Asset Information</h6>
                        <div class="element-box">
                            <div class="row">
                                <table class="table table-bordered table-v2">
                                    <thead class="text-center">
                                        <tr>
                                            <td>Branch</td>
                                            <td>Product</td>
                                            <td>Category</td>
                                            <td>Purchase Date</td>
                                            <td>Cost</td>
                                            <td>Retired</td>
                                            <td>Supplier</td>
                                            <td>Model</td>
                                            <td>Serial #</td>
                                            <td>Manual #</td>
                                            <td>Condition</td>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <tr>
                                            <td>{{ $view_asset->id }}</td>
                                            <td>{{ $view_asset->id }}</td>
                                            <td>{{ $view_asset->id }}</td>
                                            <td>{{ $view_asset->id }}</td>
                                            <td>{{ $view_asset->id }}</td>
                                            <td>{{ $view_asset->id }}</td>
                                            <td>{{ $view_asset->id }}</td>
                                            <td>{{ $view_asset->id }}</td>
                                            <td>{{ $view_asset->id }}</td>
                                            <td>{{ $view_asset->id }}</td>
                                            <td>{{ $view_asset->id }}</td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-wrapper">
                            <h6 class="element-header text-center">Asset value update history
                            </h6>
                            <div class="element-box-tp">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-v2 table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Update at</th>
                                                <th>Old Value</th>
                                                <th>Adjust Type</th>
                                                <th>Adjust percent</th>
                                                <th>Adjust Amount</th>
                                                <th>New Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                            <tr class="text-center" style="font-weight: bold">
                                                <td colspan="2">Summery :</td>
                                                <td>0</td>
                                                <td> --- </td>
                                                <td>0 %</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
