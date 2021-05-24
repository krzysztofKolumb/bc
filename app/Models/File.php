<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug', 'title', 'type', 'file_category_id'
    ];

    public function fileCategory() {
        return $this->belongsTo('App\Models\FileCategory');
    }
}
