<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Lawyer extends Model
{
    use HasFactory , HasApiTokens , Notifiable ;

    protected $table = 'lawyer';

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'city',
        'password',
        'repeat_password',
        'otp',
        'status',
        'phone_number',
        'experience',
        'last_activity',
    ];
}
