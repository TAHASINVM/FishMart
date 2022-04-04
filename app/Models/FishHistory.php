<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fish;
use App\Models\Category;


class FishHistory extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table='fish_histories';


    public function getFishName()
    {
        return $this->belongsTo(Fish::class, 'fish_id', 'id');
    }
    public function getCategory()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
