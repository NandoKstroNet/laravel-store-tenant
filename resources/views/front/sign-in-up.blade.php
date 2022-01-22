<x-guest-layout>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">

        <!-- Sign-in -->
        <div class="w-1/2 border-r border-gray-400 mt-8 p-4">
            <h3 class="font-extrabold text-2xl w-full pb-8 pl-4">Login (Você já possui uma conta?)</h3>

            <form action="{{route('sign.in', request('domain'))}}" method="post">
                @csrf
                <div class="block mb-10">
                    <label class="font-bold">Email</label>
                    <input type="text" name="login[email]" value="{{old('login.email')}}" class="w-full block">
                    @error('login.email')
                        {{$message}}
                    @enderror
                </div>

                <div class="block mb-10">
                    <label class="font-bold">Senha</label>
                    <input type="password" name="login[password]" value="{{old('login.password')}}"  class="w-full block">
                    @error('login.password')
                        {{$message}}
                    @enderror
                </div>

                <button class="text-xl font-bold px-4 py-2 rounded bg-green-600 text-white shadow hover:bg-green-300 transition ease-in-out delay-150 uppercase">Login</button>

            </form>

        </div>

        <!-- Sign-up -->
        <div class="w-1/2 ml-10 mt-8">
            <h3 class="font-extrabold text-2xl w-full pb-8 pl-4">Registro (Não têm conta?)</h3>

            <form action="{{route('sign.up', request('domain'))}}" method="post">
                @csrf
                <div class="block mb-10">
                    <label class="font-bold">Nome Completo</label>
                    <input type="text" name="register[name]" value="{{old('register.name')}}" class="w-full block">

                    @error('register.name')
                        {{$message}}
                    @enderror
                </div>
                <div class="block mb-10">
                    <label class="font-bold">Email</label>
                    <input type="email" name="register[email]" value="{{old('register.email')}}" class="w-full block">

                    @error('register.email')
                        {{$message}}
                    @enderror
                </div>

                <div class="block mb-10">
                    <label class="font-bold">Senha</label>
                    <input type="password" name="register[password]" value="{{old('register.password')}}" class="w-full block">

                    @error('register.password')
                        {{$message}}
                    @enderror
                </div>

                <div class="block mb-10">
                    <label class="font-bold">Confirmar Senha</label>
                    <input type="password" name="register[password_confirmation]" value="{{old('register.password_confirmation')}}" class="w-full block">
                </div>

                <button class="text-xl font-bold px-4 py-2 rounded bg-green-600 text-white shadow hover:bg-green-300 transition ease-in-out delay-150 uppercase">Registrar</button>

            </form>

        </div>


    </div>

</x-guest-layout>
