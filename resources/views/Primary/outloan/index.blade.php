@extends('layouts.frontend.app')
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-sm-12">
                    <div class="">
                        <center>
                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#form-modal">Add New Loan</button>
                        </center>
                        <h6 class="element-header">Out Loan Account List</h6>
                        <div class="element-box-tp">
                            <!--------------------START - Table with actions-------------------->
                            <div class="table ">
                                <table class="table table-bordered table-v2 table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Company</th>
                                            <th>Mobile</th>
                                            <th>Profession</th>
                                            <th>Balance</th>
                                            <th>Interest</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($loans as $loan)
                                            <tr>
                                                <td class="align-middle">{{$loop->iteration}}</td>
                                                <td class="align-middle">{{$loan->name}}</td>
                                                <td class="align-middle">{{$loan->company}}</td>
                                                <td class="align-middle">{{$loan->mobile}}</td>
                                                <td class="align-middle">{{$loan->profession}}</td>
                                                <td class="align-middle">{{$loan->balance}}</td>
                                                <td class="align-middle">{{$loan->interest}}</td>
                                                <td class="align-middle">
                                                    @if ($loan->active == true)
                                                        <a href="{{ route('outloan-inactive', $loan->id) }}" class="badge badge-danger btn">Inactive</a>
                                                    @else
                                                        <a href="{{ route('outloan-active', $loan->id) }}" class="badge badge-success btn">Active</a>
                                                    @endif
                                                </td>
                                                <td class="align-middle">
                                                    <a class="btn btn-sm btn-danger text-white mx-0" target="_blank" href="{{route('outloan.show', $loan->id)}}" onclick="return confirm('Are you sure? You want to show ( {{$loan->name}} )? '); ">
                                                        <i class="fas fa-expand-arrows-alt"></i>
                                                    </a>
                                                    @role("admin|manager")
                                                        <a class="btn btn-sm btn-danger text-white mx-0" href="{{route('outloan.edit', $loan->id)}}" onclick="return confirm('Are you sure? You want to edit ( {{$loan->name}} )? '); ">
                                                            <i class="fa fa-box"></i>
                                                        </a>
                                                        <a class="btn btn-sm btn-danger text-white mx-0" href="#" onclick="loanDelete(this);" data-id="{{ $loan->id }}"  data-name="{{ $loan->name }}">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <form id="delete-form-{{ $loan->id }}" action="{{ route('outloan.destroy', $loan->id) }}" method="POST" class="d-none">
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
                                        <tr style="font-weight: bold">
                                            <td colspan="5" class="text-right"> Total : </td>
                                            <td class="text-right">{{ $loans->sum('balance') }}</td>
                                            <td class="text-right">{{ $loans->sum('interest') }}</td>
                                            <td colspan="3"></td>
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


<div class="modal fade" id="form-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
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
                            <h6 class="element-header text-center">New Out loan Account</h6>
                            <form method="POST" action="{{ route('outloan.store') }}" accept-charset="UTF-8" note="Do you want to create new Out Loan with following information?">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input class="form-control" placeholder="Input Out Loan AC Name" required autofocus value="{{ old('name') }}" name="name" type="text" id="name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="mobile">Mobile Number</label>
                                            <input class="form-control" placeholder="Out Loan AC Mobile Number" required value="{{ old('mobile') }}" name="mobile" type="tel" id="mobile">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="company">Company</label>
                                            <input class="form-control" placeholder="Out Loan AC Company" value="{{ old('company') }}" name="company" type="text" id="company">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="profession">Profession</label>
                                            <input class="form-control" placeholder="Out Loan AC Profession" value="{{ old('profession') }}" name="profession" type="text" id="profession">
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
                                            <input class="form-control" placeholder="How much need loan?" value="{{ old('balance') }}" name="balance" type="number" id="balance">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="interest">Interest</label>
                                            <input class="form-control" placeholder="How much you give interest?" value="{{ old('interest') }}" name="interest" type="number" id="interest">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="active">Status</label>
                                            <select class="form-control" id="active" name="active">
                                                <option value="">Select Account Status</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <input class="btn btn-info btn-sm" type="submit" value="Submit">
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
    function loanDelete(elem){
        event.preventDefault();
        if (confirm('Are you sure? You want to edit ( '+ elem.dataset.name +' )')) {
            document.getElementById('delete-form-'+ elem.dataset.id).submit();
        }
    }
</script>
@endsection
