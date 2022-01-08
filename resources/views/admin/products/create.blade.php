<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Produto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <form action="{{route('products.store')}}" method="POST">
                        @csrf
                        <div class="w-full mb-8">
                            <label>Nome</label>
                            <input type="text" name="name" class="rounded w-full focus:border-gray-400 focus:ring-0">
                        </div>

                        <div class="w-full mb-8">
                            <label>Descrição</label>
                            <input type="text" name="description" class="rounded w-full focus:border-gray-400 focus:ring-0">
                        </div>

                        <div class="w-full mb-8">
                            <label>Descrição</label>
                            <textarea type="text" name="body" class="rounded w-full focus:border-gray-400 focus:ring-0"></textarea>
                        </div>

                        <div class="w-full mb-8">
                            <label>Preço</label>
                            <input type="text" name="price" class="rounded w-full focus:border-gray-400 focus:ring-0">
                        </div>

                        <div class="w-full mb-8">
                                <label class="block mb-8">Categorias</label>
                                <div class="grid grid-cols-3">
                                @forelse($categories as $category)
                                    <div class="flex items-center mb-8">
                                        <input type="checkbox" name="categories[]" value="{{$category->id}}" class="rounded focus:border-gray-400 focus:ring-0 mr-2"> {{$category->name}}
                                    </div>
                                @empty
                                    <strong>Sem Categorias Cadastradas em sua Loja</strong>
                                @endforelse
                            </div>
                        </div>

                        <div class="w-full mb-8 border border-gray-400 rounded bg-white px-6 py-2">
                            <label>Foto</label>
                            <input type="file" name="photo" class="rounded w-full focus:border-gray-400 focus:ring-0">
                        </div>

                        <button class="px-4 py-2 text-xl bg-green-600 hover:bg-green-300 hover:text-green-900 border border-green-900 transition-all ease-in-out duration-200 rounded text-white font-bold">
                            Cadastrar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
