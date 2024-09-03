@extends('layouts.frontend.app')
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-sm-12">
                    <div class="element-box" style="display: none" id="add_form">
                        <h6 class="element-header text-center">New Loan Category</h6>
                        <hr class="border-success">
                        <form method="POST" action="{{route('loancategory.store')}}" accept-charset="UTF-8" note="Do you want to create new loan category?">
                            @csrf
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="name">Category Name</label>
                                                <input class="form-control" placeholder="Name of category" required autofocus name="name" value="{{ old('name') }}" type="text" id="name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="interest_rate">Interest Rate</label>
                                                <input class="form-control" placeholder="Interest rate from 1-100 " step="any" min="0" max="100" name="interest_rate" value="{{ old('interest_rate') }}" type="number" id="interest_rate">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="duration">Loan duration (days)</label>
                                                <input class="form-control" placeholder="Loan duration in days" name="duration" value="{{ old('duration') }}" type="number" id="duration">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="max_amount">Max loan amount</label>
                                                <input class="form-control" placeholder="Max amount for loan provide" name="max_amount" value="{{ old('max_amount') }}" type="number" id="max_amount">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <br>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6 text-center">
                                    <input class="btn btn-success w-100" type="submit" value="Add new">
                                </div>
                                <div class="col-sm-3"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="element-wrapper">
                        <h6 class="element-header">Add new category
                            <strong id="add_new" style="cursor: pointer">
                                <i class="fa fa-plus-circle"></i>
                            </strong>
                        </h6>
                        <div class="element-box-tp">
                            <!--------------------START - Table with actions-------------------->
                            <div class="table-responsive">
                                <table class="table table-bordered table-v2 table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name </th>
                                            <th>Interest Rate</th>
                                            <th>Duration</th>
                                            <th>Max amount</th>
                                            <th>table.action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($loan_categories as $category)
                                        <tr class="text-center">
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->interest_rate}}</td>
                                            <td>{{$category->duration}}</td>
                                            <td>{{$category->max_amount}}</td>
                                            <td class="align-middle">
                                                @role("admin|manager")
                                                    <a class="btn btn-sm btn-danger text-white mx-0" href="{{route('loancategory.edit', $category->id)}}" onclick="return confirm('Are you sure? You want to edit ( {{$category->name}} )? '); ">
                                                        <i class="fa fa-box"></i>
                                                    </a>
                                                    <a class="btn btn-sm btn-danger text-white mx-0" href="#" onclick="loan_category_Delete(this);" data-id="{{ $category->id }}"  data-name="{{ $category->name }}">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $category->id }}" action="{{ route('loancategory.destroy', $category->id) }}" method="POST" class="d-none">
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
<script>
    function loan_category_Delete(elem){
        event.preventDefault();
        if (confirm('Are you sure? You want to edit ( '+ elem.dataset.name +' )')) {
            document.getElementById('delete-form-'+ elem.dataset.id).submit();
        }
    }
</script>
@endsection
@push('javascripts')
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
