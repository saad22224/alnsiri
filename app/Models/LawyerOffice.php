<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LawyerOffice extends Model
{
    use HasFactory;
    protected $table = 'lawyer_office';
    protected $fillable = ['office_name', 'office_address', 'office_phone', 'office_email', 'lawyer_id', 'speciality_id'];

    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class);
    }

    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }
}
