<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::all();
        return new Response($payments, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paymentFields = $request->only(['source_account_id',
            'target_account_id', 'service_id']);
        $payment = Payment::create($paymentFields);

        if ($payment){
            return new Response([
                'message' => 'Pagamento cadastrado com sucesso!',
                'payment' => $payment
            ], 200);
        }
        return new Response ([
            'message' => 'Ocorreu um erro ao cadastrar o pagamento.'
        ], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = Payment::findOrFail($id);
        return new Response($payment, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $paymentFields = $request->only(['source_account_id',
        'target_account_id', 'service_id']);

        $payment = Payment::findOrFail($id);
        $payment->fill($paymentFields);
        $payment->save();


        return new Response([
            'message' => 'Pagamento editado com sucesso!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return new Response([
            'message' => 'Pagamento deletado com sucesso!'
        ], 200);
    }
}
