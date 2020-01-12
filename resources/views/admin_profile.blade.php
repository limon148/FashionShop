@extends('admin_layout')
@section('admin_content')

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-sm-12">

            <div class="card hovercard">
                <div class="cardheader">

                </div>
                <div class="avatar">
                    <img alt="" src="{{URL::to('backend/img/limon.jpg')}}">
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" href="#">Mehedi Hasan</a>
                    </div>
                    <div class="desc">Curious developer</div>
                    <div class="desc">CSE RU</div>
                </div>
                <div class="bottom">
                    <a class="btn btn-primary btn-twitter btn-sm" href="https://twitter.com/MehediH95731185">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" rel="publisher" href="https://www.linkedin.com/in/mehedi-hasan-58ba4b14b/">
                        <i class="fa fa-linkedin"></i>
                    </a>
                    <a class="btn btn-primary btn-sm" rel="publisher" href="https://www.facebook.com/mehedihasan.limon.948">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <!-- <a class="btn btn-warning btn-sm" rel="publisher" href="https://plus.google.com/shahnuralam">
                        <i class="fa fa-behance"></i>
                    </a> -->
                </div>
            </div>

        </div>

    </div>
</div>

@endsection