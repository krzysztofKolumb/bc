<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname', 'lastname', 'slug', 'degree_id', 'profession_id', 'general_info', 'specialties_desc', 'education','experience', 
        'certificates', 'awards', 'help', 'links', 'consultations', 'other', 'photo', 'schedule_id', 'page_id'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function specialties(){
        return $this->belongsToMany('App\Models\Specialty');
    }

    public function degree() {
        return $this->belongsTo('App\Models\Degree');
    }

    public function profession() {
        return $this->belongsTo('App\Models\Profession');
    }

    public function schedule() {
        return $this->belongsTo('App\Models\Schedule');
        // return $this->hasOne('App\Models\Schedule');

    }

    public function page() {
        return $this->belongsTo('App\Models\Page');
    }

    public function pages(){
        return $this->belongsToMany('App\Models\Page');
        // return $this->belongsTo('App\Models\Page');

    }

    public function consultations() {
        return $this->hasMany('App\Models\Consultation');
    }

    public function recommendations() {
        return $this->hasMany('App\Models\Recommendation');
    }



}
