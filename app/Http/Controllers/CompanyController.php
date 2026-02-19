<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Muestra la vista principal.
     */
    public function index()
    {
        return view('companies.index');
    }

    /**
     * Obtiene los datos para la tabla via AJAX.
     * Retorna JSON con items y paginación.
     */
    public function getData(Request $request)
    {
        $search = $request->input('search');

        $companies = Company::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('ruc', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })
            ->where('active', true)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json($companies);
    }

    /**
     * Crea una nueva compañía via AJAX.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name'          => 'required|string|max:255',
                'ruc'           => 'nullable|string|max:20',
                'slogan'        => 'nullable|string|max:255',
                'description'   => 'nullable|string',
                'website'       => 'nullable|url',
                'color_primary' => 'nullable|string|max:7',
                'email'         => 'nullable|email',
                'phone'         => 'nullable|string',
                'address'       => 'nullable|string',
                'plan'          => 'required|in:free,pro,enterprise',
                'logo'          => 'nullable|image|max:2048', // 2MB Max
            ]);

            // Manejo del Logo
            if ($request->hasFile('logo')) {
                $validated['logo_path'] = $request->file('logo')->store('logos', 'public');
            }
            // Valor por defecto color
            if (empty($validated['color_primary'])) {
                $validated['color_primary'] = '#4030E8';
            }

            $company = Company::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Compañía creada correctamente.',
                'data'    => $company
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors'  => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error al guardar: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtiene una compañía específica para editar (AJAX).
     */
    public function show($id)
    {
        $company = Company::find($id);

        if (!$company || !$company->active) {
            return response()->json(['message' => 'Compañía no encontrada'], 404);
        }

        return response()->json($company);
    }

    /**
     * Actualiza una compañía via AJAX.
     */
    public function update(Request $request, $id)
    {
        $company = Company::find($id);

        if (!$company) {
            return response()->json(['success' => false, 'message' => 'Compañía no encontrada'], 404);
        }

        try {
            $validated = $request->validate([
                'name'          => 'required|string|max:255',
                'ruc'           => 'nullable|string|max:20',
                'slogan'        => 'nullable|string|max:255',
                'description'   => 'nullable|string',
                'website'       => 'nullable|url',
                'color_primary' => 'nullable|string|max:7',
                'email'         => 'nullable|email',
                'phone'         => 'nullable|string',
                'address'       => 'nullable|string',
                'plan'          => 'required|in:free,pro,enterprise',
                'logo'          => 'nullable|image|max:2048',
            ]);

            // Manejo del Logo (borrar anterior si hay nuevo)
            if ($request->hasFile('logo')) {
                if ($company->logo_path) {
                    Storage::disk('public')->delete($company->logo_path);
                }
                $validated['logo_path'] = $request->file('logo')->store('logos', 'public');
            }

            $company->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Compañía actualizada correctamente.',
                'data'    => $company
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors'  => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Elimina (soft delete) una compañía via AJAX.
     */
    public function destroy($id)
    {
        $company = Company::find($id);

        if (!$company) {
            return response()->json(['success' => false, 'message' => 'Compañía no encontrada'], 404);
        }

        $company->update(['active' => false]);

        return response()->json([
            'success' => true,
            'message' => 'Compañía desactivada correctamente.'
        ]);
    }
}
