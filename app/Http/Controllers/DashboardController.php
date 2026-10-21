<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Nasabah;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Total seluruh nasabah
        $totalNasabah = Nasabah::count();

        // Jumlah ulang tahun bulan ini
        $currentMonth = Carbon::now()->month;

        $birthdayThisMonth = Nasabah::whereMonth(
            'tanggal_lahir',
            $currentMonth
        )->count();


        // Ambil bulan yang dipilih dari dropdown
        $selectedMonth = $request->query('month');


        // Query data ulang tahun
        $query = Nasabah::query();


        // Jika user memilih bulan tertentu
        if (!empty($selectedMonth)) {

            $selectedMonth = (int) $selectedMonth;

            // Pastikan bulan hanya 1 - 12
            if ($selectedMonth >= 1 && $selectedMonth <= 12) {

                $query->whereMonth(
                    'tanggal_lahir',
                    $selectedMonth
                );

            } else {

                $selectedMonth = null;

            }
        }


        // Ambil daftar ulang tahun
        $birthdayList = $query
            ->orderByRaw('MONTH(tanggal_lahir)')
            ->orderByRaw('DAY(tanggal_lahir)')
            ->get();


        // Kelompokkan berdasarkan bulan
        $birthdayGroups = $birthdayList->groupBy(function ($nasabah) {

            return Carbon::parse(
                $nasabah->tanggal_lahir
            )->month;

        });


        return view('dashboard', compact(
            'totalNasabah',
            'birthdayThisMonth',
            'birthdayList',
            'birthdayGroups',
            'selectedMonth'
        ));
    }
}