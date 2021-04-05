<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabTestCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function labTestPrices() {
        return $this->hasMany('App\Models\LabTestPrice')->orderBy('name', 'asc');
    }
}
