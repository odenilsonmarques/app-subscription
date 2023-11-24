{{-- aqui usamos a configuração padrao do dashboard do laravel, mas poderia ser outra, como bootstrap --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('checkout') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    

                    <form action="#" method="post">
                        @csrf

                        <div class="col-span-6 sm:col-span-4 py-2">
                            <input type="text" name="card-hold-name" id="card-hold-name" placeholder="informe seu nome" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                        </div>
                       
                        <div class="col-span-6 sm:col-span-4 py-2">
                            {{-- essa div é chamada pelo script abaixo para nomtar alguns dados do cartao --}}
                            <div id="card-element" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300"></div>
                        </div>
                        
                        <div class="col-span-6 sm:col-span-4 py-2">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-blue rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-black-300">Enviar</button>
                        </div>

                       

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>


{{-- script para configurar os recurso do stripe e ter acessos as chaves declarada no arquivo .env --}}
<script>
    const stripe = Stripe("{{config('cashier.key')}}"); //recebendo as configurações passando a chave public e como é public nao tem problema expor aqui, Além disso com o elemento card criado o stripe ja cria alguns campo do cartao
    const elements = stripe.elements(); 
    const cardElement = elements.create('card'); 
    cardElement.mount("#card-element");


</script>