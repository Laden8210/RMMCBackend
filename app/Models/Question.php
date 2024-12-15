<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'question',
        'correct_answer',
        'type',
    ];

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}