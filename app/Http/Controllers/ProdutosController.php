<?php

namespace App\Http\Controllers;

use App\Produtos;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produtos::all();

        return response()->json($produtos, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produtos = new Produtos;
        $produtos->fill($request->all());
        $produtos->save();

        if(!$produtos){
            return response()->json([
                'message' => 'Erro ao salvar produto',
            ],404);
        }
        
        return response()->json($produtos, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produtos = Produtos::find($id);
        if(!$produtos){
            return response()->json([
                'message' => 'Produto não encontrado',
            ],404);
        }
        return response()->json($produtos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produtos = Produtos::find($id);
        if(!$produtos) {
            return response()->json([
                'message'   => 'Produto não encontrado',
            ], 404);
        }
        $produtos->fill($request->all());
        $produtos->save();

        if(!$produtos) {
            return response()->json([
                'message'   => 'Erro ao salvar produto',
            ], 404);
        }

        return response()->json($produtos, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produtos = Produtos::find($id);
        if(!$produtos) {
            return response()->json([
                'message'   => 'Produto não encontrado',
            ], 404);
        }
        $produtos->delete();
         return response()->json([
                'message'   => 'Registro deletado',
        ], 200);
    }
}
