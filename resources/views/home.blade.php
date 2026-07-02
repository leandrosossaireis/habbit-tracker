<x-layout >
    <main class='py-10'>
    <h1>
        Veja seus habitos ganharem vida
    </h1>

    @auth
        <p>Você está logado como {{ auth()->user()->name }}</p>
    @else
        <p>Você não está logado</p>
    @endauth
    </main>
</x-layout>