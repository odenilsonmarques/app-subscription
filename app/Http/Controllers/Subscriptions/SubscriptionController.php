<?php

namespace App\Http\Controllers\Subscriptions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    //pasando o construtor para garantir que ao tentar utilizar qualquer método desse controller é preciso está autenticado
    public function __construct()
    {
        $this->middleware(['auth']);
    }


    //metodo para criar uma assinatura do usuário autenticado
    public function store(Request $request) 
    {
        // lebrando que como usei o recurso de (Billable) na model user, posso usar o user aqui e os parametro. O segundo parametro é assinatura do curso, no caos pegeui do plano trimestral
        $request->user()
                ->newSubscription('default', 'price_1NwmxHKgIIEG85eD7N7B3Gnv')
                ->create($request->token);

        // depois que o usuário criar a assinatura ele vai ser direcionado para uma agina premium, como exemplo
        return redirect()->route('subscriptions.premium');
    }


    // Metodo para rdirecionar para página de checkout
    public function checkout()
    {
        return view('subscriptions.checkout',[
            // declarando uma variavel intent que recupera o usuario autenticado e chama o metod createSetupIntennt do stripe. Despoi é preciso pegar essa variavel na view, e nesse caso declaramos no botao
            'intent' => auth()->user()->createSetupIntent(),
        ]);
    }

    //chama a view premium
    public function premium()
    {
        return view('subscriptions.premium');
    }



}
