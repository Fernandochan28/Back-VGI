<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

class PacienteController extends Controller
{
    // Muestra una lista de pacientes
    public function index()
    {
        $pacientes = Paciente::all();
        return view('pacientes.index', compact('pacientes'));
    }

    // Muestra el formulario para crear un paciente
    public function create()
    {
        return view('pacientes.create');
    }

    // Guarda un nuevo paciente en la base de datos
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'genero' => 'required|string',
            'matricula' => 'required|integer',
            'caracteristicas' => 'required|string',
            'enfermedad' => 'required|string',
            'edad' => 'required|integer|min:0',
        ]);

        $paciente = Paciente::create($validatedData);

        return response()->json([
            'message' => 'Paciente creado con éxito',
            'paciente' => $paciente
        ], 201);
    }

    // Muestra un paciente específico
    public function show(Paciente $paciente)
    {
        return view('pacientes.show', compact('paciente'));
    }

    // Muestra el formulario para editar un paciente
    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    // Actualiza un paciente en la base de datos
    public function update(Request $request, Paciente $paciente)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|string|max:10',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255'
        ]);

        $paciente->update($data);
        return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado exitosamente');
    }

    // Elimina un paciente de la base de datos
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
        return redirect()->route('pacientes.index')->with('success', 'Paciente eliminado exitosamente');
    }
}
