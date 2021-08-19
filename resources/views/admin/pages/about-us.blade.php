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
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
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
                    <div class="card-title">Edit About Us</div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('about.update', $about->id) }}">
                        @csrf
                        {{ method_field('PUT') }}
                        <div id="example-form">
                            <h3>General Information</h3>
                            <section>
                                <h6 class="h-0 m-0">&nbsp;</h6>
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">                                        
                                        <div class="field-wrapper m-0">                                            
                                            <textarea class="summernote" name="text">{{ $about->text }}</textarea>
                                            <div class="field-placeholder">About Text</div>
                                        </div>    
                                    </div>

                                    <button type="submit" class="btn btn-success">Update</button>
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

        <script>

			// Summernote
			$(document).ready(function() {
				$('.summernote').summernote({
					height: 350,
					tabsize: 2,
					focus: true,
					toolbar: [
                        ['font', ['bold', 'underline', 'clear']],
                        ['para', ['ul', 'ol']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']],
                    ]
				});
			});

		</script>
@endpush