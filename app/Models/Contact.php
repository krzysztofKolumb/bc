<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'street', 'city', 'phone', 'email', 'open_week', 'open_sat', 'bank', 'location', 'access', 'parking', 'info', 'online_registration','facebook', 'instagram', 'online_test_results', 'suggestions'
    ];
}
