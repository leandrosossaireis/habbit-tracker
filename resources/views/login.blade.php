<x-layout >
    <main class='py-10'>
    <h1>
        Faça login para continuar
    </h1>

    <section class="flex flex-col gap-4 mt-4">
        <form action="/login" method="POST">
            @csrf

            @if ($errors->any())
                <div class="text-red-500">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <input 
            type="email"
            name="email"
            placeholder="Digite seu email"
            class="bg-white p-2 border-2"/>

            <input 
            type="password"
            name="password"
            placeholder="********"
            class="bg-white p-2 border-2"/>

            <button 
            type="submit" 
            class="bg-white border-2 p-2">Entrar</button>
        </form> 
    </section>
    </main>
</x-layout>