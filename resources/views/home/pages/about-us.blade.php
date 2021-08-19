@extends('layouts.home.app')

@section('title', 'About Us')

@section('content')
    <main id="mt-main">
        <!-- Mt Content Banner of the Page -->
        <section class="mt-contact-banner wow fadeInUp" data-wow-delay="0.4s" style="background-image: url({{ asset('assets/home/images/img43.jpg') }});">
            <div class="container">
                <div class="row">
                <div class="col-xs-12 text-center">
                    <h1>HAKKIMIZDA</h1>
                    <nav class="breadcrumbs">
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/') }}">Ana Sayfa <i class="fa fa-angle-right"></i></a></li>
                        <li>Hakkımızda</li>
                    </ul>
                    </nav>
                </div>
                </div>
            </div>
        </section>
        <!-- Mt Content Banner of the Page end -->

        <!-- Mt About Section of the Page -->
        <section class="mt-about-sec">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="txt wow fadeInUp" data-wow-delay="0.4s">
                            {!! $about->text !!}
                        </div>                        
                    </div>
                </div>
            </div>
        </section>
    </main><!-- Main of the Page end -->
@endsection