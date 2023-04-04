<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentBlocksType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function content_blocks()
    {
        return $this->hasMany('App\Models\ContentBlock');
    }
}
