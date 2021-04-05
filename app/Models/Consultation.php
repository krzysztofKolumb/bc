<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'duration', 'price', 'first_duration', 'first_price', 'info', 'expert_id'
    ];

    // public function experts() {
    //     return $this->hasMany('App\Models\Expert');
    // }

    public function expert() {
        return $this->belongsTo('App\Models\Expert');
    }
}
