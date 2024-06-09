<?php

namespace App\Models;

use App\Models\Siswa;
use App\Models\Pengguna;
use App\Models\Kategori;
use App\Models\Sanksi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 'category_id', 'sanction_id', 'teacher_id', 'date', 'description'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'student_id', 'id');
    }

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'user_id', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'category_id', 'id');
    }

    public function sanksi()
    {
        return $this->belongsTo(Sanksi::class, 'sanction_id', 'id');
    }
}
