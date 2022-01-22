<x-guest-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between items-center">

            <div>
                <h3 class="text-2xl font-extrabold my-8">{{$store->name}}</h3>
                <h5 class="my-4 text-4xl">Nossos Produtos</h5>
            </div>

            <div class="flex">
                <a href="{{route('cart.index', [request('domain')])}}" class="relative mr-8">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    @if(session()->has('cart'))
                        <span class="absolute bg-red-500 text-white rounded-full p-1 right-0 top-1">{{count(session()->get('cart'))}}</span>
                    @endif
                </a>

                @auth
                    <span class="mr-4">Olá, {{auth()->user()->name}}</span>
                    <a href="{{route('logout')}}"> Logout</a>
                @endauth
            </div>
        </div>
        <hr>
        <div class="grid grid-cols-3 gap-1 mt-20">
            @forelse($store->products as $product)
                <div class="p-2 border border-gray-200 mb-8">
                    <h5 class="text-3xl">{{ucfirst($product->name)}}</h5>
                    <p class="my-4">
                        {{$product->description}}
                    </p>
                    <h3 class="font-extrabold text-2xl text-red-500">R$ {{number_format($product->price, 2, ',', '.')}}</h3>

                    <a href="{{route('cart.add', [request('domain'), 'product' => $product->slug])}}" class="underline text-blue-500">Comprar</a>
                </div>
            @empty
                <h3 class="font-extrabold text-4xl">Sem produtos cadastrados...</h3>
            @endforelse
        </div>
    </div>
</x-guest-layout>
