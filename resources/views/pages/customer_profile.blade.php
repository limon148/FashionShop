@extends('layout')
@section('content')

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-sm-12">

            <div class="card hovercard">
                <div class="cardheader">

                </div>
                <div class="avatar">
                    <img alt="" src="{{URL::to('frontend/images/usericon.png')}}">
                </div>
                <div class="info">
                    <?php $customer_id=Session::get('customer_id'); 
                        $customer_details=DB::table('tbl_customer')
                                        ->where('tbl_customer.customer_id',$customer_id)
                                        ->select('tbl_customer.customer_name','tbl_customer.customer_email','tbl_customer.mobile_number')
                                        ->first();
                    ?>

                    <div class="title">
                        <a>{{ $customer_details->customer_name }}</a>
                    </div>
                    <div class="desc">{{ $customer_details->customer_email }}</div>
                    <div class="desc">{{ $customer_details->mobile_number }}</div>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection