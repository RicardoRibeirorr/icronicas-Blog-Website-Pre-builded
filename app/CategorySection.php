<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorySection extends Model
{    
    public function categorys(){
        return $this->hasMany(Category::class);
    }
}
