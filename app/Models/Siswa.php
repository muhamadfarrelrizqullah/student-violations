<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'nis', 'class_id'
    ];

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }

    public function violations()
    {
        return $this->hasMany(Violation::class);
    }
}
