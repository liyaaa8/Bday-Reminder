<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Nasabah;
use App\Models\NotificationReceiver;
use App\Mail\BirthdayReminderMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Models\NotifikasiLog;

class BirthdayReminderCommand extends Command
{
    protected $signature = 'birthday:reminder';

    protected $description = 'Mengirim email reminder ulang tahun nasabah';

    public function handle()
    {
        $tomorrow = Carbon::tomorrow();

        $this->info(
            "Cek ulang tahun: " . $tomorrow->format('d-m-Y')
        );


        $nasabah = Nasabah::whereMonth(
                'tanggal_lahir',
                $tomorrow->month
            )
            ->whereDay(
                'tanggal_lahir',
                $tomorrow->day
            )
            ->get();


        if($nasabah->isEmpty()){

            $this->info('Tidak ada ulang tahun besok.');

            return;
        }


        $receivers = NotificationReceiver::all();


        foreach($nasabah as $customer){

            foreach($receivers as $receiver){

                Mail::to($receiver->email)
    ->send(new BirthdayReminderMail($receiver, $customer));

                NotifikasiLog::create([
                    'nasabah_id' => $customer->id,
                    'penerima_notifikasi_id' => $receiver->id,
                    'status' => 'Berhasil',
                    'message' => 'Email berhasil dikirim',
                ]);
            }

        }

        $this->info(
            'Reminder berhasil dikirim.'
        );
    }
}