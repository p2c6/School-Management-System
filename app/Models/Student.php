<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['full_name', 'address', 'gender', 'course_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
