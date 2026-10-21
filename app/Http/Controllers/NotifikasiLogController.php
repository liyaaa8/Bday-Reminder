<?php

namespace App\Http\Controllers;

use App\Models\NotifikasiLog;
use Illuminate\Http\Request;

class NotifikasiLogController extends Controller
{

    public function index()
    {
         $logs = NotifikasiLog::with(['nasabah', 'receiver'])
                    ->latest()
                    ->paginate(20);

        return view('log_reminder.index', compact('logs'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(NotifikasiLog $notifikasiLog)
    {
        //
    }

 
    public function edit(NotifikasiLog $notifikasiLog)
    {
        //
    }

 
    public function update(Request $request, NotifikasiLog $notifikasiLog)
    {
        //
    }


    public function destroy(NotifikasiLog $notifikasiLog)
    {
        //
    }
}
