<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/produtos/index');
    }

    public function getProdutos()
    {
        $produtos = Produto::all();
        return view('/produtos/listProdutos', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()){
            // Create New Produto
            $produto = new Produto;
            $produto->name = $request->input('name');
            $produto->price = $request->input('price');
            $produto->quantity = $request->input('quantity');

            // Salvar Produto
            $produto->save();
             
            return response($produto);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->ajax()){
            $produto = Produto::find($request->id);
            $produto->name = $request->input('name');
            $produto->price = $request->input('price');
            $produto->quantity = $request->input('quantity');
 
            // Atualizar Produto
            $produto->update();

            return response($produto);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->ajax()){
            Produto::destroy($request->id);
        }
    }
}
