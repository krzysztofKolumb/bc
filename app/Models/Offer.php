<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'name', 'page_id'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function page() {
        return $this->belongsTo('App\Models\Page');
    }

    public function treatments() {
        return $this->hasMany('App\Models\Treatment');
    }
}
