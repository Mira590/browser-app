<?php

namespace App\Models;
use App\Models\Item;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable=[
        'name',
        'cont_person', 
        'website',
        'email',
        'type',
        'licence',
        'exp_licence',
        'phone',
        'desc',
        'address',

        
    ];


    public function item(){

        return $this->hasMany(Item::class);
    }
}
