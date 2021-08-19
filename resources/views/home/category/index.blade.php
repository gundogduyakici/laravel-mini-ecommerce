@extends('layouts.home.app')

@section('title', $category->name)

@push('css')
    <style>
        svg.w-5.h-5 {
            width: 17px;
        }

        a.relative.inline-flex.items-center.px-4.py-2.-ml-px.text-sm.font-medium.text-gray-700.bg-white.border.border-gray-300.leading-5.hover\:text-gray-500.focus\:z-10.focus\:outline-none.focus\:ring.ring-gray-300.focus\:border-blue-300.active\:bg-gray-100.active\:text-gray-700.transition.ease-in-out.duration-150 {
            color: red;
            position: relative;
            padding-left: 5px;
            padding-right: 5px;
            border: 1px solid #000;
            border-radius: 50%;
            top: -3px;
            display: inline-block;
        }

        a.relative.inline-flex.items-center.px-4.py-2.-ml-px.text-sm.font-medium.text-gray-700.bg-white.border.border-gray-300.leading-5.hover\:text-gray-500.focus\:z-10.focus\:outline-none.focus\:ring.ring-gray-300.focus\:border-blue-300.active\:bg-gray-100.active\:text-gray-700.transition.ease-in-out.duration-150:hover {
            color: white;
            background: green;
        }

        span.relative.inline-flex.items-center.px-4.py-2.-ml-px.text-sm.font-medium.text-gray-500.bg-white.border.border-gray-300.cursor-default.leading-5 {
            position: relative;
            display: inline-block;
            padding-bottom: 7px;
            padding-top: 14px;
            top: -3px;
        }
    </style>
@endpush

@section('content')
    <main id="mt-main">
        @php
            if($category->file) {
                $banner = Storage::url($category->file);
            }else {
                $banner = asset('assets/home/images/img11.jpg');
            }
        @endphp
        <!-- Mt Contact Banner of the Page -->
        <section class="mt-contact-banner style4" style="background-image: url({{ $banner }});">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h1>{{ $category->name }}</h1>
                        <!-- Breadcrumbs of the Page -->
                        <nav class="breadcrumbs">
                            <ul class="list-unstyled">
                                <li><a href="{{ route('home') }}">Home <i class="fa fa-angle-right"></i></a></li>
                                <li>Products <i class="fa fa-angle-right"></i></a></li>
                                <li>{{ $category->name }}</li>
                            </ul>
                        </nav><!-- Breadcrumbs of the Page end -->
                    </div>
                </div>
            </div>
        </section><!-- Mt Contact Banner of the Page end -->
        <div class="container">
            <div class="row" style="margin-top: 40px;">
                <!-- sidebar of the Page start here -->
                <aside id="sidebar" class="col-xs-12 col-sm-4 col-md-3 wow fadeInLeft" data-wow-delay="0.4s">
                    <!-- shop-widget of the Page start here -->
                    <section class="shop-widget">
                        <h2>CATEGORIES</h2>
                        <!-- category list start here -->
                        <ul class="list-unstyled category-list">
                            @foreach ($categories as $category)                            
                                <li>
                                    <a href="{{ url('category/'.$category->slug.'/'.$category->id) }}">
                                        <span class="name">{{ $category->name }}</span>
                                        <span class="num">{{ $category->products->count() }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul><!-- category list end here -->
                    </section><!-- shop-widget of the Page end here -->
                    <!-- shop-widget of the Page start here -->                
                </aside><!-- sidebar of the Page end here -->
                
                <div class="col-xs-12 col-sm-8 col-md-9 wow fadeInRight" data-wow-delay="0.4s">                              
                    <!-- mt productlisthold start here -->
                    @if(count($products))                    
                        <ul class="mt-productlisthold list-inline">
                            @foreach ($products as $product)
                                <li>
                                    <!-- mt product1 large start here -->
                                    <div class="mt-product1 large">
                                        <div class="box">
                                            <div class="b1">
                                                <div class="b2">
                                                    <a href="{{ url('product/'.$product->slug.'/'.$product->id) }}"><img style="width: 270px; height: 289px;" src="{{ Storage::url($product->coverImage->file) }}" alt="image description"></a>                                            
                                                    <ul class="links">
                                                        <li><a href="{{ url('product/'.$product->slug.'/'.$product->id) }}"><i class="icon-handbag"></i><span>Ürünü İncele</span></a></li>                                                
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="txt">
                                            <strong class="title"><a href="{{ url('product/'.$product->slug.'/'.$product->id) }}">{{ $product->product_name }}</a></strong>
                                            <span class="price"><i class="fa fa-try"></i> <span>{{ number_format($product->tr_price, 2) }}</span></span>
                                        </div>
                                    </div><!-- mt product1 center end here -->
                                </li>
                            @endforeach
                        </ul><!-- mt productlisthold end here -->    

                        <!-- mt pagination start here -->
                        {{ $products->links() }}
                        <!-- mt pagination end here -->
                    @else                        
                        <div class="alert alert-info" role="alert" style="margin-bottom: 70px;">There are no products in this category yet.</div>
                    @endif               
                </div>
            </div>
        </div>
    </main><!-- mt main end here -->
@endsection