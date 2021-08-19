@extends('layouts.admin.app')

@section('content')
<!-- Row start -->
<div class="row gutters">
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
        <div class="stats-tile">
            <div class="sale-icon">
                <i class="icon-shopping-bag1"></i>
            </div>
            <div class="sale-details">
                <h2>{{ $productCount->count() }}</h2>
                <p>Product</p>
            </div>
            <div class="sale-graph">
                <div id="sparklineLine1"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
        <div class="stats-tile">
            <div class="sale-icon">
                <i class="icon-menu"></i>
            </div>
            <div class="sale-details">
                <h2>{{ $categoryCount->count() }}</h2>
                <p>Category</p>
            </div>
            <div class="sale-graph">
                <div id="sparklineLine2"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <div class="stats-tile">
            <div class="sale-icon">
                <i class="icon-mail"></i>
            </div>
            <div class="sale-details">
                <h2>{{ $data['inbox_count']->count() }}</h2>
                <p>Message</p>
            </div>
            <div class="sale-graph">
                <div id="sparklineLine3"></div>
            </div>
        </div>
    </div>
</div>
<!-- Row end -->
@endsection