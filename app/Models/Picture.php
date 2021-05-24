<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'page_id',
    ];

    public function page() {
        return $this->belongsTo('App\Models\Page');
    }

    public function sections() {
        return $this->belongsToMany('App\Models\Section');
    }

    public function articles() {
        return $this->belongsToMany('App\Models\article');
    }
}
