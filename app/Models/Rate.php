<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = [
        'rate',
        'comment',
        'patient_id',
        'doctor_id'
    ];
    use HasFactory;
}
