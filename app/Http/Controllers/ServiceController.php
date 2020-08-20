<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\ServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return new Response($services, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $serviceFields = $request->only(['name', 'value']);
        
        $service = Service::create($serviceFields);

        if ($service){
            return new Response([
                'message' => 'Serviço cadastrado com sucesso!',
                'service' => $service
            ], 200);
        }
        return new Response ([
            'message' => 'Ocorreu um erro ao cadastrar o serviço.'
        ], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::findOrFail($id);
        return new Response($service, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, $id)
    {
        $serviceFields = $request->only(['name', 'value']);

        $service = Service::findOrFail($id);
        $service->fill($serviceFields);
        $service->save();


        return new Response([
            'message' => 'Serviço editado com sucesso!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return new Response([
            'message' => 'Serviço deletado com sucesso!'
        ], 200);
    }
}
