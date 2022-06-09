<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\ItemVenda;
use Illuminate\Support\Facades\DB;

class VendaController extends Controller
{
    
    public function index()
    {
        $vendas = DB::table("venda AS v")
					->join("cliente AS c", "v.cliente_id", "=", "c.id")
					->select("v.id", "v.total", "v.created_at AS data", "c.nome AS cliente", "v.cancelada")
					->orderByDesc("v.created_at")
					->get();
		return view("venda.lista", [
			"vendas" => $vendas
		]);
    }

    
    public function create()
    {
        $venda = new Venda();
		$clientes = Cliente::All();
		$itens = [];
		
		return view("venda.index", [
			"venda" => $venda,
			"clientes" => $clientes,
			"itens" => $itens
		]);
    }

    
    public function store(Request $request)
    {
        if ($request->get("id") != "") {
			$venda = Venda::Find($request->get("id"));
		} else {
			$venda = new Venda();
		}
		
		$venda->cliente_id = $request->get("cliente_id");
		$venda->total = 0;
		
		$venda->save();
		$request->session()->flash("status", "salvo");
		
		return redirect("/venda/" . $venda->id . "/edit");
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $venda = Venda::Find($id);
		$clientes = Cliente::All();
		$itens = [];
		
		return view("venda.index", [
			"venda" => $venda,
			"clientes" => $clientes,
			"itens" => $itens
		]);
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
	
	public function itemVenda($id) {
		$produtos = Produto::All();
		return view("venda.item", [
			"id" => $id,
			"produtos" => $produtos
		]);
	}
	
	public function salvarItemVenda($id) {
		return redirect("/venda/" . $id . "/item");
	}
}
