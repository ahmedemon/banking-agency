@extends('layouts.frontend.app')
@section('content')
@push('css')

@endpush
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-box" style="display: none" id="add_form">
                            <form method="POST" action="{{ route('fixed-diposit-scheme.store') }}" accept-charset="UTF-8" note="Are you sure? you want to add?">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4 offset-4">
                                        <div class="form-group">
                                            <label for="name">Scheme Name</label>
                                            <input class="form-control" placeholder="Fixed Deposit Scheme Name" required="" autofocus="" name="name" value="{{ old('name') }}" type="text" id="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 offset-4">
                                        <div class="form-group">
                                            <label for="type">Fixed Deposit Type</label>
                                            <select class="form-control" id="type" name="type" value="{{ old('type') }}">
                                                <option value="1" selected>Fixed Profit</option>
                                                <option value="2">Monthly Profit</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row duration">
                                    <div class="col-sm-4 offset-4">
                                        <div class="form-group">
                                            <label for="duration">Fixed Deposit Duration (months)</label>
                                            <input class="form-control" placeholder="Sequence in month" min="1" required="" name="duration" value="{{ old('duration') }}" type="number" id="duration">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 offset-4">
                                        <div class="form-group">
                                            <label for="profit">Profit in percent</label>
                                            <div class="input-group">
                                                <input step="any" class="form-control" placeholder="Profit in percent" min="0" max="100" required="" name="profit" value="{{ old('profit') }}" type="number" id="profit">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 offset-4">
                                        <div class="form-group">
                                            <label for="note">Note</label>
                                            <input class="form-control" placeholder="Note" name="note" value="{{ old('note') }}" type="text" id="note">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 offset-4 text-center">
                                        <input class="btn btn-success w-100" type="submit" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-wrapper">
                            <h6 class="element-header">Fixed Deposit Scheme List
                                <strong id="add_new" style="cursor: pointer"><i class="fa fa-plus-circle"></i></strong>
                            </h6>
                            <div class="element-box-tp">
                                <!--------------------START - Table with actions-------------------->
                                <table id="example" class="table table-striped table-borderless border border-secondary text-center">
                                    <thead class="table-dark">
                                        <tr role="row">
                                            <th class="">#</th>
                                            <th class="">Structure Name</th>
                                            <th class="">Type</th>
                                            <th class="">Duration</th>
                                            <th class="">Profit</th>
                                            <th class="">Note</th>
                                            <th class="">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-sm">
                                        @foreach ($fds as $item)
                                            <tr class="text-center odd" role="row">
                                                <td class="sorting_1">{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    {{ $item->type == 1 ? 'Fixed Profit (Fixed)' : '' }}
                                                    {{ $item->type == 2 ? 'Monthly Profit (Monthly)' : '' }}
                                                </td>
                                                <td>
                                                    {{ $item->duration }}
                                                </td>
                                                <td>{{ $item->profit }}</td>
                                                <td>{{ $item->note }}</td>
                                                <td class="">
                                                    @role("admin|manager")
                                                        <a class="btn btn-sm btn-danger text-white mx-0" href="{{ route('fixed-diposit-scheme.edit', $item->id) }}" onclick="return confirm('Are you sure? You want to edit ( {{ $item->name }} )? '); ">
                                                            <i class="fa fa-box"></i>
                                                        </a>
                                                        <a class="btn btn-sm btn-danger text-white mx-0" href="#" onclick="fds_Delete(this);" data-id="{{ $item->id }}" data-name="{{ $item->name }}">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <form id="delete-form-{{ $item->id }}" action="{{ route('fixed-diposit-scheme.destroy', $item->id) }}" method="POST" class="d-none">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    @elserole("field-officer")
                                                    @endrole
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    {{-- <div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                    <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                                        <a class="paginate_button previous disabled" aria-controls="example" data-dt-idx="0" tabindex="-1" id="example_previous">Previous</a>
                                        <span>
                                            <a class="paginate_button current" aria-controls="example" data-dt-idx="1" tabindex="0">1</a>
                                            <a class="paginate_button " aria-controls="example" data-dt-idx="2" tabindex="0">2</a>
                                            <a class="paginate_button " aria-controls="example" data-dt-idx="3" tabindex="0">3</a>
                                            <a class="paginate_button " aria-controls="example" data-dt-idx="4" tabindex="0">4</a>
                                            <a class="paginate_button " aria-controls="example" data-dt-idx="5" tabindex="0">5</a>
                                            <a class="paginate_button " aria-controls="example" data-dt-idx="6" tabindex="0">6</a>
                                        </span>
                                        <a class="paginate_button next" aria-controls="example" data-dt-idx="7" tabindex="0" id="example_next">Next</a>
                                    </div> --}}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <script>
        function fds_Delete(elem) {
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
        } );
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
