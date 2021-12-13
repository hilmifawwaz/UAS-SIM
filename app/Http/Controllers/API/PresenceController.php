<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Presence;
use App\Models\PresenceDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresenceController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $description = $request->input('description');

        if ($id) {
            $presence = Presence::with(['details.activity'])->find($id);

            if ($presence) {
                return ResponseFormatter::success(
                    $presence,
                    'Data berhasil diambil',
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    "Data tidak ada",
                    404
                );
            }
        }
        $presence = Presence::with(['details.activity'])->where('users_id', Auth::user()->id);

        if ($description) {
            $presence->where('description', $description);
        }

        return ResponseFormatter::success(
            'Data berhasil diambil'
        );
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'activities' => 'required|array',
            'activities.*.id' => 'exists:activities,id',
            'description' => 'required|in:HADIR,ABSEN',
        ]);

        $presence = Presence::create([
            'users_id' => Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        foreach ($request->activities as $activity) {
            PresenceDetail::create([
                'users_id' => Auth::user()->id,
                'activities_id' => $activity['id'],
                'presence_id' => $presence->id,
            ]);
        }

        return ResponseFormatter::success(
            $presence->load('details.activity'),
            'Berhasil',
        );
    }
}
