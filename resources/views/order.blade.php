@extends('layouts.layout_manage')
@section('nav')
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            <a class="navbar-brand" href="#">Order Detail</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="ti-settings"></i>
                        <p>Settings</p>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('reset_password') }}">Reset Password</a></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="content">
                        <form action="{{ route('order') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="orderNumber">Order Number**</label>
                                        <input type="text" name="order_no" class="form-control border-input" placeholder="Order Number" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="shopId">Shop Id</label>
                                        <input type="text" name="shop_id" class="form-control border-input" placeholder="Shop Id">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="customerEmail">Customer Email</label>
                                        <input type="text" name="order_email" class="form-control border-input" placeholder="Customer Email">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" style="margin-top: 27px" class="btn btn-info btn-fill btn-wd">Find Order</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @if ($data['order'])
                <div class="col-lg-6 col-md-7">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Order Detail</h4>
                        </div>
                        <div class="content">
                            <form>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label >Shop Name</label>
                                            <input type="text" class="form-control border-input" value="<?php echo $data['shop_info']->shop_name.' ('.$data['order']->shop_id.')' ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Order Id</label>
                                            <input type="text" class="form-control border-input" value="<?php echo $data['order']->order_id ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Order Number</label>
                                            <input type="text" class="form-control border-input" value="<?php echo $data['order']->order_no ?>" readonly>
                                        </div>
                                    </div>
                                    <?php
                                        switch ($data['order']->order_status_id){
                                            case 0: $status = 'Incomplete';
                                            break;
                                            case 1: $status = 'Paid';
                                            break;
                                            case 2: $status = 'Shipped';
                                            break;
                                            case 3: $status = 'Refunded';
                                            break;
                                            case 4: $status = 'Pending';
                                            break;
                                            case 5: $status = 'Paid';
                                            break;
                                            case 6: $status = 'Cancelled';
                                            break;
                                            case 7: $status = 'Completed';
                                            break;
                                            default:
                                                $status = 'Undefined';
                                        }
                                    ?>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Status</label>
                                            <input type="email" class="form-control border-input" value="<?php echo $status ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Customer Name</label>
                                            <input type="text" class="form-control border-input" value="<?php echo $data['order']->customer_name ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Customer Email</label>
                                            <input type="text" class="form-control border-input" value="<?php echo $data['order']->customer_email ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Customer Phone</label>
                                            <input type="text" class="form-control border-input" value="<?php echo $data['order']->customer_phone ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                @if ($data['order']->different_shipping)
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Shipping Name</label>
                                                <input type="text" class="form-control border-input" value="<?php echo $data['order']->shipping_name ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Shipping Email</label>
                                                <input type="text" class="form-control border-input" value="<?php echo $data['order']->shipping_email ?>" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Shipping Phone</label>
                                                <input type="text" class="form-control border-input" value="<?php echo $data['order']->shipping_phone ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Total Shipping ( <?php echo $data['order']->currency_code ?> )</label>
                                            <input type="text" class="form-control border-input" value="<?php echo $data['order']->total_shipping ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Total Price ( <?php echo $data['order']->currency_code ?> )</label>
                                            <input type="text" class="form-control border-input" value="<?php echo $data['order']->total_price ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-7">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Payment Detail</h4>
                        </div>
                        <div class="content">
                            <form>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Payment method</label>
                                            <input type="email" class="form-control border-input" value="<?php echo $data['order']->payment_method ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                @if ($data['payment_details'])
                                <div class="row">
                                    <div class="content table-responsive table-full-width">
                                        <table class="table table-striped">
                                            <thead>
                                            <th>Type</th>
                                            <th>Status</th>
                                            <th>Date Time</th>
                                            </thead>
                                            <tbody>
                                            @foreach($data['payment_details'] as $payment_detail)
                                            <tr>
                                                <td><?php echo $payment_detail->message_type ?></td>
                                                <td></td>
                                                <td><?php echo date('d-m-Y H:i', strtotime($payment_detail->created_at)) ?></td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection