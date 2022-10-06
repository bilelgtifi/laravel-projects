<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Certificat extends Model
{
    use HasFactory;
    protected $table='certificat';
    protected $fillable = [
        'title',	'categorie',	'levele',	'description',	'prix'
    ];
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

}
