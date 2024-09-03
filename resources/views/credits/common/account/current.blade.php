<div class="col-lg-4 col-md-6 mb-3">
    <div class="card">
        <div class="card-header text-center">
            <strong>Current Account</strong>
        </div>'
        <div class="card-body" style="height: 175px">
            <table class="table table-sm">
                <tr>
                    <td>Total Deposit</td>
                    <td class="text-right font-weight-bold">
                        <strong>{{ $member->cd_ac_total_deposit }}</strong>
                    </td>
                </tr>
                <tr>
                    <td>Total Withdraw</td>
                    <td class="text-right font-weight-bold">
                        <strong>{{ $member->cd_ac_total_withdraw }}</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"> &nbsp; </td>
                </tr>
                <tr>
                    <td>Balance</td>
                    <td class="text-right font-weight-bold">
                        <strong>{{ $member->cd_ac_balance }}</strong>
                    </td>
                </tr>
            </table>
        </div>
        <div class="card-footer text-center">

            <div class="row">
                <div class="col">
                    <a href="{{ route('current-account.index') }}" title="Transaction List"
                        class="p-2 text-white btn btn-block btn-sm btn-success my-md-1">
                        <i class="fas fa-bars"></i>  Transactions </a>
                </div>
                <div class="col">
                    <a href="{{ route('current-account.use', $member->account) }}" title="Take Deposit"
                        class="p-2 text-white btn btn-sm btn-block btn-primary my-md-1">
                        <i class="fas fa-money-bill-alt"></i> Take Deposit </a>
                </div>
            </div>

        </div>
    </div>
</div>
