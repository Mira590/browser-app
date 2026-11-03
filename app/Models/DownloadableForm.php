<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DownloadableForm extends Model
{
    protected $fillable = [
        'title',
        'file_path',
    ];
}
