<?php

namespace App\Http\Controllers\Admin\Voucher;

use App\Helpers\FileManager;
use App\Http\Controllers\Controller;
use App\Models\Income;
use App\Models\Primary\Area;
use App\Models\Primary\BranchList;
use App\Models\Primary\VoucherCategory as Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class IncomeController extends Controller
{

    protected $rules = [
        'category_id' => 'required',
        'date' => 'required',
        'area_id' => 'required',
        'member_account' => 'nullable|exists:members,account',
        'branch' => 'nullable',
        'voucher_id' => 'nullable|numeric',
        'income_amount' => 'required|numeric',
        'income_by' => 'nullable',
        'note' => 'nullable',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomes = Income::orderByDesc('date')->paginate();
        $income_categories = Category::select('id','name')->where('type', 1)->get();

        if (auth()->user()->hasRole('admin')) {
            $areas = Area::select('id','name')->get();
            $branch = BranchList::find(1);
        } else {
            $branch = auth()->user()->staff->branch_op;
            $areas = Area::where('branch_id', auth()->user()->staff->branch_op->id)->get();
        }
        return view('voucher.income.index', compact('income_categories', 'areas', 'incomes','branch'));
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

        $income = new Income($request->except('capture'));
        $file = new FileManager();
        // member photo start
        if ($request->hasFile('capture')) {
            $capture = $request->file('capture');

            $file->folder('income')->prefix('income-photo')
                ->upload($capture);
            $income->capture = $file->getName();
        }
        // member photo end
        $income->save();

        return redirect()->route('voucher.income.index')->with(Toastr::success('Income added successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $expense = Income::find($id);
        // return view('voucher.expense.view', compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $edit = Income::find($id);
        // $vouchers = Category::select('id','name')->where('type', 0)->get();

        // if (auth()->user()->hasRole('admin')) {
        //     $areas = Area::select('id','name')->get();
        //     $branch = BranchList::find(1);
        // } else {
        //     $branch = auth()->user()->staff->branch_op;
        //     $areas = Area::where('branch_id', auth()->user()->staff->branch_op->id)->get();
        // }

        // return view('voucher.expense.edit', compact('edit', 'vouchers', 'areas', 'branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // $this->validate($request, $this->rules);

        // $expense = new Income($request->except('capture'));
        // $file = new FileManager();
        // // member photo start
        // if ($request->hasFile('capture')) {
        //     $capture = $request->file('capture');

        //     $file->folder('expense')->prefix('expense-photo')
        //         ->update($capture, $expense->capture);
        //     $expense->capture = $file->getName();
        // }
        // // member photo end
        // $expense->save();
        // return redirect()->route('voucher.expense.index')->with(Toastr::success('Expense Updated successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Income::find($id);
        $file = new FileManager();
        $file->folder('expense')->delete($delete->capture);

        $delete->delete();
        return redirect()->back()->with(Toastr::info('Expense deleted!'));
    }
}
