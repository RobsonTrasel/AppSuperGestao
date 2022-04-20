<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\siteContato;
use App\Models\motivoContato;

class contactController extends Controller
{
    public function index()
    {
        $motivo_contatos = motivoContato::all();
        return view('site.contato', ['title' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
    }
    public function create(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido.',
            'motivo_contatos_id.required' => 'O campo motivo deve ser preenchido.',
            'nome.min' => 'O campo nome deve ter no minimo 3 caracteres.',
            'nome.max' => 'O campo nome deve ter no maximo 40 caracteres.',
            'email' => 'O email informado não é valido.',
            'mensagem' => 'A mensagem deve ter no maximo 2000 caracteres.'
        ];

        $request->validate($regras, $feedback);
        siteContato::create($request->all());
        return redirect()->route('site.index');
    }

}
