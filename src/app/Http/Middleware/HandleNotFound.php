<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HandleNotFound
{
    public function handle(Request $request, Closure $next)
    {
        try {
            return $next($request);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error('Model not found: ' . $e->getModel());

            return response()->json([
                'message' => 'Запись с указанным ID не найдена'
            ], 404);
        } catch (\Exception $e) {
            Log::error('Unexpected error occurred: ' . $e->getMessage());
            return response()->json([
                'message' => 'Неожиданная ошибка произошла при обработке запроса'
            ], 500);
        }
    }
}
