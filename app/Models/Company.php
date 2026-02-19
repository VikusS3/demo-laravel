<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\OrderStatus;

class Company extends Model
{
    use HasFactory;

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
            $defaultStatuses = [
                ['name' => 'Pendiente', 'color' => '#fbbf24'],
                ['name' => 'Procesando', 'color' => '#3b82f6'],
                ['name' => 'En Ruta', 'color' => '#8b5cf6'],
                ['name' => 'Entregado', 'color' => '#10b981'],
                ['name' => 'Cancelado', 'color' => '#ef4444'],
            ];

            foreach ($defaultStatuses as $status) {
                $company->customStatuses()->create($status);
            }
        });
    }

    // Relación: los estados personalizados que pertenecen a la empresa
    public function customStatuses()
    {
        return $this->hasMany(OrderStatus::class, 'company_id');
    }
}
