<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicalTrial extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'clinical_trial_category_id', 'content'
    ];

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    public function clinicalTrialCategory() {
        return $this->belongsTo('App\Models\ClinicalTrialCategory');
    }
}
