<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    protected $fillable = ['order_id', 'order_status_id', 'notes', 'proof_photo'];

    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id');
    }
}
