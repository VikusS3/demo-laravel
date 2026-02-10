<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Listar compañías (Solo las activas).
     */
    public function index(Request $request) // Asegúrate de inyectar Request
    {
        // $companies = Company::query()
        //     // Si hay una búsqueda en la URL (?search=algo)...
        //     ->when($request->input('search'), function ($query, $search) {
        //         $query->where('name', 'like', "%{$search}%")
        //             // Opcional: Si quieres que también busque por RUC al mismo tiempo:
        //             ->orWhere('ruc', 'like', "%{$search}%");
        //     })
        //     ->orderBy('id', 'desc')
        //     ->paginate(10)
        //     ->withQueryString(); // <--- IMPORTANTE: Mantiene el filtro al cambiar de página

        // return view('companies.index', compact('companies'));
        return view('companies.index');
    }

    /**
     * Crear nueva compañía.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'ruc'           => 'nullable|string|max:20',
            'email'         => 'nullable|email',
            'phone'         => 'nullable|string',
            'address'       => 'nullable|string',
            'plan'          => 'in:free,pro,enterprise', // Validar enum
            'slogan'        => 'nullable|string',
            'website'       => 'nullable|url',
            'color_primary' => 'nullable|string',
            // Agrega validaciones para redes sociales si quieres
        ]);

        // AL CREAR: Recuerda que en el Modelo Company.php pusimos la lógica
        // para que se creen los estados por defecto automáticamente.
        $company = Company::create($validated);

        return response()->json([
            'message' => 'Compañía creada exitosamente',
            'data' => $company
        ], 201);
    }

    /**
     * Mostrar una compañía específica.
     */
    public function show($id)
    {
        $company = Company::find($id);

        if (!$company || !$company->active) {
            return response()->json(['message' => 'Compañía no encontrada'], 404);
        }

        // Opcional: cargar sus estados personalizados
        $company->load('customStatuses');

        return response()->json($company);
    }

    /**
     * Actualizar datos de la compañía.
     */
    public function update(Request $request, $id)
    {
        $company = Company::find($id);

        if (!$company) {
            return response()->json(['message' => 'Compañía no encontrada'], 404);
        }

        // Validamos (todo nullable para permitir actualización parcial)
        $request->validate([
            'name'  => 'sometimes|string',
            'email' => 'sometimes|email',
            'plan'  => 'sometimes|in:free,pro,enterprise',
            // ... resto de campos
        ]);

        $company->update($request->all());

        return response()->json([
            'message' => 'Compañía actualizada',
            'data' => $company
        ]);
    }

    /**
     * Borrado Lógico (Desactivar en lugar de borrar).
     */
    public function destroy($id)
    {
        $company = Company::find($id);

        if (!$company) {
            return response()->json(['message' => 'Compañía no encontrada'], 404);
        }

        // En tu migración definiste 'active', así que no borramos la fila,
        // solo la marcamos como inactiva.
        $company->update(['active' => false]);

        return response()->json(['message' => 'Compañía desactivada correctamente']);
    }
}
