<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Empresa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ url('update-empresa/'.$empresa->id) }}" method="POST">
                        @csrf
                        @method("PUT")

                        <div>
                            <x-input-label for="nome" :value="__('Nome')" />
                            <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="$empresa->nome" required autofocus />
                        </div>
                        <br>
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$empresa->email" required autofocus />
                        </div>
                        <br>
                        <div>
                            <x-input-label for="telefone" :value="__('Telefone')" />
                            <x-text-input id="telefone" class="block mt-1 w-full" type="text" name="telefone" :value="$empresa->telefone" required autofocus />
                        </div>
                        <br>
                        <div>
                            <x-input-label for="cnpj" :value="__('CNPJ')" />
                            <x-text-input id="cnpj" class="block mt-1 w-full" type="text" name="cnpj" :value="$empresa->cnpj" required autofocus />
                        </div>
                        <br>
                        <div>
                            <x-primary-button class="ml-3">
                                {{ __('Atualizar Empresa') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
