<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ItemHistory;
use App\Models\User;
use App\Models\Branch;
use App\Models\Category;
use App\Models\Product;

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
        'created_by',           //  Must be added
        'verified_by',          // Optional, nullable
        'verification_status',  // pending / approved / rejected
    ];

    /** Who created the item */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /** Who verified the item */
    public function verifier()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    /** Branch relationship */
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    /** Category relationship */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /** Product relationship */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /** Item history */
    public function histories()
    {
        return $this->hasMany(ItemHistory::class, 'item_id');
    }

    /** Scope for approved items */
    public function scopeApproved($query)
    {
        return $query->where('verification_status', 'approved');
    }

    /** Scope for pending items */
    public function scopePending($query)
    {
        return $query->where('verification_status', 'pending');
    }
}
