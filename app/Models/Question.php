<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'question';
    protected $fillable = ['user_id','question_title', 'question_content', 'question_city', 'question_status', 'contact_method', 'case_specialization',  'question_time'];
    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
