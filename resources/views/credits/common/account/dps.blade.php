@forelse($member->active_dps as $dps)

    <div class="col-lg-4 col-md-6 mb-3">
        <div class="card">
            <div class="card-header text-center">
                <strong> Active DPS A/c </strong>
            </div>'
            <div class="card-body" style="height: 175px">
                <table class="table table-sm">
                    <tr>
                        <td>Target Amount</td>
                        <td class="text-right font-weight-bold">
                            <strong>{{ $dps->target_amount }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>Total Deposit</td>
                        <td class="text-right font-weight-bold">
                            <strong>{{ $dps->total_deposit }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>Total Withdraw</td>
                        <td class="text-right font-weight-bold">
                            <strong>{{ $dps->total_withdraw }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>Balance</td>
                        <td class="text-right font-weight-bold">
                            <strong>{{ $dps->balance }}</strong>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="card-footer text-center">

                <div class="row">
                    <div class="col">
                        <a href="{{ route('savings.transactions', $dps->id) }}" title="Transaction List"
                            class="p-2 text-white btn btn-block btn-sm btn-success my-md-1">
                            <i class="fas fa-bars"></i> Transactions</a>
                    </div>
                    <div class="col">
                        <a href="{{ route('savings.deposit.create', $dps->id) }}" title="Collect Installment"
                            class="p-2 text-white btn btn-sm btn-block btn-primary my-md-1">
                            <i class="fas fa-money-bill-alt"></i> Deposit </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

@empty

    <div class="col-lg-4 col-md-6">
        <div class="card">
            <div class="card-header text-center">
                <strong>  Active DPS A/c  </strong>
            </div>'
            <div class="card-body d-flex mx-auto align-items-center" style="height: 175px">
                <p> No running DPS found </p>
            </div>
            <div class="card-footer text-center">

                <div class="row">
                    <div class="col">
                        <a title="No Actions" class="p-2 btn btn-block btn-sm btn-secondary my-md-1 disabled text-white">
                            <i class="far fa-times-circle"></i> No Actions </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endforelse
