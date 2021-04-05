<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname', 'lastname', 'slug', 'description', 'profession_id', 'photo'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function degree() {
        return $this->belongsTo('App\Models\Degree');
    }

    public function profession() {
        return $this->belongsTo('App\Models\Profession');
    }

}
