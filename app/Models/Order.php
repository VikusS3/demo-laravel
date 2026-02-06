<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    protected $guarded = []; // O usa $fillable con todos los campos

    // EVENTO: Generar tracking code automáticamente al crear
    protected static function booted()
    {
        static::creating(function ($order) {
            // Genera un código único de 12 caracteres en mayúsculas
            $order->tracking_code = 'TRK-' . strtoupper(Str::random(12));
        });

        // EVENTO: Al crear un pedido, crear automáticamente su primer historial
        static::created(function ($order) {
            $order->history()->create([
                'order_status_id' => $order->order_status_id,
                'notes' => 'Pedido creado en el sistema',
            ]);
        });
    }

    // Relaciones
    public function currentStatus()
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id');
    }

    public function history()
    {
        return $this->hasMany(OrderHistory::class)->orderBy('created_at', 'desc');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // App/Models/Order.php

    public function latestHistory()
    {
        // Esto trae automágicamente EL ÚLTIMO registro de la tabla order_histories
        return $this->hasOne(OrderHistory::class)->latestOfMany();
    }
}
