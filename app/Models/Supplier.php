<?php

namespace App\Models;
use App\Models\Item;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable=[
        'name',
        'contact_person',
        'phone',
        'website',
        'email',
        'letter_expire',
        'address',

        
    ];


    public function item(){

        return $this->hasMany(Item::class);
    }
}
