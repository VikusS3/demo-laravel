<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;

    // Campos que se pueden llenar masivamente
    protected $fillable = [
        'name',
        'color',
        'company_id'
    ];

    // Relación: Un estado pertenece a una compañía
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // Relación: Un estado puede estar en muchos pedidos (como estado actual)
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Opcional: Un estado puede aparecer en muchos historiales
    public function histories()
    {
        return $this->hasMany(OrderHistory::class);
    }
}
