<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\NasabahImport;


class ImportController extends Controller
{

    public function index()
    {
        return view('import.index');
    }


    public function store(Request $request)
    {

        $request->validate([
            'file'=>'required|file',
        ]);


        Excel::import(
            new NasabahImport,
            $request->file('file')
        );


        return back()->with(
            'success',
            'Data berhasil diimport'
        );

    }
}