<?php

namespace App\Models;

use App\Models\Pelanggaran;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'points'
    ];

    public function pelanggaran()
    {
        return $this->hasMany(Pelanggaran::class, 'id_pelanggaran', 'id');
    }
}
