<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'total_price', 'payment_status', 'client_name', 'client_address', 'client_number', 'client_code', 'client_email'
    ];
    public function dishes()
    {
        return $this->belongsToMany('App\Dish')->withPivot('quantita');
    }
}
