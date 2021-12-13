<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresenceItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'activities_id',
        'presences_id'
    ];
}
