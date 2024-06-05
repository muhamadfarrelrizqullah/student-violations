<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanction extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'points'
    ];

    public function violations()
    {
        return $this->hasMany(Violation::class);
    }
}
