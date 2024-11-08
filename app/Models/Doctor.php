<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctores';

    protected $fillable = [
        'nombre',
        'especialidad',
        'telefono',
        'email',
        'direccion'
    ];

    // Relación con historial paciente
    public function historiales()
    {
        return $this->hasMany(HistorialPaciente::class, 'id_doctor');
    }
}