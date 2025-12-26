<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
     protected $fillable = [
        'name',
        'model',
        'tag_number',
        'serial_number',
        'status',
        'location',
        'branch_id',
        'category_id',
        'remark',
        'pur_date',
        'issue_date',
        'Author'
    ];

    public function branch(){

        return $this->belongsTo(Category::class);
    }
}
