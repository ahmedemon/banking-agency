@extends('layouts.frontend.app')
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-sm-12">
                    <div class="element-wrapper">
                        <center>
                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#form-modal">Add Voucher</button>
                        </center>
                        {{-- {!! Toastr::message() !!} --}}
                        <h6 class="element-header">Voucher List</h6>
                        <div class="element-box-tp">
                            <!--------------------START - Table with actions-------------------->
                            <div class="table">
                                <table class="table table-bordered table-v2 table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Voucher Type</th>
                                            <th>Voucher Name</th>
                                            <th>Voucher Link</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vouchers as $voucher)
                                        <tr class="text-center">
                                            <td class="align-middle">{{$loop->iteration}}</td>
                                            <td class="align-middle">
                                                {{ $voucher->type == true ? 'Income' : 'Expense' }}
                                            </td>
                                            <td class="align-middle">{{$voucher->name}}</td>
                                            <td class="align-middle">{{ $voucher->expenses->count() }}</td>
                                            <td class="text-center align-middle">
                                                @if ($voucher->active == true)
                                                <a href="{{ route('voucher.category.active', $voucher->id) }}" class="badge badge-success btn">Active</a>
                                                @else
                                                <a href="{{ route('voucher.category.inactive', $voucher->id) }}" class="badge badge-danger btn">Inactive</a>
                                                @endif
                                            </td>
                                            <td class="text-center align-middle">
                                                @role("admin|manager")
                                                    <a class="btn btn-sm btn-info text-white mx-0" href="{{route('voucher.category.edit', $voucher->id)}}" onclick="return confirm('Are you sure? You want to edit ( {{$voucher->name}} )? '); ">
                                                        <i class="fa fa-box"></i>
                                                    </a>
                                                    <a class="btn btn-sm btn-danger text-white mx-0" href="#" onclick="voucherDelete(this);" data-id="{{ $voucher->id }}"  data-name="{{ $voucher->name }}">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $voucher->id }}" action="{{ route('voucher.category.destroy', $voucher->id) }}" method="POST" class="d-none">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                @elserole("field-officer")
                                                @endrole
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="form-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Outloan Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">X</button>
                </button>
            </div>
            <div class="modal-body pb-0">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box my-0" id="add_form">
                            <h6 class="element-header text-center mb-5">New Voucher</h6>
                            <hr class="border-success">
                            <form method="POST" action="{{route('voucher.category.store')}}" accept-charset="UTF-8" note="Create new voucher using following input.">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6 offset-3">
                                        <div class="form-group">
                                            <label for="type">Voucher Type</label>
                                            <select class="form-control" required id="type" name="type">
                                                <option value="0" selected>Expense</option>
                                                <option value="1">Income</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 offset-3">
                                        <div class="form-group">
                                            <label for="name">Voucher Name</label>
                                            <input class="form-control" placeholder="Input voucher Name" required autofocus name="name" type="text" id="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 offset-3">
                                        <div class="form-group">
                                            <label for="active">Status</label>
                                            <select class="form-control" required id="active" name="active">
                                                <option value="">Select Account Status</option>
                                                <option value="0">Inactive</option>
                                                <option value="1" selected="selected">Active</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 text-center"></div>
                                    <div class="col-sm-4 text-center">
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <input class="btn btn-primary" type="submit" value="Submit">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 text-center"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<script>
    function voucherDelete(elem){
        event.preventDefault();
        if (confirm('Are you sure? You want to edit ( '+ elem.dataset.name +' )')) {
            document.getElementById('delete-form-'+ elem.dataset.id).submit();
        }
    }
</script>
@endsection
