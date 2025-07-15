<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function testPurchases()
    {
        try {
            // Test database connection
            $userCount = DB::table('users')->count();
            $purchaseCount = DB::table('purchases')->count();

            return response()->json([
                'status' => 'success',
                'message' => 'Database connection test',
                'data' => [
                    'users_count' => $userCount,
                    'purchases_count' => $purchaseCount,
                    'tables' => DB::select("SELECT name FROM sqlite_master WHERE type='table'")
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function testAuth(Request $request)
    {
        try {
            $user = $request->user();

            if (!$user) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Not authenticated'
                ], 401);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Authentication test',
                'user' => $user
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
