<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



class AuthController extends Controller
{
    public function login(Request $request)
    {
         $credentials = $request->validate([
        'email' => ['required','email'],
        'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Credenciais inválidas'
            ], 401);
        }

        if (!Auth::user()->is_approved) {
            return response()->json([
                'message' => 'Usuário não aprovado. Aguarde a aprovação do administrador.'
            ], 403);
        }

        $user = $request->user();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Sucesso ao fazer login',
            'token' => $token,
            'user' => $user,
        ]);
 
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout realizado com sucesso'
        ]);
    
    }

    public function cadastro(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', 'string', 'in:oficina,seguradora,regulador'],
        ]);

        $user = User::create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => bcrypt($credentials['password']),
            'role' => $credentials['role'],
            'is_approved' => false,
        ]);

        return response()->json([
            'message' => 'Cadastro realizado com sucesso',
            'user' => $user
        ], 201);
    }
}
