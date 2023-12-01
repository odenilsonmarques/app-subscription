{{-- aqui usamos a configuração padrao do dashboard do laravel, mas poderia ser outra, como bootstrap --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Area vip') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Minhas assinaturas

                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr>
                                <th class="py-6 px-3 border-b">Data</th>
                                <th class="py-6 px-3 border-b">Preço</th>
                                <th class="py-6 px-3 border-b">Download</th>
                            </tr>
                        </thead>
                    
                        <tbody>
                            @foreach ($invoices as $invoice)
                                <tr>
                                    <td class="py-6 px-4 border-b">{{$invoice->date()->toFormattedDateString()}}</td>
                                    <td class="py-6 px-4 border-b">{{$invoice->total()}}</td>
                                    <td class="py-6 px-4 border-b">
                                        <a href="{{route('subscriptions.invoice.download', $invoice->id)}}" class="text-blue-500 hover:underline">
                                            Baixar
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
