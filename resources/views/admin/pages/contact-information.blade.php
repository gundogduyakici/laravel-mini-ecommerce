@extends('layouts.admin.app')

@push('css')
        <!-- Steps Wizard CSS -->
		<link rel="stylesheet" href="{{ asset('assets/admin/vendor/wizard/jquery.steps.css') }}" />

		<!-- Summernote CSS -->
		<link rel="stylesheet" href="{{ asset('assets/admin/vendor/summernote/summernote-bs4.css') }}" />

		<!-- Bootstrap Select CSS -->
		<link rel="stylesheet" href="{{ asset('assets/admin/vendor/bs-select/bs-select.css') }}" />

		<!-- Uploader CSS -->
		<link rel="stylesheet" href="{{ asset('assets/admin/vendor/dropzone/dropzone.min.css') }}" />

		<!-- Input Tags css -->
		<link rel="stylesheet" href="{{ asset('assets/admin/vendor/input-tags/tagsinput.css') }}" />
@endpush

@section('content')
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session()->has('message'))
                <div class="alert alert-{{ session()->get('status') }}">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Contact Information</div>
                </div>
                <div class="card-body">
                    <form id="steps-form" method="POST" action="{{ route('contact.update', $contact->id) }}">
                        @csrf
                        {{ method_field('PUT') }}
                        <div id="steps-div">
                            <h3>Contact Information</h3>
                            <section>
                                <h6 class="h-0 m-0">&nbsp;</h6>
                                <div class="row gutters">                                    
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="field-wrapper">
                                            <input type="email" name="email" value="{{ $contact->email }}" placeholder="E-Posta Giriniz..">
                                            <div class="field-placeholder">E-Posta <span class="text-danger">*</span></div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="field-wrapper">
                                            <input type="text" name="phone" value="{{ $contact->phone }}" placeholder="Telefon Giriniz..">
                                            <div class="field-placeholder">Telefon <span class="text-danger">*</span></div>
                                        </div>
                                    </div>
                                </div>
                            </section>                       
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->
@endsection

@push('js')
        <!-- Steps wizard JS -->
        <script src="{{ asset('assets/admin/vendor/wizard/jquery.steps.min.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/wizard/jquery.steps.custom.js') }}"></script>

        <!-- Summernote JS -->
        <script src="{{ asset('assets/admin/vendor/summernote/summernote-bs4.js') }}"></script>

        <!-- Bootstrap Select JS -->
        <script src="{{ asset('assets/admin/vendor/bs-select/bs-select.min.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/bs-select/bs-select-custom.js') }}"></script>

        <!-- Dropzone JS -->
        <script src="{{ asset('assets/admin/vendor/dropzone/dropzone.min.js') }}"></script>

        <!-- Input Tags JS -->
        <script src="{{ asset('assets/admin/vendor/input-tags/tagsinput.min.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/input-tags/typeahead.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/input-tags/tagsinput-custom.js') }}"></script>
@endpush