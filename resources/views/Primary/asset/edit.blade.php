@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <form method="POST" action="{{ route('asset.update', $edit_asset->id) }}" accept-charset="UTF-8" id="formValidate" note="Asset be confirmed when you accept it." enctype="multipart/form-data" novalidate="true">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label for="date" class="col-form-label">Date of purchase</label>
                                            <input class="form-control" name="date_of_purchase" value="{{ old('date_of_purchase', $edit_asset->date_of_purchase) }}" type="date" id="date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label for="retired" class="col-form-label">Retired Date</label>
                                            <input class="form-control" placeholder="Retrired Date" name="retired_date" value="{{ old('retired_date', $edit_asset->retired_date) }}" type="date" id="retired">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="retired" class="col-form-label">Year</label>
                                            <input id="asset_in_year" class="form-control" placeholder="Asset In Year" name="asset_in_year" value="{{ old('asset_in_year', $edit_asset->asset_in_year) }}" type="number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label for="category" class="col-form-label">Category</label>
                                            <select class="form-control" require="" id="category" name="category">
                                                <option selected="selected" value="">Select one</option>
                                                <option value="1" {{ $edit_asset->category == "1" ? 'selected' : "" }}>স্থায়ী সম্পত্তি</option>
                                                <option value="2" {{ $edit_asset->category == "2" ? 'selected' : "" }}>চলতি সম্পত্তি</option>
                                                <option value="3" {{ $edit_asset->category == "3" ? 'selected' : "" }}>স্পর্শনীয় সম্পত্তি</option>
                                                <option value="4" {{ $edit_asset->category == "4" ? 'selected' : "" }}>অস্পর্শনীয় সম্পত্তি</option>
                                                <option value="5" {{ $edit_asset->category == "5" ? 'selected' : "" }}>কম্পিউটার ক্রয়</option>
                                                <option value="6" {{ $edit_asset->category == "6" ? 'selected' : "" }}>পজেশন দেওয়া</option>
                                                <option value="7" {{ $edit_asset->category == "7" ? 'selected' : "" }}>chair</option>
                                                <option value="8" {{ $edit_asset->category == "8" ? 'selected' : "" }}>It is a long established fact that</option>
                                                <option value="9" {{ $edit_asset->category == "9" ? 'selected' : "" }}>Autul Chander Podder</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row has-error has-danger">
                                        <div class="col-sm-12">
                                            <label for="branch" class="col-form-label">Product for Branch</label>
                                            <select class="form-control" required="" id="branch" name="branch" value="{{ old('branch', $edit_asset->branch) }}">
                                                <option selected="selected" value="">Select a branch</option>
                                                <option value="1">Main Branch</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row has-error has-danger">
                                        <div class="col-sm-12">
                                            <label for="item_name" class="col-form-label">Item Name</label>
                                            <input class="form-control" placeholder="Product Name" required="" name="item_name" value="{{ old('item_name', $edit_asset->item_name) }}" type="text" id="item_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label for="condition" class="col-form-label">Condition</label>
                                            <select class="form-control" required="" id="condition" name="condition" value="{{ old('condition', $edit_asset->condition) }}">
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
                                            <input class="form-control" placeholder="Description" name="description" value="{{ old('description', $edit_asset->description) }}" type="text" id="description">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row has-error has-danger">
                                        <div class="col-sm-12">
                                            <label for="product_cost" class="col-form-label">Product product_cost</label>
                                            <input class="form-control" placeholder="Product Purchase product_cost" required="" name="product_cost" value="{{ old('product_cost', $edit_asset->product_cost) }}" type="number" id="cost">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label for="model_number" class="col-form-label">Model Number</label>
                                            <input class="form-control" placeholder="Model Number" name="model_number" value="{{ old('model_number', $edit_asset->model_number) }}" type="text" id="model_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label for="warrenty_gurentee" class="col-form-label">Warrenty/Gurantee</label>
                                            <select class="form-control" id="warrenty_gurentee" name="warrenty_gurentee" value="{{ old('warrenty_gurentee', $edit_asset->warrenty_gurentee) }}">
                                                <option selected="selected" value="">No Warrenty/Gurantee</option>
                                                <option value="0">Warranty</option>
                                                <option value="1">Guaranty</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="asset_in_month" class="col-form-label">Asset in month</label>
                                            <input class="form-control" id="period" placeholder="Asset in month" disabled="" name="asset_in_month" value="{{ old('asset_in_month', $edit_asset->asset_in_month) }}" type="number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label for="supplier" class="col-form-label">Supplier Name</label>
                                            <input class="form-control" placeholder="Name of Supplier" name="supplier_name" value="{{ old('supplier_name', $edit_asset->supplier_name) }}" type="text" id="supplier">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label for="dept_type" class="col-form-label">Depreciation</label>
                                            <select class="form-control" required="" id="dept_type" name="dept_type" value="{{ old('dept_type', $edit_asset->dept_type) }}">
                                                <option value="0" selected="selected">Subtraction</option>
                                                <option value="1">Addition</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <label for="dept_type" class="col-form-label">Input in parcent</label>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">%</div>
                                                    <input step="any" id="percent" class="form-control" placeholder="Input in parcent" min="0" max="100" required="" name="percent" value="{{ old('percent', $edit_asset->percent) }}" type="number" value="0">
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
                                            <input class="form-control" placeholder="Product serial number" name="serial" value="{{ old('serial', $edit_asset->serial) }}" type="text" id="serial">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label for="capture" class="col-form-label">Product Image</label>
                                            <input class="form-control" placeholder="Image of Product" style="padding-top: 3px; padding-bottom: 3px;" name="capture" value="{{ old('capture', $edit_asset->capture) }}" type="file" id="capture">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label for="manual_number" class="col-form-label">Manual Number</label>
                                            <input class="form-control" placeholder="Manual Number" name="manual_number" value="{{ old('manual_number', $edit_asset->manual_number) }}" type="text" id="manual_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label for="vou_scan_copy" class="col-form-label">Attachment</label>
                                            <input class="form-control" placeholder="Voucher scan copy" style="padding-top: 3px; padding-bottom: 3px;" name="vou_scan_copy" value="{{ old('vou_scan_copy', $edit_asset->vou_scan_copy) }}" type="file" id="vou_scan_copy">
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
        </div>
    </div>
@endsection
