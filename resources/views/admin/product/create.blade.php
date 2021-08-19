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
                    <div class="card-title">Yeni Ürün Oluştur</div>
                </div>
                <div class="card-body">
                    <form id="steps-form" method="POST" action="{{ route('admin_product.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div id="steps-div">
                            <h3>General Information</h3>
                            <section>
                                <h6 class="h-0 m-0">&nbsp;</h6>
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="field-wrapper">
                                            <input type="text" name="product_code" placeholder="Ürün Kodu..">
                                            <div class="field-placeholder">Product Code</div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                        <div class="field-wrapper">
                                            <input type="text" name="product_name" placeholder="Enter Product Name..">
                                            <div class="field-placeholder">Product Name <span class="text-danger">*</span></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">                                        
                                        <div class="field-wrapper">
                                            <select name="categories_id" class="js-states" title="Select Category" data-live-search="true">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="field-placeholder">Product Category <span class="text-danger">*</span></div>
                                        </div>    
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                        <div class="field-wrapper">
                                            <input type="text" name="link" placeholder="Satın alınacağı link..">
                                            <div class="field-placeholder">Product Link <span class="text-danger">*</span></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">                                    
                                        <div class="field-wrapper">
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="tr_price" placeholder="Turkish Price">
                                                <span class="input-group-text">₺</span>
                                            </div>
                                            <div class="field-placeholder">TR Price <span class="text-danger">*</span></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">                                    
                                        <div class="field-wrapper">
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="usd_price" placeholder="Dollar Price">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <div class="field-placeholder">USD Price</div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                        <div class="field-wrapper">
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="euro_price" placeholder="Euro Price">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <div class="field-placeholder">EUR Price</div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                        <div class="field-wrapper">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="featured" value="0">
                                                  <label class="form-check-label" for="flexCheckDefault">
                                                      Öne Çıkan
                                                  </label>
                                              </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">                                        
                                        <div class="field-wrapper m-0">                                            
                                            <textarea class="summernote" name="description"></textarea>
                                            <div class="field-placeholder">Description</div>
                                        </div>    
                                    </div>
                                </div>
                            </section>
    
                            <h3>Product Photos</h3>
                            <section>
                                <h6 class="h-0 m-0">&nbsp;</h6>
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">                                        
                                        <div class="field-wrapper">
                                            <input id="cover" type="file" name="cover_image" required />
                                            <div class="field-placeholder">Featured Image (610x490) <span class="text-danger">*</span></div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="field-wrapper">
                                            <input id="imacoverges" type="file" name="images[]" multiple required />
                                            <div class="field-placeholder">Product Images (610x490)</div>
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

        <script>

			// Summernote
			$(document).ready(function() {
				$('.summernote').summernote({
					height: 270,
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