<x-guest-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h3 class="text-2xl font-extrabold my-8"></h3>
        <hr>
        <h5 class="my-20 text-4xl text-center font-extrabold">Checkout</h5>
        <hr>

        <div class="w-1/2 block mx-auto mt-10">
            <form action="{{route('checkout.proccess', request('domain'))}}" method="post">
                @csrf
                <div class="w-full mb-8">
                    <label class="block">Número Cartão</label>
                    <input type="text" name="card_number" class="w-full">
                </div>

                <div class="w-full mb-8 flex justify-between">
                    <div>
                        <label class="block">Validade</label>
                        <input type="text" name="card_date">

                    </div>
                    <div>
                        <label class="block">Código de Segurança</label>
                        <input type="text" name="card_cvv">
                    </div>
                </div>

                <button
                        class="text-xl font-bold px-4 py-2 rounded bg-green-600 text-white shadow hover:bg-green-300 transition ease-in-out delay-150 uppercase">Realizar Pagamento</button>
            </form>
        </div>
    </div>
</x-guest-layout>
