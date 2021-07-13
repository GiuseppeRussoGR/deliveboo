<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'visibility', 'img_path', 'user_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }
}
