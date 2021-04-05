<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'duration', 'price', 'info', 'offer_id', 'specialty_id', 'page_id'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function offer() {
        return $this->belongsTo('App\Models\Offer');
    }

    public function page() {
        return $this->belongsTo('App\Models\Page');
    }

    public function specialty() {
        return $this->belongsTo('App\Models\Specialty');
    }

    public function clinic() {
        return $this->belongsTo('App\Models\Clinic');
    }

}
