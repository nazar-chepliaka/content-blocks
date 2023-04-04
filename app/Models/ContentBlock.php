<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\getTableColumnsNames;

class ContentBlock extends Model
{
    use HasFactory, getTableColumnsNames;

    protected $guarded = [];

    public function content_blocks_type()
    {
        return $this->belongsTo('App\Models\ContentBlocksType');
    }
}
