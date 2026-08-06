<header class="bg-white border-b-2 flex items-center justify-between p-4 ">
    <div class="flex items-center gap-2">
        <a href='{{ url('/dashboard/habits/') }}' class="habit-btn habit-shadow-lg px-2 py-1 bg-habit-orange">
            HT
        </a>
        <p class="font-bold text-lg">
            Habit Tracker
        </p>
    </div>

    <div class="flex items-center gap-2">

        @auth
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="habit-shadow-lg habit-btn p-2 border-2">Logout</button>
            </form>
        @endauth

        @guest
        <a href="{{ route('login') }}" class="bg-habit-orange p-2 habit-btn habit-shadow-lg">Logar</a>
        <a href="{{ route('register') }}" class="bg-white p-2 habit-btn habit-shadow-lg">Cadastrar</a>
        @endguest
</header>