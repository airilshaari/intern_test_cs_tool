<?php

namespace App\Http\Controllers;

use App\Model\CustomerOrder;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
    public function index()
    {
        $orderTransaction = (new CustomerOrder())->dailyTransaction();

        return view('dashboard')->with('orderTransaction', $orderTransaction);
    }
}
