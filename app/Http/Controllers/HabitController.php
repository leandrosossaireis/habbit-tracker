<?php

namespace App\Http\Controllers;

use App\Models\Habit;
use Illuminate\View\View;
use App\Http\Requests\HabitRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class HabitController extends Controller
{
    use AuthorizesRequests;
    public function create(): View
    {
        return view('create');
    }

    public function store(HabitRequest $request)
    {
        $validated = $request->validated();

        $habit = Auth::user()->habits()->create($validated);

        $habit->habitLogs()->firstOrCreate(
            [
                'user_id' => Auth::id(),
                'completed_at' => now()->toDateString(),
            ],
            [
                'user_id' => Auth::id(),
                'habit_id' => $habit->id,
                'completed_at' => now()->toDateString(),
            ]
        );

        return redirect()->route('dashboard')->with('success', 'Hábito criado e marcado para hoje!');
    }

    public function storeLog(Habit $habit)
    {
        $this->authorize('log', $habit);

        $user = Auth::user();
        $today = now()->toDateString();

        $log = $habit->habitLogs()->firstOrCreate(
            [
                'user_id' => $user->id,
                'completed_at' => $today,
            ],
            [
                'user_id' => $user->id,
                'habit_id' => $habit->id,
                'completed_at' => $today,
            ]
        );

        $message = $log->wasRecentlyCreated
            ? 'Hábito marcado como concluído hoje!'
            : 'Hábito já marcado hoje.';

        return redirect()->route('dashboard')->with('success', $message);
    }

    public function show(Habit $habit)
    {
        $this->authorize('view', $habit);
        //
    }

    public function edit(Habit $habit): View
    {
        $this->authorize('update', $habit);

        return view('edit', compact('habit'));
    }

    public function update(HabitRequest $request, Habit $habit)
    {
        $this->authorize('update', $habit);

        $habit->update($request->validated());

        return redirect()->route('dashboard')->with('success', 'Hábito atualizado com sucesso!');
    }

    public function destroy(Habit $habit)
    {
        $this->authorize('delete', $habit);

        $habit->delete();

        return redirect()->route('dashboard')->with('success', 'Hábito excluído com sucesso!');
    }
}