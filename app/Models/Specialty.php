<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function experts() {
        return $this->belongsToMany('App\Models\Expert');
    }

    public function treatments() {
        return $this->hasMany('App\Models\Treatment');
    }
}
