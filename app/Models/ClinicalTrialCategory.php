<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicalTrialCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug'
    ];

    public function clinicalTrials() {
        return $this->hasMany('App\Models\ClinicalTrial');
    }
}
