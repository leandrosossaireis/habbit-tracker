<x-layout >
    <main class='py-10'>
    <h1 class='font-bold text-4xl text-center'>
        Dashboard
    </h1>
    <a href="{{ route('habits.create') }}" class='p-2 border-2 bg-white font-bold'>
        Cadastrar Hábito
    </a>

    @session('success')
        <div class='bg-green-500 text-white p-2 mt-4'>
            {{ session('success') }}
        </div> 
    @endsession

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