@extends('layouts.frontend.app', ['pageTitle'=>'All Users'])

@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row justify-content-center">

                    <div class="col-12 text-center mb-3">
                        <a class="btn btn-success" href="{{ route('user.role.create') }}">Create Role</a>
                        <a class="btn btn-primary" href="{{ route('user.index') }}">Manage Users</a>
                    </div>

                    <div class="col-sm-12 col-md-10 col-lg-8">
                        <table class="table table-sm border">

                            <tr class="text-center text-uppercase">
                                <th>#</th>
                                <th class="text-left">Role Designation</th>
                                <th class="text-left">Role Name (slug)</th>
                                <th class="text-center">Actions</th>
                            </tr>

                            @foreach ($roles as $role)
                                <tr>
                                    <td class="text-center"> {{ $loop->iteration }} </td>
                                    <td> {{ $role->role_designation }} </td>
                                    <td> {{ $role->name }} </td>
                                    <td> {{ $role->email }} </td>

                                    <td class="text-right">
                                        <a class="btn btn-sm btn-success py-0" href="{{ route('user.index') }}">Assign Role to User</a>
                                        {{-- <a class="btn btn-sm btn-primary py-0" href="{{ route('user.index') }}">Give Permission to Role</a> --}}
                                        @if ($role->id == 1)
                                            <a class="btn btn-sm btn-secondary py-0 disabled"><i class="fas fa-trash"></i></a>
                                        @else
                                            <a class="btn btn-sm btn-danger py-0" href="javascript:;" data-action='delete' data-href="{{ route('user.role.delete', $role->id) }}"><i class="fas fa-trash"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const custAction = document.querySelectorAll("[data-action='delete']");
        custAction.forEach(element => {
            element.addEventListener('click', function() {
                if (confirm("Are you sure? You want to delete the role?")) {
                    const _deleteForm = document.createElement('form');
                    _deleteForm.action = this.dataset.href;
                    _deleteForm.method = "POST";
                    const _csrfToken = document.createElement('input');
                    _csrfToken.name = "_token";
                    _csrfToken.type = "hidden";
                    _csrfToken.value = "{{ csrf_token() }}";
                    _deleteForm.appendChild(_csrfToken);
                    const _method = document.createElement('input');
                    _method.name = "_method";
                    _method.type = "hidden";
                    _method.value = "DELETE";
                    _deleteForm.appendChild(_method);
                    this.insertAdjacentElement("afterend", _deleteForm);

                    _deleteForm.submit();
                }
            });
        });
    </script>
@endsection
