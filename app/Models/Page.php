<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'title', 'subtitle', 'meta_title', 'meta_description', 'keywords'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function expert() {
        return $this->hasOne('App\Models\Expert');
    }

    public function experts() {
        return $this->belongsToMany('App\Models\Expert');
        // return $this->belongsToMany('App\Models\Expert')->orderBy('lastname', 'asc');
    }
    
    public function homeExperts() {
        return $this->belongsToMany('App\Models\Expert')->whereNotNull('photo')->inRandomOrder();
    }

    public function offer() {
        return $this->hasOne('App\Models\Offer');
    }

    public function section() {
        return $this->hasOne('App\Models\Section');
    }

    public function sections() {
        return $this->hasMany('App\Models\Section');
    }

    public function contentSections() {
        return $this->hasMany('App\Models\Section')->where('editor', 1);
    }

    public function pictures() {
        return $this->hasMany('App\Models\Picture');
    }

    public function treatment() {
        return $this->hasOne('App\Models\Treatment');
    }

    public function clinicalTrial() {
        return $this->hasOne('App\Models\ClinicalTrial');
    }
}
