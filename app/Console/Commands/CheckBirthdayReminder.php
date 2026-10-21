<?php

namespace App\Console\Commands;

use App\Mail\BirthdayReminderMail;
use App\Models\Nasabah;
use App\Models\NotifikasiLog;
use App\Models\NotificationReceiver;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;


class CheckBirthdayReminder extends Command
{

protected $signature = 'birthday:check';

    protected $description = 'Cek ulang tahun nasabah H-1 dan kirim email reminder';

    public function handle()
    {

        $tomorrow = Carbon::tomorrow();


        $customers = Nasabah::whereMonth(
                'tanggal_lahir',
                $tomorrow->month
            )
            ->whereDay(
                'tanggal_lahir',
                $tomorrow->day
            )
            ->get();

        if($customers->count() == 0){

            $this->info('Tidak ada ulang tahun besok.');

            return;

        }



        $receivers = NotificationReceiver::all();
        $this->info('Jumlah penerima: '.$receivers->count());



        foreach($customers as $customer){

            $this->info(
                "Nasabah ditemukan: ".$customer->nama." - ".$customer->tanggal_lahir
            );

            foreach($receivers as $receiver){

    //        $alreadySent = NotifikasiLog::where('nasabah_id', $customer->id)
  //  ->where('penerima_notifikasi_id', $receiver->id)
   // ->whereDate('created_at', $tomorrow())
 //   ->exists();

// if ($alreadySent) {
//    $this->info("Reminder untuk {$receiver->email} sudah pernah dikirim hari ini.");
  //  continue;
// }

              $this->info('Mengirim ke: ' . $receiver->email);
             try {

                  Mail::to($receiver->email)
    ->send(new BirthdayReminderMail($receiver, $customer));

                 $this->info('Berhasil: '.$receiver->email);

                    NotifikasiLog::create([
                        'nasabah_id' => $customer->id,
                        'penerima_notifikasi_id' => $receiver->id,
                        'status' => 'Berhasil',
                        'message' => 'Email berhasil dikirim',
                    ]);

                } catch (\Throwable $e) {

                    $this->error('Gagal ke '.$receiver->email);
                    $this->error($e->getMessage());

                    NotifikasiLog::create([
                        'nasabah_id' => $customer->id,
                        'penerima_notifikasi_id' => $receiver->id,
                        'status' => 'gagal',
                        'message' => 'Email reminder ulang tahun gagal dikirim: '.$e->getMessage()
                    ]);
                }
            }
        }

        $this->info('Reminder selesai dikirim.');
    }

}