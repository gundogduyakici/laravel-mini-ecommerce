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
                                  <th>#</th>
                                  <th>Image</th>
                                  <th>Name</th>
                                  <th>Date of registration</th>
                                  <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr id="category_{{ $category->id }}">
                                        <td>{{ $category->id }}</td>
                                        <td width="10%">
                                            <div class="media-box">
                                                <img style="width: 300px; height: 60px;" src="{{ Storage::url($category->file) }}" class="media-avatar" alt="Product">
                                            </div>
                                        </td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->created_at->format('d.m.Y'); }}</td>
                                        <td>
                                            <div class="actions">
                                                <a href="{{ route('category.edit', $category->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                    <i class="icon-edit1 text-info"></i>
                                                </a>
                                                <a href="javascript:;" onclick="deleteCategory({{ $category->id }})" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
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
            function deleteCategory(id) {                
                if (confirm('Do you really want to delete this category?')) {
                    $.ajax({
                        type: 'DELETE',
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        url: '/admin/category/delete/' + id,
                        success: function(res) {
                            $('#category_'+id).hide();                            
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