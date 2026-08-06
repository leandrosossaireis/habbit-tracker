<x-layout >
    <main class='py-10 min-h-[calc(100vh-160px)] px-4'>

    <x-navbar />
    

    @session('success')
        <div class='bg-green-200 border-2 border-green-600 text-green-600 p-2 mt-4'>
            {{ session('success') }}
        </div> 
    @endsession

    <div>
        <h2 class='text-lg mt-8 mb-4'>
            Configurar Hábitos
        </h2>
        <ul class='flex flex-col gap-2'>
            @forelse($habits as $item)
                <li class='habit-shadow-lg p-2 bg-orange-200'>
                    <div class='flex gap-2 items-center'>
                    <p class='font-bold text-lg'>
                        {{ $item->name }}
                    </p>
                    <a href="{{ route('habits.edit', $item->id) }}" class='bg-gray-400 p-1 hover:opacity-50 transition cursor-pointer habit-shadow-lg'>
                        <x-icons.edit />
                    </a>

                    <form action="{{ route('habits.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class='bg-red-400 p-1 hover:opacity-50 transition cursor-pointer habit-shadow-lg'>
                            <x-icons.trash />
                        </button>
                    </div>
                </li>
            @empty
                <li>Nenhum hábito cadastrado</li>
                <a href="habits/create" class='bg-white p-2 border-2'>
                    Cadastrar hábito
                </a>
            @endforelse
        </ul>
    </div>
    </main>
</x-layout>