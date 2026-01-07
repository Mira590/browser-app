<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ItemHistory;

class Item extends Model
{
    protected $fillable = [
        'name',
        'model',
        'tag_number',
        'serial_number',
        'status',
        'branch_id',
        'category_id',
        'product_id',
        'author',
        'remark',
        'pur_date',
        'issue_date',
        'disposal',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // ✅ FIXED RELATIONSHIP
    public function histories()
    {
        return $this->hasMany(ItemHistory::class, 'item_id');
    }
}
