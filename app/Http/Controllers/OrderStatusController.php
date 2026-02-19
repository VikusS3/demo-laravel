<?php

namespace App\Http\Controllers;

use App\Models\OrderStatus;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    /**
     * Listar estados.
     * IMPORTANTE: Normalmente querrás filtrar por company_id
     * Ejemplo GET: /api/order-statuses?company_id=1
     */
    public function index()
    {
        return view('status.index');
    }

    /**
     * Crear un nuevo estado personalizado.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'name'       => 'required|string|max:50',
            'color'      => 'nullable|string|max:20', // Ej: #ff0000
        ]);

        $status = OrderStatus::create($validated);

        return response()->json([
            'message' => 'Estado creado exitosamente',
            'data' => $status
        ], 201);
    }

    /**
     * Mostrar un estado.
     */
    public function show($id)
    {
        $status = OrderStatus::find($id);
        return $status
            ? response()->json($status)
            : response()->json(['message' => 'Estado no encontrado'], 404);
    }

    /**
     * Actualizar estado (nombre o color).
     */
    public function update(Request $request, $id)
    {
        $status = OrderStatus::find($id);

        if (!$status) {
            return response()->json(['message' => 'Estado no encontrado'], 404);
        }

        $request->validate([
            'name'  => 'sometimes|string',
            'color' => 'sometimes|string',
        ]);

        $status->update($request->all());

        return response()->json([
            'message' => 'Estado actualizado',
            'data' => $status
        ]);
    }

    /**
     * Eliminar estado.
     */
    public function destroy($id)
    {
        $status = OrderStatus::find($id);

        if (!$status) {
            return response()->json(['message' => 'Estado no encontrado'], 404);
        }

        // PRECAUCIÓN: Si borras un estado que tienen asignado varios pedidos,
        // podrías romper la integridad o dejar pedidos huérfanos.
        // Lo ideal es verificar antes:
        if ($status->orders()->exists()) {
            return response()->json([
                'message' => 'No se puede eliminar este estado porque hay pedidos usándolo.'
            ], 400);
        }

        $status->delete();

        return response()->json(['message' => 'Estado eliminado correctamente']);
    }
}
