<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Musteri;
class Proje extends Model
{
    use HasFactory;


        protected $table = "proje";
        protected $guarded = [];
        protected $with = ['projemusteri'];
        public function projemusteri(){
          return $this->hasMany(Musteri::class, 'id', 'musteriler');
        }
}
