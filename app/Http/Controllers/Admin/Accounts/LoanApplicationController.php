<?php

namespace App\Http\Controllers\Admin\Accounts;

use App\Http\Controllers\Controller;
use App\Models\Accounts\LoanApplication;
use App\Models\Accounts\LoanApplicationReference;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use League\CommonMark\Reference\Reference;

class LoanApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $loan_application = LoanApplication::latest()->get();
        return view('Accounts.Loan.application.index', compact('loan_application'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('Accounts.Loan.application.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'member_id' => 'required',
            'member_name' => 'required',
            'member_f_name' => 'required',
            'member_m_name' => 'required',
            'expect_loan_details' => 'required',
            'acount_type' => 'required',
            'loan_reason' => 'required',
            'previous_loan' => 'required',
            'loan_collection_method' => 'required',
            'bank_check_details' => 'required',
            'check_number' => 'required',
            'member_age' => 'required',
            'current_address' => 'required',
            'permanent_address' => 'required',
            'member_phone' => 'required',
            'bank_account' => 'required',
            'loan_type' => 'required',
            'total_deposit' => 'required',
            'expect_loan_amount' => 'required',
            'expect_loan_amount_percentage' => 'required',
            'yearly_income' => 'required',
            'member_profession' => 'required',
            'organization_name' => 'required',
            'member_title' => 'required',
            'total_year' => 'required',
            'total_salary' => 'required',
            'family_member' => 'required',
            'business_type' => 'required',
            'rent_or_owner' => 'required',
            'is_ownership' => 'required',
            'licence_issue_date' => 'required',
        ]);

        $loan_application = new LoanApplication($request->all());
        $loan_application->save();

        LoanApplicationReference::insert(
            [
                [
                    'ref1_nid_no' => $request->ref1_nid_no,
                    'ref1_name' => $request->ref1_name,
                    'ref1_profession' => $request->ref1_profession,
                    'ref1_have_previous_loan' => $request->ref1_have_previous_loan,
                    'ref1_releation' => $request->ref1_releation,
                    'ref1_mobile_no' => $request->ref1_mobile_no,
                    'ref1_quranted_sign' => $request->ref1_quranted_sign,
                ],
                [
                    'ref1_nid_no' => $request->ref2_nid_no,
                    'ref1_name' => $request->ref2_name,
                    'ref1_profession' => $request->ref2_profession,
                    'ref1_have_previous_loan' => $request->ref2_have_previous_loan,
                    'ref1_releation' => $request->ref2_releation,
                    'ref1_mobile_no' => $request->ref2_mobile_no,
                    'ref1_quranted_sign' => $request->ref2_quranted_sign,
                ]
            ]
        );

        return redirect()->route('loan-application.index')->with(Toastr::info('Loan Application successfully added! Status is pending!', 'Pending'));    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        $loan_application = LoanApplication::find($id);
        $loan_application_reference = LoanApplicationReference::find($id);
        return view('Accounts.Loan.application.view', compact('loan_application', 'loan_application_reference'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delete = LoanApplication::find($id);
        $delete->delete();
        return redirect()->back()->with(Toastr::warning('Loan application deleted successfully!', 'Deleted!'));
    }
}
