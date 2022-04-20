<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\motivoContato;

class homeController extends Controller
{
    public function index()
    {

        $motivo_contatos = motivoContato::all();

        return view('site.principal', ['title' => 'Home', 'motivo_contatos' => $motivo_contatos]);
    }
}
