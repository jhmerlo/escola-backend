<?php

namespace App\Http\Controllers;

use App\Progenitor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\ProgenitorRequest;

class ProgenitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $progenitors = Progenitor::all();
        return new Response($progenitors, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgenitorRequest $request)
    {
        $progenitorFields = $request->only(['name', 'bank_account']);
        
        $progenitor = Progenitor::create($progenitorFields);

        if ($progenitor){
            return new Response([
                'message' => 'Pai cadastrado com sucesso!',
                'progenitor' => $progenitor
            ], 200);
        }
        return new Response ([
            'message' => 'Ocorreu um erro ao cadastrar o pai.'
        ], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Progenitor  $progenitor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $progenitor = Progenitor::findOrFail($id);
        return new Response($progenitor, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Progenitor  $progenitor
     * @return \Illuminate\Http\Response
     */
    public function update(ProgenitorRequest $request, $id)
    {
        $progenitorFields = $request->only(['name', 'bank_account']);

        $progenitor = Progenitor::findOrFail($id);
        $progenitor->fill($progenitorFields);
        $progenitor->save();


        return new Response([
            'message' => 'Pai editado com sucesso!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Progenitor  $progenitor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $progenitor = Progenitor::findOrFail($id);
        $progenitor->delete();
        return new Response([
            'message' => 'Pai deletado com sucesso!'
        ], 200);
    }
}
