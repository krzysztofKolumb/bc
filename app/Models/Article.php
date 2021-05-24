<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'class', 'content', 'img_1', 'img_2', 'img_3', 'img_4', 'layout_id', 'section_id'
    ];

    public function section() {
        return $this->belongsTo('App\Models\Section');
    }

    public function layout() {
        return $this->belongsTo('App\Models\Layout');
    }

    public function pictures(){
        return $this->belongsToMany('App\Models\Picture');
    }

    // public function pictures(){
    //     return $this->hasMany('App\Models\Picture');
    // }
}
