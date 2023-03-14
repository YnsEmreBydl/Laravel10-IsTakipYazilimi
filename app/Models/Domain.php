<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Musteri;

class Domain extends Model
{
    use HasFactory;

    protected $table = "domain";
    protected $guarded = [];
    protected $with = ['domainmusteri'];

    public function domainmusteri(){
      return $this->hasMany(Musteri::class, 'id','musteriler');
    }
}
