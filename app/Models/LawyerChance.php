<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LawyerChance extends Model
{
    use HasFactory;
    protected $table = 'lawyer_chances';
    protected $fillable = ['order_number', 'case_type', 'case_details', 'speciality', 'city', 'date', 'price', 'status', 'user_id', 'lawyer_uuid'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class, 'lawyer_uuid', 'uuid');
    }
}
