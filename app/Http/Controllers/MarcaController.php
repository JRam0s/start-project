<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class MarcaController extends Controller
{
    public function index()
    {

        $data = Marca::all();
        return $data->toJson();

        return view('marca.index', compact('data'));
    }

    public function create()
    {
        // return view('marca.create') 
    }

    public function store(Request $request)
    {

        $regras = [
            'nome' => 'required|max:100|min:10',
            'logo' => 'required'
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

        $request->validate($regras, $msgs);

        $obj = new Marca();
        $obj->nome = $request->nome;
        $obj->logo = $request->logo;
        $obj->save();

        // return redirect()->route('marca.index');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        /*$dados = Marca::find($id);

        if(!isset($dados)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('marca.edit', compact('dados')); */
    }

    public function update(Request $request, $id)
    {
        $regras = [
            'nome' => 'required|max:100|min:10',
            'logo' => 'required'
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

        $request->validate($regras, $msgs);

        $obj = Marca::find($id);

        if (isset($obj)) {
            $obj->nome = $request->nome;
            $obj->logo = $request->logo;
            $obj->save();
        }

        //return redirect()->route('marca.index');
    }

    public function destroy($id)
    {
        $obj = Marca::find($id);
        $obj->delete();
        //return redirect()->route('marca.index');
    }
}
