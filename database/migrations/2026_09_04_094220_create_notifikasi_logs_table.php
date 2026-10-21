<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::create('notifikasi_logs', function (Blueprint $table) {
        $table->id();

        $table->foreignId('nasabah_id')
            ->constrained('customers')
            ->cascadeOnDelete();

        $table->foreignId('penerima_notifikasi_id')
            ->constrained('notification_receivers')
            ->cascadeOnDelete();

        $table->string('status');
        $table->text('message')->nullable();

        $table->timestamps();
    });
}
};
