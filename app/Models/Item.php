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
        'author',
        'remark',
        'pur_date',
        'issue_date',
        'disposal',
    ];

    // Branch relationship
    public function branch()
    {
        return $this->belongsTo(Branch::class); // ✅ Correct model
    }

    // Category relationship
    public function category()
    {
        return $this->belongsTo(Category::class); // ✅ Correct model
    }
}
