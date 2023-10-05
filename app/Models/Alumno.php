<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $fillable = ['name', 'lastname', 'email', 'state', 'peruvian', 'assistance', 'phone', 'id_company'];

    public function company()
    {
        return $this->belongsTo('App\Models\Empresa', 'id_company');
    }
}
