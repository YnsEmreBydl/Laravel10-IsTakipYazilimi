<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hizmet extends Model
{
    use HasFactory;

    protected $table = "hizmet";
    protected $guarded = [];
    protected $with = ['hizmetmusteri'];

    public function hizmetmusteri(){
      return $this->hasMany(Musteri::class, 'id','musteriler');
    }
}
