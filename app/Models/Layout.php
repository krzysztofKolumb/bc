<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{
    use HasFactory;

    protected $fillable = [
        'class', 'name', 'size'
    ];

    public function articles() {
        return $this->hasMany('App\Models\Article');
    }
}
