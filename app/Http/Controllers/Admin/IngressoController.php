<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transporte;
use App\Veiculo;

class IngressoController extends Controller
{

	 public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function cadastrar()
    {
    	return view('ingresso.cadastrar', ['veiculo' => Veiculo::all(['id', 'placa'])]);
    }

    /*public function cadastrar()
    {
        return view('veiculo.cadastrar', ['transportes' => Transporte::all(['id', 'nome'])]);
    }
*/

    public function listar()
    {
    	return view('ingresso.listar');
    }

    public function salvar(Request $request)
    {
        $entradas = new entradas();
        $entradas->fill($request->all());
        $entradas->save();
        \Session::flash('flash_message', [
            'msg' => "Dados cadastrados comsucesso!",
            'class' => "alert-success"
        ]);
        return redirect()->route('ingresso.listar');
    }

    


}
