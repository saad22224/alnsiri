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
    protected $fillable = ['question_id', 'answer', 'lawyer_id'];
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class);
    }
}
