@extends('layouts.frontend.app', ['pageTitle' => 'Staff List'])

@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-wrapper">
                            <center>
                                <a href="{{ route('staff.create') }}" class="btn btn-success btn-sm mx-auto">Add New Staff</a>
                                <a href="{{ route('staff.index') }}" class="btn btn-primary btn-sm mx-auto">All Staff List</a>
                                <a href="{{ route('staff-role.index') }}" class="btn btn-success btn-sm mx-auto">Manage Roles</a>
                                <a href="{{ route('staff-status.index') }}" class="btn btn-secondary btn-sm mx-auto">Staffs Status</a>
                                @role('admin')
                                    <a href="{{ route('user.create') }}" class="btn btn-info btn-sm mx-auto">Create User</a>
                                @endrole
                                {{-- <a href="{{ route('print-all-staff.index') }}" class="btn btn-primary btn-sm mx-auto">Print Staff List</a> --}}
                                {{-- <a href="#" class="btn btn-dark btn-sm mx-auto">Staff Award</a> --}}
                            </center>
                            <div class="element-box-tp">
                                <!--------------------START - Table with actions-------------------->
                                <div class="table-responsive">
                                    <h6 class="element-header">Staff List</h6>
                                    <table class="table table-bordered table-v2 table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Photo</th>
                                                <th>Staff Name</th>
                                                <th>Branch</th>
                                                <th>Designation</th>
                                                <th>User Role</th>
                                                <th>Joining</th>
                                                <th>Mobile</th>
                                                <th>Salary</th>
                                                <th>Manage Area</th>
                                                {{-- <th>Self Panel</th> --}}
                                                <th>Status</th>
                                                <th class="px-5">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($staffs as $staff)
                                                <tr class="text-center">
                                                    <td class="align-middle">{{ ($staffs->currentpage()-1) * $staffs->perpage() + $loop->iteration }}</td>
                                                    <td class="px-0 py-1">
                                                        <img src="{{ asset($staff->staff_image) }}" width="50px"
                                                            height="50px" title="Profile Picture">
                                                    </td>
                                                    <td class="align-middle text-left">{{ $staff->name }}</td>
                                                    <td class="align-middle">{{ $staff->branch_op->name }}</td>
                                                    <td class="align-middle">{{ $staff->designation }}</td>

                                                    <td class="align-middle">{{ $staff->role->role_designation }}</td>

                                                    <td class="align-middle">{{ $staff->join }}</td>
                                                    <td class="align-middle">{{ $staff->mobile }}</td>
                                                    <td class="align-middle">{{ $staff->salary }}</td>
                                                    <td class="align-middle">{{ $staff->area->name ?? '-'  }}</td>
                                                    {{-- <td class="align-middle">
                                                        <a href="#">
                                                            <button
                                                                class="btn btn-sm btn-outline-primary">{{ $staff->role->role_designation }}</button>
                                                        </a>
                                                    </td> --}}
                                                    <td class="text-center align-middle">
                                                        @if ($staff->active == 1)
                                                            Active
                                                        @else
                                                            Inactive
                                                        @endif
                                                    </td>
                                                    <td class="row-actions align-middle">
                                                        <div class="row text-center" style="display: block">

                                                            <button aria-expanded="false" aria-haspopup="true"
                                                                class="btn btn-primary dropdown-toggle dropdown-toggle-split mx-0"
                                                                data-toggle="dropdown" type="button"
                                                                style="padding: 2px; margin-right:10px">
                                                                <i class="fa fa-print"></i>
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" target="blank"
                                                                    href="{{ route('staff.Pad.Print', $staff->id) }}">
                                                                    Pad
                                                                    Print</a>
                                                                <a class="dropdown-item" target="blank"
                                                                    href="{{ route('staff.Page.Print', $staff->id) }}">
                                                                    Page
                                                                    Print</a>
                                                                {{-- <a class="dropdown-item" target="blank"
                                                                    href="{{ route('staff.ID.Print', $staff->id) }}"> ID
                                                                    Card</a> --}}
                                                            </div>
                                                            @role("admin|manager")
                                                                <a class="btn btn-sm btn-danger text-white mx-0"
                                                                href="{{ route('staff.edit', $staff->id) }}"
                                                                    onclick="return confirm('Are you sure? You want to edit ( {{ $staff->name }} ) '); ">
                                                                    <i class="fa fa-box"></i>
                                                                </a>
                                                                <a class="btn btn-sm btn-danger text-white mx-0" href="#"
                                                                onclick="staffDelete(this);" data-id="{{ $staff->id }}"
                                                                data-name="{{ $staff->name }}">
                                                                <i class="fa fa-trash"></i>
                                                                </a>
                                                                <form id="delete-form-{{ $staff->id }}"
                                                                    action="{{ route('staff.destroy', $staff->id) }}"
                                                                    method="POST" class="d-none">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                            @elserole("field-officer")
                                                            @endrole
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="mt-3">
                                    {{ $staffs->links() }}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function staffDelete(elem) {
            event.preventDefault();
            if (confirm('Are you sure? You want to edit ( ' + elem.dataset.name + ' )')) {
                document.getElementById('delete-form-' + elem.dataset.id).submit();
            }
        }
    </script>
@endsection
