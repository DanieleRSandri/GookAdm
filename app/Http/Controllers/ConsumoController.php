<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsumoController extends Controller
{
    public function create(){
        return view('consumos.create');
    }
}
