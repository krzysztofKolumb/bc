<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'desc'
    ];

    // protected $casts = [
    //     'created_at' => 'datetime:Y-m-d',
    // ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
