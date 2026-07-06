<x-layout >
    <main class='py-10'>
    <section class="bg-white max-w-150 mx-auto p-10 border-2 mt-4">
        <h1 class="text-3xl font-bold mb-4">
        Cadastre-se
        </h1>
        <p>
            Crie sua conta e comece a gerenciar seus hábitos!
        </p>
        <form action="{{ route('auth.register') }}" method="POST" class="flex flex-col">
            @csrf

            <div class="flex flex-col gap-2 mb-4">
                <label for="name">Nome</label>
                <input type="text" name="name" placeholder="Digite seu nome" class="bg-white p-2 border-2 @error ('name') border-red-500 @enderror"/>
                @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror

            <div class="flex flex-col gap-2 mb-4">
                <label for="email">Email</label>

                <input type="email" name="email" placeholder="Digite seu email" class="bg-white p-2 border-2 @error ('email') border-red-500 @enderror"/>
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col gap-2 mb-4">
                <label for="password">Senha</label>
                <input type="password" name="password" placeholder="********" class="bg-white p-2 border-2 @error ('password') border-red-500 @enderror"/>
                @error('password')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col gap-2 mb-4">
                <label for="password_confirmation">Repita sua senha</label>
                <input type="password" name="password_confirmation" placeholder="********" class="bg-white p-2 border-2 @error ('password_confirmation') border-red-500 @enderror"/>
                @error('password_confirmation')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-white border-2 p-2">Cadastrar</button>

        </form> 
        <p class="mt-4 text-center">Ja tem uma conta?
            <a href="{{ route('login') }}" class="text-blue-500 underline hover:opacity-50 transition">Faça login</a>
        </p>
    </section>
    </main>
</x-layout>