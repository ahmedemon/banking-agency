@extends('layouts.frontend.app')
@section('content')
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="row">
                <div class="col-md-12">
                    <table id="" class="table table-bordered table-v2 table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Member</th>
                                <th>Account</th>
                                <th>Scheme</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Profit Get</th>
                                <th>Profit Paid</th>
                                <th>Receivable Profit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td class="align-middle">#</td>
                                <td class="align-middle">{{$fdr->starting_date}}</td>
                                <td class="align-middle">{{$fdr->ending_date}}</td>
                                <td class="align-middle">{{$fdr->member->m_name}}</td>
                                <td class="align-middle">{{$fdr->account}}</td>
                                <td class="align-middle">{{$fdr->scheme->name}}</td>
                                <td class="align-middle">{{$fdr->member->area_id}}</td>
                                <td class="align-middle">{{$fdr->amount}}</td>
                                <td class="align-middle">{{$fdr->profit()->sum('profit')}}</td>
                                <td class="align-middle">{{$fdr->withdraw()->sum('withdraw')}}</td>
                                <td class="align-middle">{{$receiveable}}</td>
                                <td class="align-middle">
                                    <a href="{{ route('fdr-withdraw.show', $fdr->id) }}" class="btn btn-sm btn-success p-1">Withdraw</a>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 offset-3">
                    <div class="element-box">
                        <div class="my-3">
                            <p class="card-header my-0"><strong>Note:</strong> The fields marked with ( <strong class="text-danger">*</strong> ) are required.</p>
                        </div>
                        <form method="POST" action="{{ route('fdr-withdraw.store') }}" accept-charset="UTF-8" note="Press OK to create Fixed Deposit account using following information.">
                            @csrf
                            <input name="fdr_id" type="hidden" value="{{$fdr->id}}">
                            <input type="hidden" readonly="" name="month" value="{{ date('m') }}">
                            <input type="hidden" readonly="" name="year" value="{{ date('Y') }}">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group row">
                                        <label for="start_date" class="col-form-label col-sm-4">Start Date &amp; FDR Amount</label>
                                        <div class="col-sm-4">
                                            <input class="form-control text-center" placeholder="FDR opening date" disabled="" name="start_date" type="text" value="{{$fdr->starting_date}}" id="start_date">
                                        </div>
                                        <div class="col-sm-4">
                                        <input class="form-control text-center" placeholder="Amount of FDR" disabled="" type="number" value="{{ $fdr->amount }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="date" class="col-form-label col-sm-4">Withdraw Date <strong class="text-danger">*</strong></label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center" placeholder="No need to select date for Today" name="date" type="date" value="{{ old('date') }}" id="date" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="get_profit" class="col-form-label col-sm-4">Receivable Profit</label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center" placeholder="Something error. Please reload" readonly="" name="get_profit" type="number" value="{{$receiveable}}" id="get_profit">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="withdraw" class="col-form-label col-sm-4">Withdrawal Profit <strong class="text-danger">*</strong></label>
                                        <div class="col-sm-8">
                                            <input class="form-control text-center mainAmount" min="1" max="{{$receiveable}}" required="" autofocus="" name="withdraw" type="number" id="withdraw" placeholder="Enter valuable withdrawal Amount">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="note" class="col-form-label col-sm-4">Withdrawal Note</label>
                                        <div class="col-sm-8">
                                            <textarea rows="1" class="form-control text-center" placeholder="Withdrawal note if have" name="note" cols="50" id="note"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input class="btn btn-primary" style="width: 100%" type="submit" value="Submit">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
