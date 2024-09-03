@extends('layouts.frontend.app', ['pageTitle'=>'All Savings Account'])

@push('style')
    <style>
        tbody *:not(.row-actions){font-size: 0.8rem !important;}
    </style>
@endpush

@section('content')
    <div class="content-w">
        <div class="content-i">
            <div class="content-box">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="element-wrapper">

                            <div class="element-box-tp">
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <form class="form-inline justify-content-center" action="{{ route('savings.index') }}" method="get">
                                            <div class="form-element control-rounded text-center">
                                                <input type="text" class="form-control rounded text-center"
                                                    placeholder="Name or Account number" name="account" value="">
                                                <input class="btn btn-primary" type="submit" value="Filter">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="text-decoration-none" href="{{ route('savings.index') }}">
                                            <button class="btn btn-info">View All Acount</button>
                                        </a>
                                        <a class="text-decoration-none" href="{{ route('savings.closed') }}">
                                            <button class="btn btn-danger">Complete</button>
                                        </a>
                                        <a class="text-decoration-none" href="{{ route('savings.paid') }}">
                                            <button class="btn btn-success">Paid</button>
                                        </a>
                                    </div>
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <table id="" class="table table-bordered table-v2 table-striped">
                                        <thead>
                                            <tr>
                                                <th> Sl </th>
                                                <th> Scheme </th>
                                                <th> Ac </th>
                                                <th> Member </th>
                                                <th> Start </th>
                                                <th> End </th>
                                                <th> Profit  %</th>
                                                <th> Installment </th>
                                                <th> Amount </th>
                                                <th> Target </th>
                                                <th> Balance </th>
                                                <th> Profit </th>
                                                <th> Status </th>
                                                <th> Leger </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($savings as $dps)
                                                <tr class="text-center ">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $dps->scheme->name }}</td>
                                                    <td>{{ $dps->member->account }}</td>
                                                    <td>{{ $dps->member->m_name }}</td>
                                                    <td>{{ date("d M Y", strtotime($dps->start_date)) }}</td>
                                                    <td>{{ date("d M Y", strtotime($dps->expire_date)) }}</td>
                                                    <td>{{ $dps->interest_percent }}%</td>
                                                    <td>0/{{ $dps->installment }}</td>
                                                    <td>{{ $dps->savings_amount }}</td>
                                                    <td class="text-right">{{ $dps->installment * $dps->savings_amount }}</td>
                                                    <td class="text-right">{{ $dps->balance }}</td>
                                                    <td class="text-right">{{ $dps->balance * ($dps->interest_percent / 100) }}</td>
                                                    <td class="text-right">{!! $dps->status_html !!}</td>
                                                    <td class="text-right">{{ $dps->ledger_no }}</td>
                                                    <td class="row-actions">
                                                        <a href="{{ route('savings.transactions',$dps->id) }}" title="Transaction List" class="p-2 text-white badge badge-success">
                                                            <i class="fas fa-external-link-alt"></i></a>

                                                        <a href="{{ route('savings.deposit.create',$dps->id) }}" title="Take Deposit" class="p-2 text-white badge badge-primary">
                                                            <i class="fas fa-money-bill-alt"></i></a>

                                                        {{-- <a href="" title="Print" class="p-2 text-white badge badge-secondary">
                                                            <i class="fas fa-calendar"></i></a>
                                                        <button aria-expanded="false" aria-haspopup="true"
                                                            class="btn btn-sm btn-primary dropdown-toggle dropdown-toggle-split"
                                                            data-toggle="dropdown" type="button" >
                                                            <i class="fas fa-print"></i>
                                                            <span class="sr-only">&dArr;</span>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" target="blank" href="#"> Print</a>
                                                            <a class="dropdown-item" target="blank" href="#"> Certificate</a>
                                                        </div> --}}
                                                        @role("admin|manager")
                                                            @if($dps->status == '1')
                                                            <a class="p-2 text-white badge badge-danger" href="javascript:;" title="Delete"
                                                            data-href="{{ route('savings.destroy', $dps->id) }}" data-action="delete"><i class="os-icon os-icon-ui-15"></i></a>
                                                            @else
                                                            <a class="p-2 text-white badge badge-dark" title="Not deletable"><i class="os-icon os-icon-ui-15"></i></a>
                                                            @endif
                                                        @elserole("field-officer")
                                                        @endrole
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr><td class="text-center m-3" colspan="15">No DPS account created</td></tr>
                                            @endforelse


                                        </tbody>

                                    </table>
                                </div>

                                {{ $savings->links() }}

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
