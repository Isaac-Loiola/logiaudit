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
        $request->validate([
            'spreadsheet' => ['required', 'file', 'mimes:xlsx,xls,csv'],
            'revenue' => ['required', 'file', 'mimes:pdf'],
        ]);

        $request->file('spreadsheet')->store('files', 'local');
        $request->file('revenue')->store('files', 'local');

        return back()->with('success', 'Arquivos enviados com sucesso.');
    }
}
