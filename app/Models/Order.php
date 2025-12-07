<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_name',
        'email',
        'phone',
        'address',
        'address2',
        'country',
        'state',
        'city',
        'postcode',
        'shipping_cost',
        'subtotal',
        'total',
        'payment_method',
        'payment_details',
        'payment_status',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getStatusBadgeColorAttribute()
    {
        return match($this->status) {
            'processing' => 'info',
            'shipped' => 'primary',
            'delivered' => 'success',
            'cancelled' => 'danger',
            default => 'secondary'
        };
    }

    public function getPaymentStatusBadgeColorAttribute()
    {
        return match($this->payment_status) {
            'pending' => 'warning',
            'completed' => 'success',
            'failed' => 'danger',
            default => 'secondary'
        };
    }
}
