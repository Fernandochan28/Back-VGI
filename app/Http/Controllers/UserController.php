<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']); // Encriptar la contraseña

        $user = User::create($validatedData);

        return response()->json(['message' => 'Usuario creado con éxito', 'user' => $user], 201);
    }
}

