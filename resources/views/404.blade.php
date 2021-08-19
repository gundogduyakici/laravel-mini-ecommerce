@extends('layouts.home.app')

@section('title', 'Sayfa Bulunamadı')

@section('content')
    <main id="mt-main">
        <!-- Mt Content Banner of the Page -->
        <section class="mt-contact-banner" style="background-image: url({{ asset('assets/home/images/img43.jpg') }});">
        <div class="container">
            <div class="row">
            <div class="col-xs-12 text-center">
                <h1>Sayfa Bulunamadı</h1>
                <nav class="breadcrumbs">
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}">Ana Sayfa <i class="fa fa-angle-right"></i></a></li>
                    <li>404</li>
                </ul>
                </nav>
            </div>
            </div>
        </div>
        </section>
        <!-- Mt Content Banner of the Page end -->
        <!-- Mt Error Sec of the Page -->
        <section class="mt-error-sec dark">
        <div class="container">
            <div class="row">
            <div class="col-xs-12 text-center">
                <span class="error-code montserrat">404</span>
                <h1 class="text-uppercase montserrat">Maalesef, böyle bir sayfa gerçekten yok.</h1>
                <a href="{{ route('home') }}" class="btn-back btn-transparent"><i class="fa fa-home"></i> ANA SAYFA</a>
            </div>
            </div>
        </div>
        </section>
        <!-- Mt Error Sec of the Page end -->
    </main><!-- Main of the Page end here -->
@endsection