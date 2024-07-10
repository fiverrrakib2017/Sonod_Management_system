<?php
namespace App\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ValidationService
{
    public function check(Request $request, array $rules)
    {
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        return true;
    }
}
