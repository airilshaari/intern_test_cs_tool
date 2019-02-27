<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShopInfo extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'shop_info';

    public function customerOrder()
    {
        return $this->belongsTo('App\Model\CustomerOrder', 'shop_id', 'shop_id');
    }
}
