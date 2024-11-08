<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Paciente extends Model
{
    use HasFactory;

    protected $table = 'pacientes';

    // Si necesitas definir los campos que se pueden rellenar masivamente
    protected $fillable = [
        'nombre',
        'apellido',
        'genero',
        'matricula',
        'caracteristicas',
        'enfermedad',
        'edad',
    ];

    // Ejemplo de relación con el modelo HistorialPaciente
    public function historiales()
    {
        return $this->hasMany(HistorialPaciente::class, 'id_paciente');
    }
}
