<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Exception;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function index()
    {
        try {
            $subscribe = Subscribe::get();
            return response()->json([
                'success' => true,
                'subscribe' => $subscribe
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'subscribe' => $e->getMessage(),
            ]);
        }
    }
    public function getTotalSubscribe()
    {
        try {
            $subscribe = Subscribe::count();
            return response()->json([
                'success' => true,
                'subscribe' => $subscribe
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'subscribe' => $e->getMessage(),
            ]);
        }
    }
    public function delete($id)
    {
        try {
            $result = Subscribe::findOrFail($id)->delete();
            if ($result) {
                return response()->json([
                    'success' => true,
                    'message' => 'Subscribe Delete Successfully'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Some Problem'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
