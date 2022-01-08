<x-guest-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h3 class="text-2xl font-extrabold my-8">{{$store->name}}</h3>
        <hr>
        <h5 class="my-4 text-4xl">Nossos Produtos</h5>
        <hr>
        <div class="grid grid-cols-3 mt-20">
            @forelse($store->products as $product)
                <div class="w-2/3 p-2 border border-gray-200 mb-8">
                    <h5 class="text-3xl">{{ucfirst($product->name)}}</h5>
                    <p class="my-4">
                        {{$product->description}}
                    </p>
                    <h3 class="font-extrabold text-2xl text-red-500">R$ {{number_format($product->price, 2, ',', '.')}}</h3>
                </div>
            @empty
                <h3 class="font-extrabold text-4xl">Sem produtos cadastrados...</h3>
            @endforelse
        </div>
    </div>
</x-guest-layout>
