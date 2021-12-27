<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $types = $request->input('types');
        $limit = $request->input('limit', 6);

        if ($id) {
            $activity = Activity::with(['details'])->find($id);

            if ($activity) {
                return ResponseFormatter::success(
                    $activity,
                    'berhasil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'gagal'
                );
            }
        }
        $activity = Activity::with(['details']);

        if ($id) {
            $activity;
        }
        if ($name) {
            $activity;
        }
        return ResponseFormatter::success(
            $activity->paginate($limit),
            'Data list produk berhasil diambil'
        );
    }
}
