<header class="bg-white border-b-2 flex items-center justify-between p-4">
    <div>
        Logo Aqui
    </div>

    <div class="flex items-center gap-2">
        <span>GitHub</span>

        @auth
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-white p-2 border-2">Logout</button>
            </form>
        @endauth

        @guest
            <a href="{{ route('login') }}" class="bg-white p-2 border-2">Login</a>
        @endguest
</header>