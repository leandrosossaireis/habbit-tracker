<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HabitLog extends Model
{
    protected $fillable = [
        'user_id',
        'habit_id',
        'completed_at',
    ];
    // Um hábito logado pertence a um usuário, então definimos a relação belongsTo
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Um registro pertence a um habito
    public function habit()
    {
        return $this->belongsTo(Habit::class);
    }
}
