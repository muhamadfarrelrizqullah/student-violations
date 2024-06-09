<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'phone'
    ];

    public $timestamps = false;

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'user_id', 'id');
    }
}
