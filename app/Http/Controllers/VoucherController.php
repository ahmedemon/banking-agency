<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function _construct()
    {
        $this->middleware('role:admin|manage|accountant');
    }

    public function index()
    {
        return view('voucher.index');
    }
}
