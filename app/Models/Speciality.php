<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use HasFactory;
    protected $table = 'speciality';
    protected $fillable = ['name', 'description', 'lawyer_id'];
    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class);
    }
}
