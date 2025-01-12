<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lawyer;
class Moyaser extends Model
{
    use HasFactory;
    protected $fillable = ['payment_id', 'amount', 'currency', 'description', 'callback_url'];
    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class);
    }
}
