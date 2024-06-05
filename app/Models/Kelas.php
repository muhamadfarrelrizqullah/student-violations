<?php

namespace App\Models;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_siswa', 'id');
    }
}
