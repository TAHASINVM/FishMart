<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishHistory extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table='fish_histories';
}
