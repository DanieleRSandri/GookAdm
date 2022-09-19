<?php

namespace App\Http\Controllers;

use App\Models\Locais;
use Illuminate\Http\Request;

class LocaisController extends Controller
{
    public function index(){
        $locais = Locais::All();
        return view('locais', ['locais'=>$locais]);
    }
}
