<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'info'
    ];

    public function expert() {
        return $this->hasOne('App\Models\Expert');
    }
}
