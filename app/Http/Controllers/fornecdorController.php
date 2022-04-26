<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class fornecdorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index');
    }
    public function list(Request $request)
    {
        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('UF', 'like', '%'.$request->input('UF').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->paginate(3);

        return view('app.fornecedor.list', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }
    public function adicionar(Request $request)
    {
        $msg = '';
        if($request->input('_token') != '' && $request->input('id') == '') {
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'UF' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo deve ter no minimo 3 caracteres',
                'nome.max' => 'O campo deve ter no maximo 40 caracteres',
                'UF.min' => 'O campo deve ter no minimo 2 caracteres',
                'UF.max' => 'O campo deve ter no maximo 2 caracteres',
                'email.email' => 'O campo nao foi preenchido corretamente'
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Cadastro realizado com sucesso!';
        };


        if($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update) {
                $msg = "Update atualizado com sucesso!";
            } else {
                $msg = "Update falhou";
            }

            return redirect()->route('site.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
        }

        return view('app.fornecedor.add', ['msg' => $msg]);
    }
    public function edit($id, $msg = '')
    {
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.add', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }
    public function excluir($id)
    {
        Fornecedor::find($id)->forceDelete();

        return redirect()->route('site.fornecedor');
    }
}
