<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 'category_id', 'sanction_id', 'teacher_id', 'date', 'description'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sanction()
    {
        return $this->belongsTo(Sanction::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
