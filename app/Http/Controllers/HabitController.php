<?php

namespace App\Http\Controllers;

use App\Models\Habit;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\HabitRequest;
use Illuminate\Support\Facades\Auth;

class HabitController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(Habit $habit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Habit $habit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Habit $habit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habit $habit)
    {
        $habit->delete();

        return redirect()->route('dashboard')->with('success', 'Hábito excluído com sucesso!');
    }
}
