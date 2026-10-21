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

            $table->foreignId('notification_receiver_id')
                ->constrained('notification_receivers')
                ->cascadeOnDelete();

            $table->string('status');

            $table->text('message');

            $table->timestamps();
        });
    }
 
    public function down(): void
    {
        Schema::dropIfExists('notifikasi_logs');
    }
};