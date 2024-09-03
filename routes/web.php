<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Primary
use App\Http\Controllers\TestController;
use App\Http\Controllers\SavingsSchemeController;
use App\Http\Controllers\SavingsDipositController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Accounts\LoanController;
use App\Http\Controllers\Admin\Primary\AssetController;

use App\Http\Controllers\Admin\Primary\StaffController;
use App\Http\Controllers\Admin\Primary\OutloanController;
use App\Http\Controllers\Admin\Reports\ReportController;
use App\Http\Controllers\Admin\Accounts\ClosingController;
use App\Http\Controllers\Admin\Accounts\CurrentAccountController;
use App\Http\Controllers\Admin\Accounts\MembersController;
use App\Http\Controllers\Admin\Accounts\SavingsController;

// Accounts
use App\Http\Controllers\Admin\Primary\AreaListController;

// Savings
// use App\Http\Controllers\Admin\Primary\BankListController;
use App\Http\Controllers\Admin\Primary\StaffRoleController;

use App\Http\Controllers\Admin\Accounts\GeneralAcController;
use App\Http\Controllers\Admin\Primary\BranchListController;
use App\Http\Controllers\Admin\Primary\StaffPrintController;
use App\Http\Controllers\Admin\Primary\StaffStatusController;

//Credits
use App\Http\Controllers\Admin\Primary\DirectorListController;
use App\Http\Controllers\Admin\Primary\LoanCategoryController;
use App\Http\Controllers\Admin\Accounts\FixedDipositController;

// Debits
use App\Http\Controllers\Admin\Primary\VoucherCategoryController;
use App\Http\Controllers\Admin\Accounts\LoanApplicationController;
use App\Http\Controllers\Admin\Credit\CommonCollectionController;
// Voucher
use App\Http\Controllers\Admin\Primary\FixedDipositSchemeController;

// Reports
use App\Http\Controllers\Admin\Debits\FixedDepositProfitWithdrawController;
use App\Http\Controllers\Admin\Reports\CurrentAccountReportController;
use App\Http\Controllers\Admin\Reports\DpsReportController;
use App\Http\Controllers\Admin\Reports\FdrReportController;
use App\Http\Controllers\Admin\Reports\GeneralReportController;
use App\Http\Controllers\Admin\Reports\LoanReportController;
use App\Http\Controllers\Admin\Voucher\ExpenseController;
use App\Http\Controllers\Admin\Voucher\IncomeController;
use App\Http\Controllers\SavingsWithdrawController;
use App\Http\Controllers\StaffUserController;
use App\Http\Controllers\VoucherController;
use Illuminate\Support\Facades\Artisan;

Auth::routes();
Route::middleware(['auth'])->group(function () {

    // Route::get('test', [TestController::class, 'index']);

    // Primary
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware(['role:admin|manager'])->group(function () {
        // staff
        Route::get('/staff/pad-print/{id}', [StaffController::class, 'padPrint'])->name('staff.Pad.Print');
        Route::get('/staff/page-print/{id}', [StaffController::class, 'pagePrint'])->name('staff.Page.Print');
        Route::get('/staff/id-print/{id}', [StaffController::class, 'idPrint'])->name('staff.ID.Print');
        Route::get('/staff/status', [StaffStatusController::class, 'index'])->name('staff-status.index');
        Route::get('/staff/status/active/{id}', [StaffStatusController::class, 'active'])->name('staff-status.active');
        Route::get('/staff/status/inactive/{id}', [StaffStatusController::class, 'inactive'])->name('staff-status.inactive');
        Route::get('/print-all-staff', [StaffPrintController::class, 'index'])->name('print-all-staff.index');
        Route::get('/print-all-reports', [StaffPrintController::class, 'reports'])->name('print-all-staff.reports');
        Route::resource('staff', StaffController::class);
        Route::resource('staff-role', StaffRoleController::class);

        // branch list
        Route::prefix('/branch-list')->group(function () {
            Route::get('', [BranchListController::class, 'index'])->name('branch-list.index');
            Route::get('/create', [BranchListController::class, 'create'])->name('branch-list.create');
            Route::post('/store', [BranchListController::class, 'store'])->name('branch-list.store');
            Route::delete('/delete/{id}', [BranchListController::class, 'delete'])->name('branch-list.delete');
        });

        // area list
        Route::prefix('/area-list')->group(function () {
            Route::get('', [AreaListController::class, 'index'])->name('area-list.index');
            Route::get('/create', [AreaListController::class, 'create'])->name('area-list.create');
            Route::post('/store', [AreaListController::class, 'store'])->name('area-list.store');
            Route::delete('/delete/{id}', [AreaListController::class, 'delete'])->name('area-list.delete');
        });

        // director list
        Route::resource('director-list', DirectorListController::class);

        Route::resource('outloan', OutloanController::class);
        Route::get('/outloan-active/{id}', [OutloanController::class, 'active'])->name('outloan-active');
        Route::get('/outloan-inactive/{id}', [OutloanController::class, 'inactive'])->name('outloan-inactive');

        // bank list
        // Route::resource('banklist', BankListController::class);
        // Route::get('/bank-active/{id}', [BankListController::class, 'active'])->name('bank-active');
        // Route::get('/bank-inactive/{id}', [BankListController::class, 'inactive'])->name('bank-inactive');

        // voucher category
        Route::group(['prefix'=>'voucher', 'as'=>'voucher.', 'middleware' => 'role:admin|manager|accountant'], function() {
            Route::resource('expense', ExpenseController::class);
            Route::resource('income', IncomeController::class);

            Route::group(['prefix'=>'category', 'as'=>'category.'], function () {
                Route::get('',[VoucherCategoryController::class, 'index'])->name('index');
                Route::post('',[VoucherCategoryController::class, 'store'])->name('store');
                Route::get('edit/{id}',[VoucherCategoryController::class, 'edit'])->name('edit');
                Route::put('update/{id}',[VoucherCategoryController::class, 'update'])->name('update');
                Route::delete('destroy/{id}',[VoucherCategoryController::class, 'destroy'])->name('destroy');

                Route::get('active/{id}', [VoucherCategoryController::class, 'active'])->name('active');
                Route::get('inactive/{id}', [VoucherCategoryController::class, 'inactive'])->name('inactive');
            });
        });

        Route::resource('voucher',VoucherController::class);

        Route::resource('loancategory', LoanCategoryController::class);

        Route::resource('fixed-diposit-scheme', FixedDipositSchemeController::class);

        Route::resource('asset', AssetController::class);
    });


    // Member
    Route::resource('members', MembersController::class);

    // Savings -> routes
    Route::prefix('savings/scheme')->group(function () {
        Route::get('', [SavingsSchemeController::class, 'getScheme'])->name('savings.scheme.index');
        Route::post('/store', [SavingsSchemeController::class, 'storeScheme'])->name('savings.scheme.store');
        Route::get('/edit/{id}', [SavingsSchemeController::class, 'editScheme'])->name('savings.scheme.edit');
        Route::put('/update/{id}', [SavingsSchemeController::class, 'updateScheme'])->name('savings.scheme.update');
        Route::delete('/delete/{id}', [SavingsSchemeController::class, 'deleteScheme'])->name('savings.scheme.delete');
    });

    Route::prefix('savings')->group(function () {
        Route::post('new', [SavingsController::class, 'postNew'])->name('savings.new');
        Route::get('new/{id}', [SavingsController::class, 'getNew'])->name('savings.add');
        Route::get('closed-account', [SavingsController::class, 'closed'])->name('savings.closed');
        Route::get('paid-account', [SavingsController::class, 'paid'])->name('savings.paid');
    });

    Route::prefix('savings/deposit')->group(function () {
        Route::get('{account}/list', [SavingsDipositController::class, 'index'])->name('savings.deposit.index');
        Route::get('search', [SavingsDipositController::class, 'search'])->name('savings.deposit.search');
        Route::post('search', [SavingsDipositController::class, 'postSearch'])->name('savings.deposit.findout');
        Route::get('{id}/create', [SavingsDipositController::class, 'create'])->name('savings.deposit.create');
        Route::post('store', [SavingsDipositController::class, 'store'])->name('savings.deposit.store');
    });

    Route::prefix('savings/withdraw')->group(function () {
        Route::get('{account}/list', [SavingsWithdrawController::class, 'index'])->name('savings.withdraw.index');
        Route::get('search', [SavingsWithdrawController::class, 'search'])->name('savings.withdraw.search');
        Route::post('search', [SavingsWithdrawController::class, 'postSearch'])->name('savings.withdraw.search');
        Route::get('{account}/{id}/create', [SavingsWithdrawController::class, 'create'])->name('savings.withdraw.create');
        Route::post('store', [SavingsWithdrawController::class, 'store'])->name('savings.withdraw.store');
    });

    Route::get('savings/{id}/transactions', [SavingsController::class, 'show'])->name('savings.transactions');
    Route::resource('savings', SavingsController::class);

    // all ajax calls
    Route::prefix('ajax')->group(function () {
        Route::post('get/scheme-sequence', [SavingsSchemeController::class, 'ajaxSchemeSequence'])->name('ajax.scheme.sequence');
    });

    Route::prefix('general/account')->group(function () {
        Route::get('', [GeneralAcController::class, 'index'])->name('general-ac.index');

        Route::get('deposit/search', [GeneralAcController::class, 'getSearchDeposit'])->name('general-ac.search-deposit');
        Route::post('deposit/search', [GeneralAcController::class, 'postSearchDeposit'])->name('general-ac.search-deposit');
        Route::get('withdraw/search', [GeneralAcController::class, 'getSearchWithdraw'])->name('general-ac.search-withdraw');
        Route::post('withdraw/search', [GeneralAcController::class, 'postSearchWithdraw'])->name('general-ac.search-withdraw');

        Route::get('{account}/transactions', [GeneralAcController::class, 'transactions'])->name('general-ac.transactions');
        Route::get('{account}/deposit', [GeneralAcController::class, 'getDeposit'])->name('general-ac.deposit');
        Route::post('{account}/deposit', [GeneralAcController::class, 'postDeposit'])->name('general-ac.deposit');
        Route::get('{account}/withdraw', [GeneralAcController::class, 'getWithdraw'])->name('general-ac.withdraw');
        Route::post('{account}/withdraw', [GeneralAcController::class, 'postWithdraw'])->name('general-ac.withdraw');
    });


    // fixed deposit
    Route::resource('fixed-deposit', FixedDipositController::class);

    Route::prefix('fdr')->group(function () {
        Route::post('search', [FixedDipositController::class, 'postNewDiposit'])->name('fixed-diposit.fdn_new');
        Route::get('create/{scheme}/{member}', [FixedDipositController::class, 'getNewDipositId'])->name('fixed-diposit.fdn_get');

        Route::get('statememt/{id}', [FixedDipositController::class, 'statememt'])->name('fixed-diposit.statememt');
        Route::get('account/{id}', [FixedDipositController::class, 'account'])->name('fixed-diposit.account');
        Route::get('certificate/{id}', [FixedDipositController::class, 'certificate'])->name('fixed-diposit.certificate');
        Route::post('profit/{id}', [FixedDipositController::class, 'makeProfit'])->name('fixed-diposit.makeProfit');
    });

    Route::resource('fdr-withdraw', FixedDepositProfitWithdrawController::class);
    Route::post('/fdr-withdraw/search/', [FixedDepositProfitWithdrawController::class, 'postAccountNumber'])->name('fdr-withdraw.search');
    Route::get('/fdr-withdraw/withdraw/{id}', [FixedDepositProfitWithdrawController::class, 'getAccountNumber'])->name('fdr-withdraw.getAccNumber');


    // loan
    Route::prefix('loan')->group(function () {
        Route::get('invest', [LoanController::class, 'index'])->name('loan.index');
        Route::get('invest/{loanId}/show', [LoanController::class, 'show'])->name('loan.show');

        Route::get('create/search', [LoanController::class, 'search'])->name('loan.search');
        Route::post('create/search', [LoanController::class, 'postSearch'])->name('loan.search');

        Route::get('{account}/create', [LoanController::class, 'create'])->name('loan.create');
        Route::post('store', [LoanController::class, 'store'])->name('loan.store');
        Route::delete('destroy/{id}', [LoanController::class, 'delete'])->name('loan.destroy');

        // credit menu -> installment collection
        Route::get('collect/search', [LoanController::class, 'collectIndex'])->name('loan.collect.index');
        Route::post('collect/search', [LoanController::class, 'postCollectSearch'])->name('loan.collect.search');
        Route::get('collect/{account}/search', [LoanController::class, 'getCollectSearch'])->name('loan.collect.loan_list');
        Route::get('install/{loanId}/collect', [LoanController::class, 'createInstallment'])->name('loan.collect.create');
        Route::post('install/{loanId}/collect', [LoanController::class, 'storeInstallment'])->name('loan.collect.store');
    });
    Route::resource('loan-application', LoanApplicationController::class);

    // Comon collections
    Route::prefix('accounts')->group(function () {
        Route::get('{account}/collection', [CommonCollectionController::class, 'index'])->name('credits.common.index');
        Route::get('collection/search', [CommonCollectionController::class, 'search'])->name('credits.common.search');
        Route::post('collection/search', [CommonCollectionController::class, 'postSearch'])->name('credits.common.search');

    });


    // account closings
    Route::resource('closing', ClosingController::class);
    Route::post('/closing/search', [ClosingController::class, 'closingSearch'])->name('closing.search');
    Route::get('/fdr/closing/get/{id}', [ClosingController::class, 'getClosing'])->name('closing.get');

    // this is for loan closing
    Route::get('/loan/closing/get/{id}', [ClosingController::class, 'getLoanClosing'])->name('loan.closing.get');
    Route::post('loan/closing', [ClosingController::class, 'storeLoanClosing'])->name('loan.closing.store');

    // this is for dps closing
    Route::get('dps/closing/get/{id}', [ClosingController::class, 'getDPSClosing'])->name('dps.closing.get');
    Route::post('dps/closing', [ClosingController::class, 'storeSavingsClosing'])->name('dps.closing.store');
    // current account controller

    Route::resource('current-account', CurrentAccountController::class);

    Route::prefix('/current/account')->group(function () {
        Route::get('/search', [CurrentAccountController::class, 'getSearch'])->name('current-account.create');
        Route::post('/search', [CurrentAccountController::class, 'getAccount'])->name('current-account.search');
        Route::get('/use/{account}', [CurrentAccountController::class, 'useAccount'])->name('current-account.use');
        Route::get('/withdraw/{id}', [CurrentAccountController::class, 'withdrawRoute'])->name('current-account.withdraw');
        Route::post('/amount/withdraw/{id}', [CurrentAccountController::class, 'withdraw'])->name('current-amount.withdraw');
    });
    // Reports
    Route::prefix('reports')->group(function () {

        Route::get('/collection/daily', [ReportController::class, 'index'])->name('report.index');
        Route::post('/collection/daily', [ReportController::class, 'report'])->name('report.show');

        // general report controller
        Route::get('/general/search', [GeneralReportController::class, 'generalSearch'])->name('report.general.search');
        Route::get('/general/{account}', [GeneralReportController::class, 'index'])->name('report.general.index');
        Route::post('/general/find', [GeneralReportController::class, 'generalSearchAccount'])->name('report.general.search.post');
        // general report controller

        //dps report controller
        // Route::resource('/dps', DpsReportController::class);
        Route::get('/dps/search', [DpsReportController::class, 'dpsSearch'])->name('report.dps.search');
        Route::get('/dps/{account}', [DpsReportController::class, 'index'])->name('report.dps.index');
        Route::post('/dps/find', [DpsReportController::class, 'searchAccount'])->name('report.dps.search.post');
        //dps report controller

        //current account report controller
        // Route::resource('/dps', DpsReportController::class);
        Route::get('/current/account/search', [CurrentAccountReportController::class, 'caccountSearch'])->name('report.caccount.search');
        Route::get('/current/account/{account}', [CurrentAccountReportController::class, 'index'])->name('report.caccount.index');
        Route::post('/current/account/find', [CurrentAccountReportController::class, 'searchAccount'])->name('report.caccount.search.post');
        //current account report controller

        // loan report controller
        Route::get('/loan/search', [LoanReportController::class, 'loanSearch'])->name('report.loan.search');
        Route::get('/loan/{acount}', [LoanReportController::class, 'index'])->name('report.loan.index');
        Route::post('/loan/find', [LoanReportController::class, 'loanSearchAccount'])->name('report.loan.search.post');
        // loan report controller

        //dps report controller
        // Route::resource('/dps', DpsReportController::class);
        Route::get('/fdr/search', [FdrReportController::class, 'fdrSearch'])->name('report.fdr.search');
        Route::get('/fdr/{account}', [FdrReportController::class, 'index'])->name('report.fdr.index');
        Route::post('/fdr/find', [FdrReportController::class, 'searchAccount'])->name('report.fdr.search.post');
        //dps report controller
    });

    // staff user account
    Route::get('users', [StaffUserController::class, 'index'])->name('user.index')->middleware('role:admin');

    Route::group(['prefix'=>'user'], function(){
        Route::middleware(['role:admin'])->group(function () {
            Route::get('create', [StaffUserController::class, 'create'])->name('user.create');
            Route::get('form/{staffId}', [StaffUserController::class, 'form'])->name('user.form');
            Route::post('store/{staffId}', [StaffUserController::class, 'store'])->name('user.store');
            Route::delete('delete/{user}', [StaffUserController::class, 'delete'])->name('user.delete');

            Route::get('roles', [StaffUserController::class, 'roles'])->name('user.role.index');
            Route::get('role/create', [StaffUserController::class, 'roleCreate'])->name('user.role.create');
            Route::delete('role/{id}', [StaffUserController::class, 'roleDelete'])->name('user.role.delete');

            Route::get('{user}/role/assign', [StaffUserController::class, 'assignRole'])->name('user.role.assign');
            Route::post('{user}/role/save', [StaffUserController::class, 'assignRoleSave'])->name('user.role.save');
            // Route::get('{user}/permission/give', [StaffUserController::class, 'show'])->name('user.give.permission');

        });

            Route::get('change-password', [StaffUserController::class, 'changePassword'])->name('user.change-password');
            Route::post('change-password/{id}', [StaffUserController::class, 'saveNewPassword'])->name('user.save-password');

        });

        Route::get('link-fs', function () {
            return Artisan::call('storage:link');
        })->middleware('role:admin');
    });

    // middleware end



// Route::get('test/cc', [TestController::class, 'create']);
// Route::get('test/r', [TestController::class, 'show']);
// Route::get('test/p', [TestController::class, 'profit']);
Route::get('test/d', [TestController::class, 'date']);
Route::get('test/dps', [TestController::class, 'dps']);
