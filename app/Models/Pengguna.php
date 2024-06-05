<?php

namespace App\Models;

use App\Models\Pelanggaran;
use App\Models\Profil;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengguna extends Authenticatable
{
    use HasFactory,Notifiable,CanResetPassword,SoftDeletes;

    protected $table = 'pengguna';
    protected $rememberTokenName = '';
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    protected $fillable = [
        'email',
        'password',
        'role',
        'status',
    ];

    public function pelanggaran()
    {
        return $this->hasMany(Pelanggaran::class, 'id_pengguna', 'id');
    }

    public function profil()
    {
        return $this->hasOne(Profil::class,  'id_pengguna', 'id');
    }
}
