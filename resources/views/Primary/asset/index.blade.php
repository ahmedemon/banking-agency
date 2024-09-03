@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box" style="display: none" id="add_form">
                            <form method="POST" action="{{ route('asset.store') }}" accept-charset="UTF-8" id="formValidate" note="Asset be confirmed when you accept it." enctype="multipart/form-data" novalidate="true">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <p class="card-header my-0"><strong>Note:</strong> The fields marked with ( <strong class="text-danger">*</strong> ) are required.</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="date" class="col-form-label">Date of purchase</label>
                                                <strong class="text-danger">*</strong>
                                                <input class="form-control" name="date_of_purchase" type="date" id="date" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="retired" class="col-form-label">Retired Date</label>
                                                <input class="form-control" placeholder="Retrired Date" name="retired_date" type="date" id="retired">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="retired" class="col-form-label">Year</label>
                                                <input id="asset_in_year" class="form-control" placeholder="Asset In Year" name="asset_in_year" type="number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="category" class="col-form-label">Category</label>
                                                <strong class="text-danger">*</strong>
                                                <select class="form-control" require="" id="category" name="category">
                                                    <option selected="selected" value="">Select one</option>
                                                    <option value="1">স্থায়ী সম্পত্তি</option>
                                                    <option value="2">চলতি সম্পত্তি</option>
                                                    <option value="3">স্পর্শনীয় সম্পত্তি</option>
                                                    <option value="4">অস্পর্শনীয় সম্পত্তি</option>
                                                    <option value="5">কম্পিউটার ক্রয়</option>
                                                    <option value="6">পজেশন দেওয়া</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="branch" class="col-form-label">Product for Branch</label>
                                                <strong class="text-danger">*</strong>
                                                <select class="form-control" required="" id="branch" name="branch">
                                                    <option selected="selected" value="">Select a branch</option>
                                                    <option value="1">Main Branch</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="item_name" class="col-form-label">Item Name</label>
                                                <strong class="text-danger">*</strong>
                                                <input class="form-control" placeholder="Product Name" required="" name="item_name" type="text" id="item_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="condition" class="col-form-label">Condition</label>
                                                <strong class="text-danger">*</strong>
                                                <select class="form-control" required="" id="condition" name="condition">
                                                    <option value="1" selected="selected">New</option>
                                                    <option value="2">Recondition</option>
                                                    <option value="3">Used</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="description" class="col-form-label">Description</label>
                                                <input class="form-control" placeholder="Description" name="description" type="text" id="description">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="product_cost" class="col-form-label">Product cost</label>
                                                <strong class="text-danger">*</strong>
                                                <input class="form-control" placeholder="Product Purchase product_cost" required="" name="product_cost" type="number" id="cost">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="model_number" class="col-form-label">Model Number</label>
                                                <strong class="text-danger">*</strong>
                                                <input class="form-control" placeholder="Model Number" name="model_number" type="text" id="model_number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="warrenty_gurentee" class="col-form-label">Warrenty/Gurantee</label>
                                                <select class="form-control" id="warrenty_gurentee" name="warrenty_gurentee">
                                                    <option selected="selected" value="">No Warrenty/Gurantee</option>
                                                    <option value="0">Warranty</option>
                                                    <option value="1">Guaranty</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="warrent_duration_month" class="col-form-label">Warrenty Duration</label>
                                                <strong class="text-danger">*</strong>
                                                <input class="form-control" id="period" placeholder="Warrenty Duration (Month)" name="warrent_duration_month" type="number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="supplier" class="col-form-label">Supplier Name</label>
                                                <input class="form-control" placeholder="Name of Supplier" name="supplier_name" type="text" id="supplier">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="dept_type" class="col-form-label">Depreciation</label>
                                                <select class="form-control" required="" id="dept_type" name="dept_type">
                                                    <option value="0" selected="selected">Subtraction</option>
                                                    <option value="1">Addition</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <label for="dept_type" class="col-form-label">Input in parcent</label>
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">%</div>
                                                        <input step="any" id="percent" class="form-control" placeholder="Input in parcent" min="0" max="100" required="" name="percent" type="number" value="0">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="serial" class="col-form-label">Serial Number</label>

                                                <input class="form-control" placeholder="Product serial number" name="serial" type="text" id="serial">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="capture" class="col-form-label">Product Image</label>
                                                <input class="form-control" placeholder="Image of Product" style="padding-top: 3px; padding-bottom: 3px;" name="capture" type="file" id="capture">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="manual_number" class="col-form-label">Manual Number</label>
                                                <input class="form-control" placeholder="Manual Number" name="manual_number" type="text" id="manual_number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="vou_scan_copy" class="col-form-label">Attachment</label>
                                                <input class="form-control" placeholder="Voucher scan copy" style="padding-top: 3px; padding-bottom: 3px;" name="vou_scan_copy" type="file" id="vou_scan_copy">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <input class="btn btn-primary w-50 disabled" type="submit" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-wrapper">
                            <div class="element-box-tp">
                                <div class="text-center">
                                    <a href="#" class="btn btn-success btn-sm shadow-none">Categories</a>
                                    <a href="#" id="add_new" class="btn btn-success btn-sm shadow-none">Add new Asset</a>
                                    <a href="#" class="btn btn-success btn-sm shadow-none">Asset Depreciation</a>
                                </div>
                            </div>
                            <h6 class="element-header">Asset List</h6>
                            <div class="element-box-tp">
                                <!--------------------START - Table with actions-------------------->
                                <table id="example" class="table table-striped table-borderless border border-secondary">
                                    <thead class="table-dark">
                                        <tr role="row">
                                            <th>#</th>
                                            <th>Purchase Date</th>
                                            <th>Product Name</th>
                                            <th>Product Category</th>
                                            <th>Branch</th>
                                            <th>Retired Date</th>
                                            <th>Value</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($assets as $asset)
                                        <tr class="text-center odd" role="row">
                                            <td class="">{{$loop->iteration}}</td>
                                            <td class="sorting_1">{{$asset->date_of_purchase}}</td>
                                            <td>{{$asset->item_name}}</td>
                                            <td>{{$asset->category}}</td>
                                            <td>{{$asset->branch}}</td>
                                            <td>{{$asset->retired_date}}</td>
                                            <td>{{$asset->product_cost}}</td>
                                            <td class="row-actions text-center">
                                                <a class="btn btn-sm btn-danger text-white mx-0" target="_blank" href="{{route('asset.show', $asset->id)}}" onclick="return confirm('Are you sure? You want to show ( {{$asset->item_name}} )? '); ">
                                                    <i class="fas fa-expand-arrows-alt"></i>
                                                </a>
                                                @role("admin|manager")
                                                    <a class="btn btn-sm btn-danger text-white mx-0" href="{{ route('asset.edit', $asset->id) }}" onclick="return confirm('Are you sure? You want to view ( {{ $asset->item_name }} )? '); ">
                                                        <i class="fa fa-box"></i>
                                                    </a>
                                                    <a class="btn btn-sm btn-danger text-white mx-0" href="#" onclick="asset_Delete(this);" data-id="{{ $asset->id }}" data-name="{{ $asset->item_name }}">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $asset->id }}" action="{{ route('asset.destroy', $asset->id) }}" method="POST" class="d-none">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                @elserole("field-officer")
                                                @endrole
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="text-center" style="font-weight: bold">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Total :</td>
                                            <td>{{ $assets->sum('product_cost') }}</td>
                                            <td></td>
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
    <script>
        function asset_Delete(elem) {
            event.preventDefault();
            if (confirm('Are you sure? You want to edit ( ' + elem.dataset.name + ' )')) {
                document.getElementById('delete-form-' + elem.dataset.id).submit();
            }
        }
    </script>
@endsection

@push('javascripts')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
        <script>
            $("#add_new").click(function() {
                $("#add_form").toggle();
            });
            $("#address").change(function() {
                var link = "https://gps-coordinates.org/my-location.php?address=";
                $("#map").prop('href', link + $(this).val());
            })
        </script>
@endpush
