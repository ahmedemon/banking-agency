@extends('layouts.frontend.app')
@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="text-center">
                            <a href="{{ route('members.create') }}">
                                <button class="btn btn-primary btn-sm">New Member</button>
                            </a>
                            <a href="#">
                                <button class="btn btn-info btn-sm">All Ac</button>
                            </a>
                            <a href="#">
                                <button class="btn btn-danger btn-sm">Deactivated</button>
                            </a>
                            <a title="Auto Activation / Inactivation" data-target="#syncModal" data-toggle="modal"
                                type="button">
                                <button class="btn btn-outline-secondary btn-sm">
                                    <i class="fa fa-recycle"></i>
                                </button>
                            </a>
                        </div>
                        <br>
                    </div>
                    <div class="col-sm-6">
                        <form class="form-inline justify-content-center" action=""
                            method="get">
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control text-center" placeholder="Name/Ac" name="search"
                                        value="{{ request()->query('search') }}">
                                </div>
                                {{-- <div class="col">
                                    <select class="form-control" name="area">
                                        <option value="">Areas</option>

                                        <option value="1">Uttara Area</option>
                                        <option value="2">Dhanmondi Area</option>
                                        <option value="3">Mohakhali Area</option>
                                    </select>
                                </div> --}}
                                <div class="col">
                                    <input class="btn btn-primary " type="submit" value="Submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br>

                <div class="row" style="margin: 0 10px">
                    <div class="col-sm-12">
                        <div class="element-wrapper">
                            <div class="element-box-tp">


                                <!--------------------START - Table with actions-------------------->
                                <div class="table-responsive">
                                    <table id="" class="table table-bordered table-v2 table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Ac</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>Area</th>
                                                <th>Join</th>
                                                <th>Gender</th>
                                                <th>Profession</th>
                                                <th>Status</th>
                                                <th>Photo</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($members as $key => $member)
                                                <tr class="text-center">
                                                    <td>{{ ($members ->currentpage()-1) * $members ->perpage() + $loop->index + 1 }}</td>
                                                    <td>{{ $member->account }}</td>

                                                    <td class="text-left">{{ $member->m_name }}</td>
                                                    <td>
                                                        <a href="tel:{{$member->m_mobile}}">
                                                            {{ $member->m_mobile }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        {{ $member->area->name }}
                                                    </td>
                                                    <td>{{ $member->m_join }}</td>
                                                    <td>
                                                        @if ($member->m_gender == 1) Male
                                                        @elseif ($member->m_gender == 2) Female
                                                        @else Other
                                                        @endif
                                                    </td>

                                                    <td>{{ $member->profession }}</td>


                                                    <td>
                                                        {{ $member->active ? 'Active' : 'Inactive' }}
                                                    </td>

                                                    <td>
                                                        <div class="cell-image-list">
                                                            <div class="cell-img"
                                                                style="background-image: url('{{ asset($member->photo) }}')">
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="text-center">
                                                        <div style="font-size: 18px;">
                                                            <a href="{{ route('members.edit', $member->id) }}"
                                                                title="Edit"><i class="os-icon os-icon-ui-49"></i></a> |
                                                            <a href="{{ route('members.show', $member->id) }}"
                                                                title="View Attachment"><i class="fa fa-image"></i></a>

                                                            @role("admin|manager")
                                                            |
                                                            <a class="btn btn-sm btn-danger text-white" href="javascript:" data-href="{{ route('members.destroy', $member->id) }}" data-action="delete" data-name="{{ $member->m_name }}">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                            @elserole("field-officer")
                                                            @endrole

                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="11" class="text-center">
                                                        No member found in the database
                                                    </td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center" style="display: block ruby;">
                                    {{ $members->links() }}
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
                if (confirm(`Are you sure? You want to delete [${this.dataset.name}]`)) {
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
