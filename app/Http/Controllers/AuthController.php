<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Exibe o formulário de login/cadastro.
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Cadastro — valida e salva novo usuário.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:usuarios,email',
            'password' => 'required|string|min:6',
        ], [
            'name.required'     => 'O nome é obrigatório.',
            'email.required'    => 'O e-mail é obrigatório.',
            'email.email'       => 'Informe um e-mail válido.',
            'email.unique'      => 'Este e-mail já está cadastrado.',
            'password.required' => 'A senha é obrigatória.',
            'password.min'      => 'A senha deve ter pelo menos 6 caracteres.',
        ]);

        Usuario::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/auth')->with('sucesso', 'Conta criada com sucesso! Faça login.');
    }

    /**
     * Login — verifica credenciais e inicia sessão.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ], [
            'email.required'    => 'O e-mail é obrigatório.',
            'email.email'       => 'Informe um e-mail válido.',
            'password.required' => 'A senha é obrigatória.',
        ]);

        $usuario = Usuario::where('email', $request->email)->first();

        if (! $usuario || ! Hash::check($request->password, $usuario->password)) {
            return redirect('/auth')->with('erro', 'E-mail ou senha incorretos.');
        }

        // Regenera a sessão para evitar session fixation
        $request->session()->regenerate();

        session([
            'usuario_id'     => $usuario->id,
            'usuario_logado' => $usuario->name,
        ]);

        return redirect('/');
    }

    /**
     * Logout — encerra a sessão.
     */
    public function logout(Request $request)
    {
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('/auth');
    }
}
