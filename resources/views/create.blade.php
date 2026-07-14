<x-layout >
    <main class='py-10'>
        <h1>
            Cadastrar Novo Hábito
        </h1>
        <section class="bg-white max-w-150 mx-auto p-10 border-2 mt-4">
        <form action="{{route('habits.store')}}" method="post">
            @csrf
            <div class='flex flex-col gap-2 mb-2'>
                <label for="name">Nome do Hábito</label>
                <input type="text" name="name" id="name" placeholder="Ex.: Ler um livro" class='bg-white p-2 border-2' @error('name') border-red-500 @enderror">
                @error('name')
                    <p class='text-red-500 text-sm'>{{ $message }}</p>
                @enderror

            <button type="submit" class="bg-white border-2 p-2">Cadastrar Hábito</button>
            </div>
            </section>
        </form>
    </main>
</x-layout>