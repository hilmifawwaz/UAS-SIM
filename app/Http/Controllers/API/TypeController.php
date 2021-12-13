<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');

        if ($id) {
            $type = Type::with(['activities'])->find($id);

            if ($type) {
                return ResponseFormatter::success(
                    $type,
                    'berhasil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'gagal'
                );
            }
        }
        $type = Type::with(['activities']);

        if ($name) {
            $type;
        }
    }
}
