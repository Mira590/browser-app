<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DownloadableForm extends Model
{
    public const CATEGORIES = [
        'operation' => 'Operation Forms',
        'it' => 'IT Forms',
        'hr' => 'HR Forms',
    ];

    protected $fillable = [
        'title',
        'file_path',
        'category',
    ];
}
