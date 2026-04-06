<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        // "usuarios" aqui são os clientes do sistema Mali+
        $usuarios = \App\Models\Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_usuario'     => 'required|string|max:255',
            'email_usuario'    => 'required|email|unique:usuarios,email_usuario',
            'data_nasc'        => 'required|date',
            'cpf_usuario'      => 'required|string|max:14',
            'telefone_usuario' => 'required|string|max:15',
        ], [
            'nome_usuario.required'     => 'O nome é obrigatório.',
            'email_usuario.required'    => 'O e-mail é obrigatório.',
            'email_usuario.email'       => 'Informe um e-mail válido.',
            'email_usuario.unique'      => 'Este e-mail já está cadastrado.',
            'data_nasc.required'        => 'A data de nascimento é obrigatória.',
            'cpf_usuario.required'      => 'O CPF é obrigatório.',
            'telefone_usuario.required' => 'O telefone é obrigatório.',
        ]);

        \App\Models\Usuario::create([
            'nome_usuario'     => $request->nome_usuario,   // corrigido: era nome_tarefa
            'email_usuario'    => $request->email_usuario,
            'data_nasc'        => $request->data_nasc,
            'cpf_usuario'      => $request->cpf_usuario,
            'telefone_usuario' => $request->telefone_usuario,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Cliente criado com sucesso!');
    }

    public function show(string $id)
    {
        $usuario = \App\Models\Usuario::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    public function edit(string $id)
    {
        $usuario = \App\Models\Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, string $id)
    {
        $usuario = \App\Models\Usuario::findOrFail($id);

        $request->validate([
            'nome_usuario'     => 'required|string|max:255',
            'email_usuario'    => 'required|email|unique:usuarios,email_usuario,' . $id,
            'data_nasc'        => 'required|date',
            'cpf_usuario'      => 'required|string|max:14',
            'telefone_usuario' => 'required|string|max:15',
        ], [
            'nome_usuario.required'     => 'O nome é obrigatório.',
            'email_usuario.required'    => 'O e-mail é obrigatório.',
            'email_usuario.email'       => 'Informe um e-mail válido.',
            'email_usuario.unique'      => 'Este e-mail já está cadastrado por outro cliente.',
            'data_nasc.required'        => 'A data de nascimento é obrigatória.',
            'cpf_usuario.required'      => 'O CPF é obrigatório.',
            'telefone_usuario.required' => 'O telefone é obrigatório.',
        ]);

        $usuario->update([
            'nome_usuario'     => $request->nome_usuario,   // corrigido: era nome_tarefa
            'email_usuario'    => $request->email_usuario,
            'data_nasc'        => $request->data_nasc,
            'cpf_usuario'      => $request->cpf_usuario,
            'telefone_usuario' => $request->telefone_usuario, // corrigido: campo telefone
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $usuario = \App\Models\Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Cliente excluído com sucesso!');
    }
}
