<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lawyer;
use App\Models\User;

class LaweyrRate extends Model
{
    use HasFactory;
    protected $table = 'lawyer_rate';
    protected $fillable = ['rate_count', 'rate_value', 'lawyer_id', 'user_id'];
    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
