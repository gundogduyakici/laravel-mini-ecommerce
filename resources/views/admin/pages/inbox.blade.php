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
                                  <th>İsim</th>
                                  <th>E-Posta</th>                                  
                                  <th>Telefon</th>
                                  <th>Mesaj</th>
                                  <th>Tarih</th>
                                  <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inbox as $item)
                                    <tr>                                        
                                        <td width="5%">{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td width="40%">{{ $item->message }}</td>
                                        <td>{{ $item->created_at->format('d.m.Y'); }}</td>
                                        <td>
                                            <div class="actions">
                                                <a href="javascript:;" onclick="deleteMessage({{ $item->id }})" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
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
            function deleteMessage() {
                alert("Bu çalışmıyor sonra yapsak olur mu ?");
            }
        </script>
@endpush