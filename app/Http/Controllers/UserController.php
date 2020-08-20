<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return new Response($users, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $userFields = $request->only(['name',
            'type',
            'email']);
        
        $user = User::create($userFields);

        if ($user){
            return new Response([
                'message' => 'Usuário cadastrado com sucesso!',
                'user' => $user
            ], 200);
        }
        return new Response ([
            'message' => 'Ocorreu um erro ao cadastrar usuário.'
        ], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return new Response($user, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $userFields = $request->only(['name',
            'type',
            'email']);

        $user = User::findOrFail($id);
        $user->fill($userFields);
        $user->save();


        return new Response([
            'message' => 'Usuário editado com sucesso!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return new Response([
            'message' => 'Usuário deletado com sucesso!'
        ], 200);
    }
}
