<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'customer_order';

    public function shopInfo()
    {
        return $this->hasOne('App\Model\ShopInfo', 'shop_id', 'shop_id');
    }

    public function fpx()
    {
        return $this->hasMany('App\Model\Fpx', 'transaction_id', 'order_id');
    }

    public function gateway2c2p()
    {
        return $this->hasMany('App\Model\Gateway2C2P', 'transaction_id', 'order_id');
    }

    public function molpay()
    {
        return $this->hasMany('App\Model\Molpay', 'transaction_id', 'order_id');
    }

    public function findOrder($order_no, $shop_id, $order_email)
    {
        $query = CustomerOrder::query();
        $query = $query->where('order_no', $order_no);

        if ($shop_id)
            $query = $query->where('shop_id', $shop_id);

        if (trim($order_email))
            $query = $query->where('customer_email', trim($order_email));

        return $query->first();
    }

    public function dailyTransaction()
    {
        $query = CustomerOrder::query();
        $query = $query->whereDate('date_purchased', NOW());
        return $query->count();
    }
}


