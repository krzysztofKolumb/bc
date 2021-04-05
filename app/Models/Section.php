<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'title', 'subtitle', 'description', 'content', 'link','page_id'
    ];

    public function page() {
        return $this->belongsTo('App\Models\Page');
    }
}
