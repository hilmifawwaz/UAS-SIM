<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PresenceDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'users_id',
        'activities_id',
        'presence_id',
        'date',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'id', 'activities_id');
    }

    public function presences()
    {
        return $this->belongsTo(Presence::class, 'presences_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
