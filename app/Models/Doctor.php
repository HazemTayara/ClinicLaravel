<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{

    protected $fillable = [
        'name',
        'phone',
        'specialization_id'
    ];

    use HasFactory;

    public function Specialization()
    {
        return $this->belongsTo(Specialization::class);
    }
    public function appointments()
    {
        return $this->hasMany(Appointment::class,"doctor_id");
    }
}
