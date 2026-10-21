<?php

namespace App\Imports;

use App\Models\Nasabah;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class NasabahImport implements ToModel, WithStartRow, WithCustomCsvSettings
{
    public function startRow(): int
    {
        return 3;
    }

    public function getCsvSettings(): array
{
    return [
        'delimiter' => ',',
    ];
}

    public function model(array $row)
    {
        if (empty($row[0])) {
            return null;
        }

        $tanggal = null;

        if (!empty($row[3])) {
            try {
                $tanggal = Carbon::parse(
                    str_replace('/', '-', trim($row[3]))
                )->format('Y-m-d');
            } catch (\Exception $e) {
                $tanggal = null;
            }
        }

        return new Nasabah([
            'nama' => trim($row[0]),
            'jabatan' => trim($row[1] ?? ''),
            'perusahaan' => trim($row[2] ?? ''),
            'tanggal_lahir' => $tanggal,
        ]);
    }
}
