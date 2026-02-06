<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderHistory; // Importante importar esto
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Para transacciones
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    /**
     * Muestra la lista de pedidos.
     */
    public function index()
    {
        // Traemos los pedidos con su estado actual y la compañía
        // Paginamos de 10 en 10
        $orders = Order::with(['latestHistory.status', 'company'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json($orders);
    }

    /**
     * Muestra el formulario para crear (No se usa en APIs, puedes dejarlo vacío).
     */
    public function create()
    {
        // Solo para vistas Blade (HTML), ignóralo si es API
    }

    /**
     * Guarda el nuevo pedido en la BD.
     */
    public function store(Request $request)
    {
        // 1. Validamos los datos
        $validated = $request->validate([
            'company_id'       => 'required|exists:companies,id',
            'order_status_id'  => 'required|exists:order_statuses,id', // Estado inicial
            'customer_name'    => 'required|string',
            'customer_phone'   => 'required|string',
            'customer_address' => 'required|string',
            'destination'      => 'required|string',
            'observation'      => 'nullable|string',
            'customer_email'   => 'nullable|email',
        ]);

        // 2. Creamos el pedido.
        // RECUERDA: Tu modelo Order ya tiene el evento "creating" y "created" 
        // configurados para generar el tracking_code y el primer historial automáticamente.
        $order = Order::create($validated);

        return response()->json([
            'message' => 'Pedido creado exitosamente',
            'data' => $order
        ], 201);
    }

    /**
     * Muestra un pedido específico con TODO su historial.
     */
    public function show($term)
    {
        // Busca por ID O por Tracking Code
        $order = Order::with(['history.status', 'currentStatus', 'company'])
            ->where('id', $term)
            ->orWhere('tracking_code', $term)
            ->first(); // Usamos first() en lugar de find()

        if (!$order) {
            return response()->json(['message' => 'Pedido no encontrado'], 404);
        }

        return response()->json($order);
    }
    /**
     * Muestra el formulario de edición (No se usa en APIs).
     */
    public function edit($id)
    {
        // Solo para vistas Blade
    }

    /**
     * Actualiza el pedido. Aquí manejamos el CAMBIO DE ESTADO.
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Pedido no encontrado'], 404);
        }

        $request->validate([
            'order_status_id' => 'sometimes|exists:order_statuses,id',
            'notes'           => 'nullable|string',
            'customer_name'   => 'sometimes|string',
            // Validamos la foto: opcional (nullable), debe ser imagen (jpg, png), máx 5MB
            'proof_photo'     => 'nullable|image|max:5120',
        ]);

        DB::transaction(function () use ($order, $request) {

            // 1. PROCESAR LA IMAGEN (Si existe)
            $photoPath = null;
            if ($request->hasFile('proof_photo')) {
                // Guarda en la carpeta 'storage/app/public/proofs'
                $photoPath = $request->file('proof_photo')->store('proofs', 'public');
            }

            // A. CAMBIO DE ESTADO
            if ($request->has('order_status_id') && $request->order_status_id != $order->order_status_id) {

                $order->history()->create([
                    'order_status_id' => $request->order_status_id,
                    'notes'           => $request->notes ?? 'Actualización de estado',
                    'proof_photo'     => $photoPath, // <--- Guardamos la ruta o null
                ]);

                $order->order_status_id = $request->order_status_id;
            }

            // B. ACTUALIZAR OTROS DATOS
            $order->fill($request->except(['notes', 'tracking_code', 'id', 'order_status_id', 'proof_photo']));
            $order->save();
        });

        return response()->json([
            'message' => 'Pedido actualizado correctamente',
            'data' => $order->fresh(['currentStatus', 'latestHistory.status'])
        ]);
    }

    /**
     * Elimina el pedido.
     */
    public function destroy($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Pedido no encontrado'], 404);
        }

        $order->delete(); // El 'cascade' en la migración borrará el historial automáticamente

        return response()->json(['message' => 'Pedido eliminado correctamente']);
    }

    public function addNote(Request $request, $id)
    {
        $request->validate([
            'notes'       => 'required|string|max:500',
            // También permitimos foto aquí, opcional
            'proof_photo' => 'nullable|image|max:5120',
        ]);

        $order = Order::findOrFail($id);

        // 1. PROCESAR LA IMAGEN (Si existe)
        $photoPath = null;
        if ($request->hasFile('proof_photo')) {
            $photoPath = $request->file('proof_photo')->store('proofs', 'public');
        }

        // Creamos historial con el mismo estado actual
        $order->history()->create([
            'order_status_id' => $order->order_status_id,
            'notes'           => $request->notes,
            'proof_photo'     => $photoPath // <--- Guardamos la ruta o null
        ]);

        return response()->json(['message' => 'Nota agregada con éxito']);
    }
}
