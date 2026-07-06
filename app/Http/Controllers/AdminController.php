<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function auditIndex()
    {
        return view('audit');
    }

    public function audit(Request $request)
    {

    }
}
