<x-app-layout>
<!--Table-->
<div class="container mx-auto mt-3">
<td class="flex justify-center mb-4">
    <form method="GET" action="{{ route('produtos.create') }}">
        <x-primary-button type="submit" class="">
            Adicione aqui!
        </x-primary-button-button>
    </form>
</td>
<table class="min-w-full text-center text-sm font-light text-gray-800 border border-gray-300 rounded-md shadow-lg">
    <thead class="border-b border-gray-300 bg-gray-800 dark:border-gray-700">
        <tr>
            <th class="py-3 px-4 font-medium text-white">ID</th>
            <th class="py-3 px-4 font-medium text-white">Nome</th>
            <th class="py-3 px-4 font-medium text-white">Quantidade</th>
            <th class="py-3 px-4 font-medium text-white">Preço</th>
            <th class="py-3 px-4 font-medium text-white">Validade</th>
            <th class="py-3 px-4 font-medium text-white"></th>
            <th class="py-3 px-4 font-medium text-white"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($produtos as $produto)
            <tr class="border-b border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-300">
                <td class="whitespace-nowrap px-6 py-4 border-r border-gray-300">{{ $loop->iteration }}</td>
                <td class="whitespace-nowrap px-6 py-4 border-r border-gray-300">{{ $produto->nome }}</td>
                <td class="whitespace-nowrap px-6 py-4 border-r border-gray-300">{{ $produto->quantidade }}</td>
                <td class="whitespace-nowrap px-6 py-4 border-r border-gray-300">R$ {{ number_format($produto->valor, 2, ',', '.') }}</td>
                <td class="whitespace-nowrap px-6 py-4 border-r border-gray-300">{{ \Carbon\Carbon::parse($produto->validade)->format('d/m/Y') }}</td>

                <!-- Botões -->
                <td class="whitespace-nowrap px-6 py-4 border-r border-gray-300">
                    <a href="{{ route('produtos.edit', ['produto' => $produto->id]) }}">
                    <button class="text-green-600 hover:underline">Editar</button>
                    </a>
                </td>
                <td class="whitespace-nowrap px-6 py-4">
                    <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" onsubmit="return confirm('Você tem certeza que deseja excluir este produto?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Excluir
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
</x-app-layout>