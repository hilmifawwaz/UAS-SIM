<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'types_id',
    ];

    public function details()
    {
        return $this->hasOne(PresenceDetail::class, 'activities_id', 'id');
    }

    public function types()
    {
        return $this->belongsTo(Type::class, 'types_id', 'id');
    }
}
