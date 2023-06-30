<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Empresa') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <x-success-status class="mb-4" :status="session('message')" />

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="bordered striped centered">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>CNPJ</th>
                                <th>Editar</th>
                                <th>Deletar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($empresas as $empresa)
                                <tr>
                                    <td>{{ $empresa->nome }}</td>
                                    <td>{{ $empresa->email }}</td>
                                    <td>{{ $empresa->telefone }}</td>
                                    <td>{{ $empresa->cnpj }}</td>
                                    <td><a href="{{ url('/edit-empresa/'.$empresa->id) }}" class="btn">Editar</a></td>
                                    <td>
                                        {{-- <a href="{{ url('/ ') }}" class="btn red">Deletar</a> --}}
                                        <form action="{{ url('delete-empresa/'.$empresa->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn red">Deletar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6"></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
