<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'type', 'team'
    ];

    public function experts() {
        return $this->hasMany('App\Models\Expert')->orderBy('lastname','asc');
    }

    public function employees() {
        return $this->hasMany('App\Models\Employee')->orderBy('lastname','asc');
    }

}
