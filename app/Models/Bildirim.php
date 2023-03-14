<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Domain;
use App\Models\Odeme;
use App\Models\Proje;
use App\Models\Hosting;
class Bildirim extends Model
{
    use HasFactory;

    protected $table = "domain";
    protected $guarded = [];

}
