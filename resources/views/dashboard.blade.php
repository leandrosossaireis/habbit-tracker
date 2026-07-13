<x-layout >
    <main class='py-10'>
    <h1>
        Dashboard
    </h1>

    <p>
        Bem-vindo ao seu painel de controle, {{ auth()->user()->name }}!
    </p>
    
    <div>
        <h2 class='text-xl mt-4'>
            Listagem dos Habitos:
        </h2>
        <ul class='flex flex-col gap-2'>
            @forelse($habits as $item)
                <li class='pl-4'>
                    <div class='flex gap-2 items-center'>
                    <p class='font-bold text-xl'>
                        - {{ $item->name }}
                    </p>
                    <p>
                        [{{ $item->habitlogs->count() }}]
                    </p>
                    </div>
                </li>
            @empty
                <li>Nenhum hábito cadastrado</li>
                <a href="/habits/create" class='bg-white p-2 border-2'>
                    Cadastrar hábito
                </a>
            @endforelse
        </ul>
    </div>
    </main>
</x-layout>