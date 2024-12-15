<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = 'student_id';

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'birthdate',
        'contact_number',
        'course',
        'gender',

    ];
}
