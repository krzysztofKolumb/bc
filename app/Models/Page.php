<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'title', 'subtitle', 'meta_title', 'meta_description', 'keywords'
    ];

    public function expert() {
        return $this->hasOne('App\Models\Expert');
    }

    public function experts() {
        return $this->belongsToMany('App\Models\Expert');
        // return $this->hasMany('App\Models\Expert');
    }

    public function offer() {
        return $this->hasOne('App\Models\Offer');
    }

    public function sections() {
        return $this->hasMany('App\Models\Section');
    }

    public function treatment() {
        return $this->hasOne('App\Models\Treatment');
    }

    public function clinicalTrial() {
        return $this->hasOne('App\Models\ClinicalTrial');
    }
}
