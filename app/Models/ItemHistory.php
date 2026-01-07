<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemHistory extends Model
{
       protected $fillable = [
        'item_id',
        'user_id',
        'action',
        'from_branch_id',
        'to_branch_id',
        'description',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fromBranch()
    {
        return $this->belongsTo(Branch::class, 'from_branch_id');
    }

    public function toBranch()
    {
        return $this->belongsTo(Branch::class, 'to_branch_id');
    }
}
