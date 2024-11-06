<x-app-layout>
<!--Confirmação-->
@if(session()->has('message'))
    <div class="alert alert-success my-3 mx-4 d-flex justify-content-center align-items-center">
        <ul class="mb-0 ">
            {{ session()->get('message')}}
        </ul>
    </div>
@endif
<div class="container-fluid  vh-100 d-flex justify-content-center align-items-center" style="min-height: 100vh">
    <div class="card bg-light shadow-lg" style="width: 28rem; height: 32rem">
        <div class="card-body text-center">
            <form action="{{ route('remedios.store') }}" method="POST">
                @csrf
                <!--Nome Produto-->
                <div class="mb-3">
                    <input type="text" name="nome" 
                        class="w-full py-3 px-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('nome') border-red-500 @enderror" 
                        value="{{ old('nome') }}" 
                        placeholder="Nome">
                        @error('nome')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                </div>

                <div class="max-w-xs mx-auto mb-3">
                    <label for="categoria_especial" class="block text-sm font-medium text-gray-700">Escolha uma categoria</label>
                    <select id="categoria_especial" name="categoria_especial" class="w-full py-3 px-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('categoria_especial') border-red-500 @enderror" value="{{ old('categoria_especial') }}">
                        <option value="A">Categoria A</option>
                        <option value="B">Categoria B</option>
                        <option value="C">Categoria C</option>
                        <option value="D">Categoria D</option>
                    </select>
                </div>

                <div class="">
                    <input type="text" name="categoria_especial" 
                        class="w-full py-3 px-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('categoria_especial') border-red-500 @enderror" 
                        value="{{ old('categoria_especial') }}" 
                        placeholder="Categoria">
                        @error('nome')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                </div>
                <!--Quantidade Produto-->
                <div class="mb-3">
                    <input type="text" name="quantidade" 
                        class="w-full py-3 px-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('quantidade') border-red-500 @enderror" 
                        value="{{ old('quantidade') }}" 
                        placeholder="Quantidade">
                        @error('quantidade')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                </div>
                <!--Valor Produto-->
                <div class="mb-3">
                    <input type="number" name="valor" 
                        class="w-full py-3 px-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('valor') border-red-500 @enderror" 
                        value="{{ old('valor') }}" 
                        placeholder="Preço">
                        @error('valor')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                </div>
                <!--Validade Produto-->
                <div class="mb-3">
                    <input type="text" name="validade" 
                        class="w-full py-3 px-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 @error('validade') border-red-500 @enderror" 
                        value="{{ old('validade') }}" 
                        placeholder="validade">
                        @error('validade')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                </div>
                <!--Botões-->
                <div class="space-y-2">
                    <button type="submit" class="w-full btn btn-info text-white py-2 px-4 rounded-lg transition duration-300">Adicionar</button>
                    <button class="w-full bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg transition duration-300">
                        <a href="/remedios" class="text-decoration-none text-light">Voltar</a>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</x-app-layout>