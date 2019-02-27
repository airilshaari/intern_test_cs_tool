<?php

namespace App\Http\Controllers;

use App\Model\CustomerOrder;
use function App\Model\findOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $order_no = $request->input('order_no', '');
        $shop_id = $request->input('shop_id', '');
        $order_email = $request->input('order_email', '');

        $data = array();

        $data['order'] = (new CustomerOrder())->findOrder($order_no, $shop_id, $order_email);

        if ($data['order']) {
            $data['shop_info'] = $data['order']->shopInfo()->first();

            $data['payment_details'] = NULL;
        }

        return view('order')->with('data', $data);

    }
}