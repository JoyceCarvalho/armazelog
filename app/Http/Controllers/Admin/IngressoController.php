<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Unidade;
use App\Veiculo;
use App\Entrada;

class IngressoController extends Controller
{

	 public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function cadastrar()
    {
    	return view('ingresso.cadastrar', ['veiculo' => Veiculo::all(['id', 'placa'])], ['unidade' => Unidade::all("id", "descricao")]);
    }

    /*public function cadastrar()
    {
        return view('veiculo.cadastrar', ['transportes' => Transporte::all(['id', 'nome'])]);
    }
*/

    public function listar()
    {
    	//return view('ingresso.listar');
        $ingresso = Entrada::paginate(20);
        return view('ingresso.listar', compact('ingresso'));
    }

    public function salvar(Request $request)
    {
        $entradas = new Entrada();
        $entradas->fill($request->all());
        $entradas->save();
        \Session::flash('flash_message', [
            'msg' => "Dados cadastrados comsucesso!",
            'class' => "alert-success"
        ]);
        return redirect()->route('ingresso.listar');
    }

    


}
