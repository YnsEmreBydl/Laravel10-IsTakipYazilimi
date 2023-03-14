<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Musteri;

class Hosting extends Model
{
    use HasFactory;

    protected $table = "hosting";

    protected $guarded = [];
    protected $with = ['hostingmusteri'];

    public function hostingmusteri(){
      return $this->hasMany(Musteri::class, 'id', 'musteriler');
    }
}
