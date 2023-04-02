<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    // /**
    //  * fillable
    //  *
    //  * @var array
    //  */
    protected $fillable = [
        'id',
        'email',
        'password',
        'email',
        'nama',
        'role_user',
        'jadwal_kerja',
        'gaji',
    ];
}