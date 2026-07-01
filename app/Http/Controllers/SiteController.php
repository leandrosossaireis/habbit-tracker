<?php

namespace App\Http\Controllers;

class SiteController extends Controller
{
    public function index()
    {
        $name = "Leandro";
        $habits = ['ler','correr', 'estudar', 'viajar'];
        return view('home', [
            'name' => $name,
            'habits' => $habits,
        ] );
    }
}
