<?php

namespace App\Models;

use App\Models\Siswa;
use App\Models\Pengguna;
use App\Models\Kategori;
use App\Models\Sanksi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelanggaran extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pelanggarans';
    protected $rememberTokenName = '';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    protected $fillable = [
        'student_id', 'category_id', 'sanction_id', 'teacher_id', 'date', 'description'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id');
    }

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }

    public function sanksi()
    {
        return $this->belongsTo(Sanksi::class, 'id_sanksi', 'id');
    }
}
