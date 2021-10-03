<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function payment()
    {
        $availablePlans =[
           'prod_KBUoo14C0Y1kSI' => "Curso Linux",
           'curso_windows11' => "Curso Windows 11",
           'curso_seguranca' => "Curso Segurança",
           'curso_redes' => "Curso Redes",
           'dois_cursos' => "Pack Linux e Windows 11",
           'dois_cursos' => "Pack Segurança e Redes de computadores",
           'tres_cursos' => "Pack Linux, Redes de computadores e Segurança",
        ];
        $data = [
            'intent' => auth()->user()->createSetupIntent(),
            'plans'=> $availablePlans
        ];
        return view('payment1')->with($data);
    }

    public function subscribe(Request $request)
    {
        $user = auth()->user();
        $paymentMethod = $request->payment_method;

        $planId = $request->plan;
        $user->newSubscription('main', $planId)->create($paymentMethod);

        return response([
            'success_url'=> redirect()->intended('/')->getTargetUrl(),
            'message'=>'success'
        ]);

    }
}
