@extends('layouts.home.app')

@section('title', 'Contact')

@section('content')
<main id="mt-main">
    <!-- Mt Contact Banner of the Page -->
    <section class="mt-contact-banner wow fadeInUp" data-wow-delay="0.4s" style="background-image: url({{ asset('assets/home/images/img06.jpg') }});">
       <div class="container">
          <div class="row">
             <div class="col-xs-12 text-center">
                <h1>CONTACT</h1>
                <nav class="breadcrumbs">
                   <ul class="list-unstyled">
                      <li><a href="{{ route('home') }}">Home <i class="fa fa-angle-right"></i></a></li>
                      <li>Contact</li>
                   </ul>
                </nav>
             </div>
          </div>
       </div>
    </section>
    <!-- Mt Contact Banner of the Page -->
    <!-- Mt Contact Detail of the Page -->
    <section class="mt-contact-detail content-info wow fadeInUp" data-wow-delay="0.4s">
       <div class="container-fluid">
          <div class="row">
             <div class="col-xs-12 col-sm-8">
                <div class="txt-wrap">
                   <h2>Contact Us</h2>
                   <p>You can contact us via information or communication for information that will come to your mind.</p>
                </div>
                <ul class="list-unstyled contact-txt">
                   <li>
                      <strong>Phone</strong>
                      <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
                   </li>
                   <li>
                      <strong>E-Mail</strong>
                      <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                   </li>
                </ul>
             </div>
             <div class="col-xs-12 col-sm-4">
               <h2>Have questions?</h2>
               @if ($errors->any())
                  <div class="alert alert-danger" role="alert">
                     <ul>
                        @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                        @endforeach
                     </ul>
                  </div>
               @endif

               @if(session()->has('message'))
                  <div class="alert alert-{{ session()->get('status') }}" role="alert">
                     {{ session()->get('message') }}
                  </div>
               @endif
                <!-- Contact Form of the Page -->
                <form action="{{ route('sendMessage') }}" method="POST" class="contact-form">
                   @csrf
                   <fieldset>
                      <input type="text" class="form-control" name="name" placeholder="Name" required>
                      <input type="email" class="form-control" name="email" placeholder="E-Mail" required>
                      <input type="text" class="form-control" name="phone" placeholder="Phone">
                      <textarea class="form-control" placeholder="Your Message" name="message" required></textarea>
                      <button class="btn-type3" type="submit">Send</button>
                   </fieldset>
                </form>
                <!-- Contact Form of the Page end -->
             </div>
          </div>
       </div>
    </section>
    <!-- Mt Contact Detail of the Page end -->
 </main>
 <!-- footer of the Page -->
@endsection