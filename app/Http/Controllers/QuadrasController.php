<?php

namespace App\Http\Controllers;

use App\Models\Quadra;
use Illuminate\Http\Request;

class QuadrasController extends Controller
{
    public function index(){
        $quadras = Quadra::All();
        return view('quadras.index', ['quadras'=>$quadras]);
    }

    
    public function create(){
        return view('quadras.create');
    }
}
