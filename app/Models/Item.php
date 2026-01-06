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
        //'location',
        'branch_id',
        'category_id',
        'product_id',
        'author',
        'remark',
        'pur_date',
        'issue_date',
        'disposal',
    ];

    // Branch relationship
    public function branch()
    {
        return $this->belongsTo(Branch::class); 
    }

    // Category relationship
    public function category()
    {
        return $this->belongsTo(Category::class); 
    }

    public function product(){

        return $this->belongsTo(Product::class);
    }
}
