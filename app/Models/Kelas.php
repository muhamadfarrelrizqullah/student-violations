<?php

namespace App\Models;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use HasFactory, SoftDeletes;

    protected $rememberTokenName = '';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    protected $fillable = [
        'name', 'major'
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'student_id', 'id');
    }
}
