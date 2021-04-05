<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function files() {
        return $this->hasMany('App\Models\File')->orderBy('title', 'asc');
    }
}
