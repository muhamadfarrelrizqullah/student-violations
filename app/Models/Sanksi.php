<?php

namespace App\Models;

use App\Models\Pelanggaran;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sanksi extends Model
{
    use HasFactory, SoftDeletes;

    protected $rememberTokenName = '';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    protected $fillable = [
        'name', 'points'
    ];

    public function pelanggaran()
    {
        return $this->hasMany(Pelanggaran::class, 'id_violation', 'id');
    }
}
