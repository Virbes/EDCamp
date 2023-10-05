<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $fillable = ['id_student', 'id_cost'];

    public function student()
    {
        return $this->belongsTo('App\Models\Alumno', 'id_student');
    }

    public function cost()
    {
        return $this->belongsTo('App\Models\Precio', 'id_cost');
    }
}
