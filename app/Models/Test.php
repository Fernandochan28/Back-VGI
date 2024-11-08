<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $table = 'tests';

    protected $fillable = [
        'nombre',
        'descripcion',
        'tipo'
    ];

    // Relación con resultados de test
    public function resultados()
    {
        return $this->hasMany(ResultadoTest::class, 'id_test');
    }
}
