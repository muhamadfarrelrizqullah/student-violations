<?php

namespace App\Models;

use App\Models\Pelanggaran;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siswa extends Model
{
    use HasFactory, SoftDeletes;

    protected $rememberTokenName = '';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    protected $fillable = [
        'name', 'nis', 'class_id'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'class_id', 'id');
    }

    public function pelanggaran()
    {
        return $this->hasMany(Pelanggaran::class, 'violation_id', 'id');
    }
}
