@extends('layouts.frontend.app')
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-sm-12">
                    <div class="element-box" style="display: none" id="add_form">
                        <h6 class="element-header text-center">New Voucher Income</h6>
                        <form method="POST" action="{{ route('voucher.income.store') }}" accept-charset="UTF-8" note="Create new income category using following input." enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="category_id">Voucher Category</label>
                                        <select class="form-control" required id="category" name="category_id">
                                            @foreach ($income_categories as $item)
                                                <option value="{{$item->id}}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input class="form-control" placeholder="Input date if not today" name="date" type="date" id="date">
                                    </div>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="area">Select Area</label>
                                        <select name="area_id" class="form-control">
                                            @foreach ($areas as $area)
                                                <option value="{{$area->id}}">{{$area->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="area">Member Account Number</label>
                                        <input type="number" name="member_account" placeholder="Account number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="branch">Branch Name</label>
                                        <input name="branch" type="hidden" value="{{ $branch->name }}" id="branch">
                                        <input class="form-control" placeholder="No Branch Found" disabled
                                        name="branch_name" type="text" value="{{ $branch->name }}" id="branch_name">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="voucher_id">Voucher ID</label>
                                        <input class="form-control" placeholder="Input Voucher Id or not" name="voucher_id" type="number" id="voucher_id">
                                    </div>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="income_amount">Income Amount</label>
                                        <input class="form-control" placeholder="Input voucher amount" required name="income_amount" type="number" id="income_amount">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="income_by">Voucher By</label>
                                        <input class="form-control" placeholder="voucher by the person" name="income_by" readonly value="{{ Auth::user()->name }}" type="text" id="income_by">
                                    </div>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="capture">Attachment File (If any)</label>
                                        <input accept="image/*" class="" placeholder="Select or capture file if available" capture style="height:38px" name="capture" type="file" id="capture">
                                    </div>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="note">Income Details</label>
                                        <input class="form-control" placeholder="Input voucher note here" name="note" type="text" id="note">
                                    </div>
                                </div>
                                <div class="col-sm-2"></div>
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

            <div class="row">
                <div class="col-sm-12">
                    <div class="element-wrapper">
                        <h6 class="element-header">Income List
                            <strong id="add_new" style="cursor: pointer"><i class="fa fa-plus-circle"></i></strong>
                        </h6>
                        <div class="element-box-tp">
                            <!--------------------START - Table with actions-------------------->
                            <div class="table-responsive">
                                <table id="" class="table table-bordered table-v2 table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Voucher ID</th>
                                            <th>Date</th>
                                            <th>Area</th>
                                            <th>Member</th>
                                            <th>Category</th>
                                            <th>Amount</th>
                                            <th>voucher By</th>
                                            <th>Note</th>
                                            <th>Attachment</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($incomes as $item)
                                            <tr class="text-center">
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$item->voucher_id}}</td>
                                                <td>{{$item->date}}</td>
                                                <td>{{$item->area->name}}</td>
                                                <td>{{ empty($item->member_account) ? '-' : "{$item->member->m_name} ($item->member_account)"}} </td>
                                                <td>{{$item->category->name}}</td>
                                                <td>{{$item->income_amount}}</td>
                                                <td>{{$item->income_by}}</td>
                                                <td>{{$item->note}}</td>
                                                <td>
                                                    @if ($item->capture)
                                                    <a href="{{ asset('storage/uploads/income/' . $item->capture) }}" target="_blank">
                                                        <img class="" height="30px;" width="30px;" src="{{ asset('storage/uploads/income/' . $item->capture) }}" alt="Attachment">
                                                    </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{-- <a class="btn btn-sm btn-danger text-white mx-0" href="{{route('voucher.expense.edit', $item->id)}}" onclick="return confirm('Are you sure? You want to edit ( {{$item->name}} )? '); ">
                                                        <i class="fa fa-box"></i>
                                                    </a> --}}
                                                    @role('admin')
                                                        <a class="btn btn-sm btn-danger text-white mx-0" href="#" onclick="expenditureDelete(this);" data-id="{{ $item->id }}"  data-name="{{ $item->voucher_id }}">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <form id="delete-form-{{ $item->id }}" action="{{ route('voucher.income.destroy', $item->id) }}" method="POST" class="d-none">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    @endrole
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $incomes->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function expenditureDelete(elem){
        event.preventDefault();
        if (confirm('Are you sure? You want to edit ( '+ elem.dataset.name +' )')) {
            document.getElementById('delete-form-'+ elem.dataset.id).submit();
        }
    }
</script>
<script type="text/javascript">
    $("#add_new").click(function () {
        $("#add_form").toggle();
    });
    $("#address").change(function () {
        var link = "";
        $("#map").prop('href', link + $(this).val());
    })
</script>
<script type="text/javascript">
    $(".delete").click(function () {
        $(this).parents('form:first').submit();
    })
</script>
@endsection
