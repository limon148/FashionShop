@extends('admin_layout')
@section('admin_content')

<div class="row-fluid sortable">
    <div class="box span6">
        <div class="box-header">
            <h2><i class="halfling-icon align-justify"></i><span class="break"></span>Customer Details</h2>
        </div>
        <div class="box-content">
            <table class="table">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Mobile</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($order_by_id as $v_customer)
                        @endforeach
                        <td> {{ $v_customer->customer_name}} </td>
                        <td> {{ $v_customer->mobile_number}} </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="box span6">
        <div class="box-header">
            <h2><i class="halfling-icon align-justify"></i><span class="break"></span>Shipping Details</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Address</th>
                        <th>Mobile Number</th>
                        <th>Shipping Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($order_by_id as $v_shipping)
                        @endforeach
                        <td>{{ $v_shipping->shipping_first_name.$v_shipping->shipping_last_name}}</td>
                        <td>{{ $v_shipping->shipping_address}}</td>
                        <td>{{ $v_shipping->shipping_mobile_number}}</td>
                        <td>{{ $v_shipping->shipping_email}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halfling-icon user"></i><span class="break"></span>Order Details</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Sales Quantity</th>
                        <th>Product Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order_by_id as $v_order)
                    <tr>
                        <td>{{ $v_order->order_id}}</td>
                        <td>{{ $v_order->product_name}}</td>
                        <td>{{ $v_order->product_price}}</td>
                        <td>{{ $v_order->product_sales_quantity }}</td>
                        <td>{{ $v_order->product_price*$v_order->product_sales_quantity }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        @foreach($order_by_id as $v_total)
                        @endforeach
                        <td colspan="4">Total with vat: </td>
                        <td><strong>={{ $v_total->order_total}} Tk</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>


@endsection