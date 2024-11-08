<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialPaciente extends Model
{
    use HasFactory;

    protected $table = 'historial_paciente';

    protected $fillable = [
        'id_paciente',
        'id_doctor',
        'tipo_registro',
        'descripcion',
        'fecha_registro',
        'observaciones'
    ];

    // Relación con paciente
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }

    // Relación con doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'id_doctor');
    }
}
