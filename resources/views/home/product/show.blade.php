@extends('layouts.home.app')

@section('title', $product->product_name)

@section('content')
    <main id="mt-main">
        <!-- Mt Product Detial of the Page -->
        <section class="mt-product-detial wow fadeInUp" data-wow-delay="0.4s">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Slider of the Page -->
                        <div class="slider">
                            <!-- Product Slider of the Page -->
                            <div class="product-slider">
                                @foreach ($product->images as $image)
                                    <div class="slide">
                                        <img src="{{ Storage::url($image->file) }}" alt="{{ $product->product_name }}">
                                    </div>
                                @endforeach                                    
                            </div>
                            <!-- Product Slider of the Page end -->
                            <!-- Pagg Slider of the Page -->
                            <ul class="list-unstyled slick-slider pagg-slider">                                
                                @foreach ($product->images as $image)                                    
                                    <li>
                                        <div class="img">
                                            <img style="width: 105px; height: 105px" src="{{ Storage::url($image->file) }}" alt="{{ $product->product_name }}">
                                        </div>
                                    </li>
                                @endforeach                                                                
                            </ul>
                            <!-- Pagg Slider of the Page end -->
                        </div>
                        <!-- Slider of the Page end -->
                        <!-- Detail Holder of the Page -->
                        <div class="detial-holder">
                            <!-- Breadcrumbs of the Page -->
                            <ul class="list-unstyled breadcrumbs">
                                <li>Kategori <i class="fa fa-angle-right"></i></li>
                                <li><a href="{{ url('category/'.$product->categories->slug.'/'.$product->categories->id) }}">{{ $product->categories->name }}</a></li>
                            </ul>
                            <!-- Breadcrumbs of the Page end -->                            
                            <h2>{{ $product->product_name }}</h2>
                            @if (!is_null($product->product_code) && !empty($product->product_code))
                                <h4 style="margin-bottom: 25px;">Ürün Kodu: {{ $product->product_code }}</h4>
                            @endif
                            <div class="text-holder">
                                <span class="price">{{ number_format($product->tr_price, 2) }} ₺</span>
                            </div>
                            <!-- Product Form of the Page -->
                            <div class="product-form" style="margin-bottom: 40px">
                                <div class="row-val">
                                    <a href="{{ $product->link }}" target="_blank">SİPARİŞ VER</a>
                                </div>                                
                            </div>
                            <!-- Rank Rating of the Page end -->
                            <div class="txt-wrap">
                                {!! $product->description !!}
                            </div>
                            <!-- Product Form of the Page end -->
                        </div>
                        <!-- Detail Holder of the Page end -->
                    </div>
                </div>
            </div>
        </section><!-- Mt Product Detial of the Page end -->
        <div class="product-detail-tab wow fadeInUp" data-wow-delay="0.4s">
            <div class="container">
                <div class="row">
                    
                </div>
            </div>
        </div>

        @if(count($relatedProducts))
            <!-- related products start here -->
            <div class="related-products wow fadeInUp" data-wow-delay="0.4s">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                        <h2>İLGİNİZİ ÇEKEBİLECEK ÜRÜNLER</h2>
                            <div class="row">
                                <div class="col-xs-12">
                                    @foreach ($relatedProducts as $related)
                                        <!-- mt product1 center start here -->
                                        <div class="mt-product1 mt-paddingbottom20">
                                            <div class="box">
                                                <div class="b1">
                                                    <div class="b2">
                                                        <a href="{{ url('product/'.$related->slug.'/'.$related->id) }}"><img src="{{ Storage::url($related->coverImage->file) }}" alt="{{ $related->product_name }}"></a>
                                                        <ul class="links">
                                                            <li><a href="{{ url('product/'.$related->slug.'/'.$related->id) }}"><i class="icon-handbag"></i><span>Ürünü İncele</span></a></li>                                                        
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="txt">
                                                <strong class="title"><a href="{{ url('product/'.$related->slug.'/'.$related->id) }}">{{ $related->product_name }}</a></strong>
                                                <span class="price"><i class="fa fa-try"></i> <span>{{ number_format($related->tr_price, 2) }}</span></span>
                                            </div>
                                        </div><!-- mt product1 center end here -->    
                                    @endforeach                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- related products end here -->
            </div>
        @endif
    </main><!-- mt main end here -->
@endsection