<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class LawyerOffice extends Model
{
    use HasFactory;
    protected $table = 'lawyer_office';
    protected $fillable = ['lawyer_uuid', 'google_map_url', 'lawyer_id', 'speciality_id' , 'law_office' , 'call_number' , 'whatsapp_number' , 'specialties' , 'speaking_english'];
    protected $casts = [
        'specialties' => 'array',
    ];
    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class);
    }

    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }
    public function lawyerUuid()
    {
        return $this->belongsTo(Lawyer::class, 'lawyer_uuid', 'uuid');
    }
}
