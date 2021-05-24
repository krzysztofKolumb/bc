<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'title', 'subtitle', 'description', 'content', 'class', 'editor','page_id'
    ];

    public function page() {
        return $this->belongsTo('App\Models\Page');
    }

    public function articles() {
        return $this->hasMany('App\Models\Article');
    }

    public function offer() {
        return $this->hasOne('App\Models\Offer');
    }

    public function pictures(){
        return $this->belongsToMany('App\Models\Picture');
    }
}
