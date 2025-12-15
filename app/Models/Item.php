<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    

    public function branch(){

        return $this->belongsTo(Category::class);
    }
}
