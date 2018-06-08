<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
  protected $fillable = [
        'patient_id', 'doctor_id', 'start_at', 'end_at',
    ];
}
