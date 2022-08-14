<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscribeController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => ['required', 'email']
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()->all()
                ]);
            } else {
                $subscribe = Subscribe::create([
                    'email' => $request->email
                ]);
                if ($subscribe) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Subscribe SuccessFully'
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Some Problem'
                    ]);
                }
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
