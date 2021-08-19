@extends('layouts.home.app')

@section('title', 'Yaşamı Kolaylaştırır')

@section('content')
    <div class="mt-main-slider">
        <!-- slider banner-slider start here -->
        <div class="slider banner-slider">
            <!-- holder start here -->
            <div class="holder text-center" style="background-image: url({{ asset('assets/home/images/sliders/valvera.png') }});">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="text centerize">
                                <strong class="title">&nbsp;</strong>
                                <h1>&nbsp;</h1>
                                <h2>&nbsp;</h2>
                                <div class="txt">
                                    <p>&nbsp;</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- holder end here -->
        </div>
        <!-- slider regular end here -->
    </div><!-- mt main slider end here -->

    <main id="mt-main">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <!-- banner frame start here -->
                    <div class="banner-frame">
                        <!-- banner-1 start here -->
                        <div class="banner-1 wow fadeInLeft" data-wow-delay="0.4s" id="home_wall">
                            <img alt="image description" src="{{ asset('assets/home/images/banner/img01.jpg') }}">
                            <div class="holder">
                                <h2>VALVERA DESIGN</h2> <h1 style="font-size: 50px;">WALL</h1>
                                <div class="txts">
                                    <a class="btn-shop" style="margin-top: 15px;" href="{{ url('/category/wall/2') }}">
                                        <span>SATIN AL</span>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- banner-1 end here -->

                        <!-- banner-box first start here -->
                        <div class="banner-box first">
                            <!-- banner-3 start here -->
                            <div class="banner-2 right wow fadeInDown" data-wow-delay="0.4s" id="home_wood">
                                <img alt="image description" src="{{ asset('assets/home/images/banner/img03.jpg') }}">
                                <div class="holder">
                                    <h2>VALVERA DESIGN</h2> <h1 style="font-size: 39px;">WOOD</h1>
                                    <div class="txts">
                                        <a class="btn-shop" style="margin-top: 15px;" href="{{ url('/category/wood/3') }}">
                                            <span>SATIN AL</span>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="banner-3 wow fadeInUp" data-wow-delay="0.4s" id="home_tools">
                                <img alt="image description" src="{{ asset('assets/home/images/banner/img02.jpg') }}">
                                <div class="holder">
                                    <h2 style="margin-top: -3px;">VALVERA DESIGN</h2> <h1 style="font-size: 38px; top: 25px;">TOOLS</h1>
                                    <div class="txts">
                                        <a class="btn-shop" style="margin-top: 5px;" href="{{ url('/category/tools/4') }}">
                                            <span>SATIN AL</span>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- banner-box first end here -->

                        <!-- banner-4 start here -->
                        <div class="banner-4 hidden-sm wow fadeInRight" data-wow-delay="0.4s" id="home_home">
                            <img alt="image description" src="{{ asset('assets/home/images/banner/img04.jpg') }}">
                            <div class="holder">
                                <h2>VALVERA DESIGN</h2> <h1 style="font-size: 43px;">HOME</h1> 
                                <span class="price"></span>
                                <a class="btn-shop add" href="{{ url('/category/home/1') }}">
                                    <span>SATIN AL</span>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- banner-4 end here -->
                    </div>
                    <!-- banner frame end here -->
                    
                    <!-- mt producttabs start here -->
                    <div class="mt-producttabs wow fadeInUp" data-wow-delay="0.4s">
                        @if(count($featuredProducts))
                            <!-- producttabs start here -->
                            <ul class="producttabs">
                                <li><a href="#tab1" class="active"><u>ÖNE ÇIKANLAR</u></a></li>
                            </ul>
                            <!-- producttabs end here -->
                            <div class="row">                            
                                @foreach ($featuredProducts as $item)                            
                                    <div class="col-md-3">
                                        <div class="mt-product1 mt-paddingbottom20">
                                            <div class="box">
                                                <div class="b1">
                                                    <div class="b2">
                                                        <a href="{{ url('product/'.$item->slug.'/'.$item->id) }}"><img src="{{ Storage::url($item->coverImage->file) }}" alt="{{ $item->product_name }}"></a>
                                                        <ul class="links">
                                                            <li><a href="{{ url('product/'.$item->slug.'/'.$item->id) }}"><i class="icon-handbag"></i><span>Ürünü İncele</span></a></li>                                                    
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="txt">
                                                <strong class="title"><a href="{{ url('product/'.$item->slug.'/'.$item->id) }}">{{ $item->product_name }}</a></strong>
                                                <span class="price"><i class="fa fa-try"></i> <span>{{ number_format($item->tr_price, 2) }}</span></span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <!-- mt producttabs end here -->                    
                </div>
            </div>
        </div>
    </main><!-- mt main end here -->
@endsection

@push('js')
    <script>
        $('#home_wall').on('click', function() {
            window.location = "{{ url('/category/wall/2') }}";
        })

        $('#home_wood').on('click', function() {
            window.location = "{{ url('/category/wood/3') }}";
        })

        $('#home_home').on('click', function() {
            window.location = "{{ url('/category/home/1') }}";
        })

        $('#home_tools').on('click', function() {
            window.location = "{{ url('/category/tools/4') }}";
        })
    </script>
@endpush