<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Gateway2C2P extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'gateway2c2p';

    public function customerOrder()
    {
        return $this->belongsTo('App\Model\CustomerOrder', 'transaction_id', 'order_id');
    }
}
