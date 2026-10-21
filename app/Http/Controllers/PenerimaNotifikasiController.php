<?php

namespace App\Http\Controllers;

use App\Models\NotificationReceiver;
use Illuminate\Http\Request;

class PenerimaNotifikasiController extends Controller
{
    public function index()
    {
        $receivers = NotificationReceiver::all();

        return view('notification_receivers.index', compact('receivers'));
    }

    public function create()
    {
        return view('notification_receivers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        NotificationReceiver::create([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        return redirect()
            ->route('notification-receivers.index')
            ->with('success', 'Penerima berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $receiver = NotificationReceiver::findOrFail($id);

        return view('notification_receivers.show', compact('receiver'));
    }

    public function edit(string $id)
    {
        $receiver = NotificationReceiver::findOrFail($id);

        return view('notification_receivers.edit', compact('receiver'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $receiver = NotificationReceiver::findOrFail($id);

        $receiver->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        return redirect()
            ->route('notification-receivers.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $receiver = NotificationReceiver::findOrFail($id);

        $receiver->delete();

        return redirect()
            ->route('notification-receivers.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}