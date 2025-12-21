<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable=['name','br_code'];
    public function items(){
        return $this->hasMany(Item::class);
    }
}
