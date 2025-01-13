<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\Lawyer;
class Lawyer_answers extends Model
{
    use HasFactory;
    protected $table = 'lawyer_answers';
    protected $fillable = ['question_uuid', 'answer', 'lawyer_uuid'];
    public function question()
    {
        return $this->belongsTo(Question::class , 'uuid', 'question_uuid');
    }
    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class , 'uuid', 'lawyer_uuid');
    }
}
