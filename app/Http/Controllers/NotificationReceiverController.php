<?php

namespace App\Http\Controllers;

use App\Models\NotificationReceiver;
use Illuminate\Http\Request;

class NotificationReceiverController extends Controller
{

    public function index()
    {
        $receivers = NotificationReceiver::all();

        return view(
            'notification_receivers.index',
            compact('receivers')
        );
    }


    public function create()
    {
        return view('notification_receivers.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'email'=>'required|email'
        ]);


        NotificationReceiver::create([
            'name'=>$request->name,
            'email'=>$request->email
        ]);


        return redirect()
            ->route('notification-receivers.index')
            ->with(
                'success',
                'Penerima notifikasi berhasil ditambahkan'
            );

    }

    
    public function edit($id)
    {

        $receiver = NotificationReceiver::findOrFail($id);


        return view(
            'notification_receivers.edit',
            compact('receiver')
        );

    }


    public function update(Request $request,$id)
    {

        $request->validate([
            'name'=>'required',
            'email'=>'required|email'
        ]);


        $receiver = NotificationReceiver::findOrFail($id);


        $receiver->update([
            'name'=>$request->name,
            'email'=>$request->email
        ]);


        return redirect()
            ->route('notification-receivers.index')
            ->with(
                'success',
                'Data berhasil diupdate'
            );

    }




    public function destroy($id)
    {

        NotificationReceiver::findOrFail($id)->delete();


        return back()
        ->with(
            'success',
            'Data berhasil dihapus'
        );

    }

}