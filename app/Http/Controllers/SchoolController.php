<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\SchoolRequest;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::all();
        return new Response($schools, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SchoolRequest $request)
    {
        $schoolFields = $request->only([
            'name',
            'cnpj',
            'bank_account']);

        $school = School::create($schoolFields);

        if ($school){
            return new Response([
                'message' => 'Escola cadastrada com sucesso!',
                'school' => $school
            ], 200);
        }
        return new Response ([
            'message' => 'Ocorreu um erro ao cadastrar a escola.'
        ], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $school = School::findOrFail($id);

        return new Response($school, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(SchoolRequest $request, $id)
    {
        $schoolFields = $request->only(['name',
            'cnpj',
            'bank_account']);

        $school = School::findOrFail($id);
        $school->fill($schoolFields);
        $school->save();


        return new Response([
            'message' => 'Escola editada com sucesso!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $school = School::findOrFail($id);
        $school->delete();
        return new Response([
            'message' => 'Escola deletada com sucesso!'
        ], 200);
    }
}
