<?php

namespace App\Http\Controllers;

use App\Models\SensorValue;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SaveDataController extends Controller
{
    public function saveData(Request $request): JsonResponse
    {
        try {
            $data = $request->all();

            if (empty($data['value'])) {
                return response()->json([
                    'message' => 'El valor es requerido',
                ], 400);
            }

            SensorValue::create([
                'value' => $data['value'],
            ]);

            return response()->json([
                'message' => 'Valor guardado correctamente',
            ], 201);
        } catch (Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], 500);
        }
    }
}
