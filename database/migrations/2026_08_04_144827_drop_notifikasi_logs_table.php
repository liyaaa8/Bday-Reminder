<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 public function up()
{
    Schema::dropIfExists('notifikasi_logs');
}

public function down()
{
    //
}
};
