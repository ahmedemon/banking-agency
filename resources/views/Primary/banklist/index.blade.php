@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-wrapper">
                            <center>
                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#form-modal">Add Bank</button>
                            </center>
                            <h6 class="element-header">Bank Account List</h6>
                            <div class="element-box-tp">
                                <div class="table">
                                    <table class="table table-bordered table-v2 table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Bank Name</th>
                                                <th>Branch Name</th>
                                                <th>Account</th>
                                                <th>Balance</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($banks as $bank)
                                            <tr class="text-center">
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$bank->name}}</td>
                                                <td>{{$bank->branch}}</td>
                                                <td>{{$bank->account}}</td>
                                                <td>{{$bank->balance}}</td>
                                                <td class="text-center">
                                                    @if ($bank->active == true)
                                                        <a href="{{ route('bank-inactive', $bank->id) }}" class="badge badge-danger btn">Inactive</a>
                                                    @else
                                                        <a href="{{ route('bank-active', $bank->id) }}" class="badge badge-success btn">Active</a>
                                                    @endif
                                                </td>
                                                <td class="row-actions">
                                                    @role("admin|manager")
                                                        <a class="btn btn-sm btn-info text-white text-decoration-none mx-0" href="{{ route('banklist.edit', $bank->id) }}" onclick="return confirm('Are you sure? you want to edit {{ $bank->name }}?')">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a class="btn btn-sm btn-danger text-white text-decoration-none mx-0" href="#" onclick="bankDelete(this);" data-id="{{ $bank->id }}"  data-name="{{ $bank->name }}">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <form id="delete-form-{{ $bank->id }}" action="{{ route('banklist.destroy',$bank->id) }}" method="POST" class="d-none">
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


    <div class="modal fade" id="form-modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="formModal" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Bank form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">X</button>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="element-box my-0" id="add_form">
                                <h3 class="element-header text-center">Add new bank</h3>
                                <form method="POST" action="" accept-charset="UTF-8"
                                    note="Do you want to create new BANK ACCOUNT with following information?">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="name">Bank Name</label>
                                                <input class="form-control" placeholder="Input Bank Name" required="" autofocus="" value="{{ old('name') }}" name="name" type="text" id="name">
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="branch">Branch Name</label>
                                                <input class="form-control" placeholder="Name of Branch" required="" value="{{ old('branch') }}" name="branch" type="text" id="branch">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="active">Status</label>
                                                <select class="form-control" id="active" name="active">
                                                    <option value="" selected>Select Status</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="holder">Bank Account Name</label>
                                                <input class="form-control" placeholder="Bank Account Holder Name" value="{{ old('holder') }}" name="holder" type="text" id="holder">
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label for="account">Bank Account Number</label>
                                                <input class="form-control" placeholder="Bank Account Number" value="{{ old('account') }}" name="account" type="text" id="account">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="publish">Web Publish</label>
                                                <select class="form-control" required="" id="publish" value="{{ old('publish') }}" name="publish">
                                                    <option value="" selected>Select Section</option>
                                                    <option value="1">Public</option>
                                                    <option value="0">Private</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input class="form-control" placeholder="Specific Address" value="{{ old('address') }}" name="address" type="text" id="address">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="balance">Balance</label>
                                                <input class="form-control" placeholder="Account Balance" value="{{ old('balance') }}" name="balance" type="number" id="balance">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <br>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 text-center">
                                            <input class="btn btn-primary w-50" type="submit" value="Submit">
                                        </div>
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

        function bankDelete(elem){
            event.preventDefault();
            if (confirm('Are you sure? You want to delete ( '+ elem.dataset.name +' )?')) {
                document.getElementById('delete-form-'+ elem.dataset.id).submit();
            }
        }

    </script>
@endsection
