<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\LogAcessoMiddleware;

class aboutController extends Controller
{
    public function __construct()
    {
        //$this->middleware(LogAcessoMiddleware::class);
    }

    public function index()
    {
        return view('site.sobre-nos', ['title' => 'Sobre-nós']);
    }
}
