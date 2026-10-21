<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class NotificationReceiver extends Model
{

    use HasFactory;

protected $table = 'notification_receivers';

protected $fillable = [
    'name',
    'email'
];

}