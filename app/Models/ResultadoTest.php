<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultadoTest extends Model
{
    use HasFactory;

    protected $table = 'resultados_tests';

    protected $fillable = [
        'id_test',
        'id_paciente',
        'resultado',
        'fecha'
    ];

    // Relación con test
    public function test()
    {
        return $this->belongsTo(Test::class, 'id_test');
    }

    // Relación con paciente
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }
}