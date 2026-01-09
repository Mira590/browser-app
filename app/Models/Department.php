<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable=['name'];



    public function users(){

        return $this->hasMany(User::class);
    }
}
