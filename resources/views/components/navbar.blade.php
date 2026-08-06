<nav>
        <ul class='flex gap-4 items-center '>
            <li>
                <a href="{{ route('habits.index') }}" class='{{ Route::is('habits.index') ? 'font-bold underline' : '' }} text-md border-r-2 border-habit-orange pr-4 hover:underline'>
                    Hoje
                </a>
            </li>
            <li>
                <a href="#" class='text-md border-r-2 border-habit-orange pr-4 hover:underline'>
                    Historico
                </a>
            </li>
            <li>
                <a href="#" class='text-md border-r-2 border-habit-orange pr-4 hover:underline'>
                    Calendário
                </a>
            </li>
            <li>
                <a href="{{ Route::has('habits.settings') ? route('habits.settings') : url('/habits/settings') }}" class='{{ (Route::has('habits.settings') && Route::is('habits.settings')) ? 'font-bold underline' : '' }} text-md hover:underline'>
                    Gerenciar Hábitos
                </a>
            </li>
        </ul>
    </nav> 