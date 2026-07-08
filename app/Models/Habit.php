<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habit extends Model
{
   protected $fillable = [
        'user_id',
        'name',
    ];
    // Um hábito pertence a um usuário, então definimos a relação belongsTo
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // um habito poder ter muitos registros
    public function habitLogs()
    {
        return $this->hasMany(HabitLog::class);
    }
}
