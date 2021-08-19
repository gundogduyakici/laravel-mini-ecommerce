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
                    <div class="card-title">Edit Product</div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin_product.update', $product->id) }}">
                        @csrf
                        {{ method_field('PUT') }}
                        <div id="example-form">
                            <h3>General Information</h3>
                            <section>
                                <h6 class="h-0 m-0">&nbsp;</h6>
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="field-wrapper">
                                            <input type="text" name="product_code" value="{{ $product->product_code }}" placeholder="Ürün Kodu..">
                                            <div class="field-placeholder">Product Code</div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                        <div class="field-wrapper">
                                            <input type="text" name="product_name" value="{{ $product->product_name }}" placeholder="Ürün Adını Giriniz..">
                                            <div class="field-placeholder">Product Name <span class="text-danger">*</span></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">                                        
                                        <div class="field-wrapper">
                                            <select name="categories_id" title="Kategori Seçiniz" data-live-search="true">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="field-placeholder">Product Category <span class="text-danger">*</span></div>
                                        </div>    
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                        <div class="field-wrapper">
                                            <input type="text" name="link" value="{{ $product->link }}" placeholder="Satın alınacağı link..">
                                            <div class="field-placeholder">Product Link <span class="text-danger">*</span></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">                                    
                                        <div class="field-wrapper">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="tr_price" value="{{ number_format($product->tr_price, 2) }}" placeholder="Türk Lirası Fiyat">
                                                <span class="input-group-text">₺</span>
                                            </div>
                                            <div class="field-placeholder">TR Price <span class="text-danger">*</span></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">                                    
                                        <div class="field-wrapper">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="usd_price" value="{{ number_format($product->usd_price, 2) }}" placeholder="Dolar Fiyat">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <div class="field-placeholder">USD Price</div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                        <div class="field-wrapper">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="euro_price" value="{{ number_format($product->euro_price, 2) }}" placeholder="Dolar Fiyat">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <div class="field-placeholder">EUR Price</div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                        <div class="field-wrapper">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="featured" value="{{ $product->featured }}" {{ $product->featured ? "checked" : "" }} >
                                                  <label class="form-check-label" for="flexCheckDefault">
                                                      Featured
                                                  </label>
                                              </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">                                        
                                        <div class="field-wrapper m-0">                                            
                                            <textarea class="summernote" name="description">{{ $product->description }}</textarea>
                                            <div class="field-placeholder">Product Description Açıklaması</div>
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
					height: 250,
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