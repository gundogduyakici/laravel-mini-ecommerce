@extends('layouts.admin.app')

@push('css')
        <!-- Data Tables -->
		<link rel="stylesheet" href="{{ asset('assets/admin/vendor/datatables/dataTables.bs4.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/admin/vendor/datatables/dataTables.bs4-custom.css') }}" />
		<link rel="stylesheet" href="{{ asset('assets/admin/vendor/datatables/buttons.bs.css') }}" />
@endpush

@section('content')
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">            
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="copy-print-csv" class="table v-middle">
                            <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Code</th>
                                  <th>Category Name</th>
                                  <th>Price <img style="margin-left: 5px;" width="20" src="{{ asset('assets/admin/img/tr_flag.png') }}" class="img-responsive" /></th>                                  
                                  <th>Featured</th>
                                  <th>Date of registration</th>
                                  <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr id="product_{{ $product->id }}">
                                        <td>
                                            <div class="media-box">
                                                <img src="{{ Storage::url($product->coverImage->file) }}" class="media-avatar" alt="Product">
                                                <div class="media-box-body">
                                                    <a href="{{ route('admin_product.edit', $product->id) }}" class="text-truncate">{{ $product->product_name }}</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{!! $product->product_code ? "<span class='badge bg-info'>".$product->product_code."</span>" : '<span class="badge bg-info">Yok</span>' !!}</td>
                                        <td>{{ $product->categories->name }}</td>
                                        <td>{{ number_format($product->tr_price, 2) }} ₺</td>
                                        <td>
                                            @if($product->featured)
                                                <span class="badge bg-success">Yes</span>
                                            @else
                                                <span class="badge bg-warning">No</span>
                                            @endif
                                        </td>
                                        <td>{{ $product->created_at->format('d.m.Y'); }}</td>
                                        <td>
                                            <div class="actions">
                                                <a href="{{ route('admin_product.edit', $product->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                    <i class="icon-edit1 text-info"></i>
                                                </a>
                                                <a href="javascript:;" onclick="deleteProduct({{ $product->id }})" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                    <i class="icon-x-circle text-danger"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->
@endsection

@push('js')
        <!-- Data Tables -->
        <script src="{{ asset('assets/admin/vendor/datatables/dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap.min.js') }}"></script>
        
        <!-- Custom Data tables -->
        <script src="{{ asset('assets/admin/vendor/datatables/custom/custom-datatables.js') }}"></script>

        <!-- Download / CSV / Copy / Print -->
        <script src="{{ asset('assets/admin/vendor/datatables/buttons.min.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/datatables/jszip.min.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/datatables/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/datatables/vfs_fonts.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/datatables/html5.min.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/datatables/buttons.print.min.js') }}"></script>

        <script>
            function deleteProduct(id) {                
                if (confirm('Do you really want to delete this product?')) {
                    $.ajax({
                        type: 'DELETE',
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        url: '/admin/admin_product/delete/' + id,
                        success: function(res) {
                            console.log(res);
                            $('#product_'+id).hide();                            
                            alert(res.message);
                        },
                        error: function(err) {
                            console.log(err)
                        }
                    })
                } else {
                    alert('You did your best, the deletion was cancelled.');
                }
            }
        </script>
@endpush