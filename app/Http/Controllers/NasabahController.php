<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use Illuminate\Http\Request;

class NasabahController extends Controller
{
    public function index(Request $request)
    {
        $query = Nasabah::query();

        if ($request->search) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $nasabah = $query->get();

        return view('customers.index', compact('nasabah'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal_lahir' => 'required|date',
        ]);

        Nasabah::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'perusahaan' => $request->perusahaan,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        return redirect()
            ->route('customers.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(Nasabah $customer)
    {
        return view('customers.edit', [
            'nasabah' => $customer
        ]);
    }

    public function update(Request $request, Nasabah $customer)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal_lahir' => 'required|date',
        ]);

        $customer->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'perusahaan' => $request->perusahaan,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        return redirect()
            ->route('customers.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Nasabah $customer)
    {
        $customer->delete();

        return redirect()
            ->route('customers.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
