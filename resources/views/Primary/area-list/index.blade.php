@extends('layouts.frontend.app', ['pageTitle' => 'Area List'])

@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-wrapper">
                            <div class="text-center">
                                <a href="{{ route('area-list.create') }}" class="btn btn-success">Add New Area</a>
                                <a href="{{ route('area-list.index') }}" class="btn btn-primary">All Area List</a>
                            </div>
                            <h6 class="element-header"> Area List </h6>

                            <div class="element-box-tp">
                                <!--------------------START - Table with actions-------------------->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-v2 table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Branch Name</th>
                                                <th>Area Name</th>
                                                <th>Associate</th>
                                                <th>Members</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allArea as $area)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $area->branch->name }}</td>
                                                    <td>{{ $area->name }}</td>
                                                    <td>{{ $area->associate ? $area->associate->name : '' }}</td>
                                                    <td>{{ $area->members()->count() }}</td>

                                                    <td class="row-actions">
                                                        <div class="row text-center" style="display: block">
                                                            <a href="#" title="Area"><i
                                                                    class="os-icon os-icon-grid-10"></i></a>
                                                                @role("admin|manager")
                                                                    <a href="javascript:;"
                                                                        data-route="{{ route('area-list.delete', $area->id) }}"
                                                                        data-action='delete'>
                                                                        <i class="os-icon os-icon-ui-15" title="Delete"></i>
                                                                    </a>
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
                                    {{ $allArea->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const custAction = document.querySelectorAll("[data-action='delete']");
        custAction.forEach(element => {
            element.addEventListener('click', function() {
                if(confirm("Are you sure? You want to delete the branch?")){
                    const _deleteForm = document.createElement('form');
                    _deleteForm.action = this.dataset.route;
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
