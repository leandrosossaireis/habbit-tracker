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
            {{ date('d/m/Y') }}
        </h2>
        <ul class='flex flex-col gap-2'>
            @forelse($habits as $item)
                @php
                    $wasCompletedToday = $item->habitLogs()
                        ->where('user_id', Auth()->id())
                        ->whereDate('completed_at', now()->toDateString())
                        ->exists();
            
                @endphp
                <li class='habit-shadow-lg p-2 bg-orange-200 '>
                    <form method='POST' action="{{ route('habits.toggle', $item->id) }}" class='flex gap-2 items-center' id="form-{{ $item->id }}">
                        @csrf

                        
                        <input type="checkbox" class="w-6 h-6" {{ $item->is_completed ? 'checked' : '' }} 
                        {{ $wasCompletedToday ? 'checked' : '' }}
                        onchange="document.getElementById('form-{{ $item->id }}').submit()">
                    <p class='font-bold text-lg'>
                        {{ $item->name }}
                    </p>
                    </form>
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