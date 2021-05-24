<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    use HasFactory;

    protected $fillable = [
        'content', 'expert_id', 'recommended_expert_id'
    ];

    public function expert() {
        return $this->belongsTo('App\Models\Expert');
    }

    public function recommended_expert() {
        return $this->belongsTo('App\Models\Expert')->where('id', $this->recommended_expert_id);
    }
}
