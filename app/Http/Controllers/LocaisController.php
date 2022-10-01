<?php

namespace App\Http\Controllers;
use App\Http\Requests\LocalRequest;
use App\Models\Locais;
use Illuminate\Http\Request;


class LocaisController extends Controller
{
    public function index(){
        $locais = Locais::All();
        return view('locais.index', ['locais'=>$locais]);
    }

    public function create(){
        return view('locais.create');
    }

    public function store(LocalRequest $request){
        $novo_local = $request->all();
        Locais::create($novo_local);

        return redirect('locais');
    }
}
