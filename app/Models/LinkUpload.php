<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkUpload extends Model
{
    use HasFactory;

    protected $table = 'link';
    protected $fillable = [
        'title',
        'link',
        'tab'
    ];
}
