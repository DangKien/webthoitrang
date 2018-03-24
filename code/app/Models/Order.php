<?php

namespace App\Models;

use App\Models\User;
use App\MyModel;

class Order extends MyModel
{
    const STATUS_PROCCESSING     = 0;
    const STATUS_COMPLETED       = 1;
    const STATUS_PENDING_PAYMENT = 2;
    const STATUS_CANCEL          = 3;
    
    protected $table             = "orders";

    protected $fillable = [
    	'user_id',
        'info_order',
        'total',
        'total_order',
        'status',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
