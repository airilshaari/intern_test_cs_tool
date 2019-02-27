<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Molpay extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'molpay';

    public function customerOrder()
    {
        return $this->belongsTo('App\Model\CustomerOrder', 'transaction_id', 'order_id');
    }
}
