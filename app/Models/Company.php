<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $table = 'companies';

    protected $fillable = [
        'name',
        'ruc',
        'slogan',
        'description',
        'website',
        'whatsapp',
        'facebook',
        'instagram',
        'logo_path',
        'color_primary',
        'email',
        'phone',
        'address',
        'plan',
        'active',
    ];

    protected static function booted()
    {
        static::created(function ($company) {
            // Crear estados por defecto automáticamente
            $defaultStatuses = [
                ['name' => 'Pendiente', 'color' => '#fbbf24'], // Amarillo
                ['name' => 'Procesando', 'color' => '#3b82f6'], // Azul
                ['name' => 'En Ruta', 'color' => '#8b5cf6'], // Violeta
                ['name' => 'Entregado', 'color' => '#10b981'], // Verde
                ['name' => 'Cancelado', 'color' => '#ef4444'], // Rojo
            ];

            foreach ($defaultStatuses as $status) {
                $company->customStatuses()->create($status);
            }
        });
    }
}
