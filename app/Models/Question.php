<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Question extends Model
{
    use HasFactory;
    protected $table = 'question';
    protected $fillable = ['user_uuid','question_title', 'question_content', 'question_city', 'question_status', 'contact_method', 'case_specialization',  'question_time'];
    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class , 'uuid', 'lawyer_uuid');
    }

    public function user()
    {
        return $this->belongsTo(User::class , 'user_uuid', 'uuid');
    }
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }
}

