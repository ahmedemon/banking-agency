@forelse($member->active_loan as $loan)

    <div class="col-lg-4 col-md-6 mb-3">
        <div class="card">
            <div class="card-header text-center">
                <strong> Active Loan/Invesment </strong>
            </div>'
            <div class="card-body" style="height: 175px">
                <table class="table table-sm">
                    <tr>
                        <td>Loan Amount</td>
                        <td class="text-right font-weight-bold">
                            <strong>{{ $loan->loan_amount }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>Loan Interest</td>
                        <td class="text-right font-weight-bold">
                            <strong>{{ $loan->total_interest }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>Total Paid</td>
                        <td class="text-right font-weight-bold">
                            <strong>{{ $loan->total_paid }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>Total Due</td>
                        <td class="text-right font-weight-bold">
                            <strong>{{ $loan->due_amount }}</strong>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="card-footer text-center">

                <div class="row">
                    <div class="col">
                        <a href="{{ route('loan.show', $loan->id) }}" title="Transaction List"
                            class="p-2 text-white btn btn-block btn-sm btn-success my-md-1">
                            <i class="fas fa-bars"></i> Transactions</a>
                    </div>
                    <div class="col">
                        <a href="{{ route('loan.collect.create', $loan->id) }}" title="Collect Installment"
                            class="p-2 text-white btn btn-sm btn-block btn-primary my-md-1">
                            <i class="fas fa-money-bill-alt"></i> Installment </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

@empty

    <div class="col-lg-4 col-md-6">
        <div class="card">
            <div class="card-header text-center">
                <strong> Active Loan/Invesment </strong>
            </div>'
            <div class="card-body d-flex mx-auto align-items-center" style="height: 175px">
                <p> No running loan/invesment </p>
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
