<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DishOrder extends Model
{
    protected $table = 'dish_order';
    protected $fillable = ['dish_id', 'order_id', 'quantita'];
}
