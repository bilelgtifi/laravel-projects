<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table='likes';
    protected $fillable = [
        'certificat_id','user_id','like'
    ];

}
