<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabTestPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'loadTime', 'regularPrice', 'specialPrice', 'lab_test_category_id', 'lab_test_type'
    ];

    public function labTestCategory() {
        return $this->belongsTo('App\Models\LabTestCategory');
    }

}
