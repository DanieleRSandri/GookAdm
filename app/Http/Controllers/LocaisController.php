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

        return redirect()->route('locais');
    }

    public function destroy($id){
        Locais::find($id)->delete();
        return redirect()->route('locais');
    }

    public function edit($id){
        $local = Locais::find($id);
        return view('locais.edit', compact('local'));
    }
    
    public function update(LocalRequest $request, $id){
        Locais::find($id)->update($request->all());
        return redirect()->route('locais');
    }

}
