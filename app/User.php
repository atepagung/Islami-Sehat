<?php

namespace App;

//use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //use Notifiable;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'fullname', 'usia', 'jk', 'asal_pesantren', 'berat', 'riwayat_penyakit',
    ];

    public function pertanyaan()
    {
        return $this->hasMany('App\QA', 'user_id');
    }
}
