@extends('layouts.default-layout.master')

@section('title')Layout Light
{{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush

@section('content')
   @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Layout Light</h3>
        @endslot
        <li class="breadcrumb-item">المتاجر </li>
        @slot('breadcrumb_icon')
            <li>
            <a href="{{route('stores.create')}}" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="plus"></i></a>
            </li>
        @endslot
    @endcomponent

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display datatables" id="ajax-data-object">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اسم المتجر</th>
                                     <th> حاله المتجر</th>
                                    <th>الاجراء</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Store Name</th>
                                      <th> status </th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @push('scripts')
        <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
        <script type="text/javascript">
            $('#ajax-data-object').DataTable({
                select: true,
                processing: true,
                serverSide: true,
                "ajax": "{{ route('stores.index') }}",
                "columns": [{data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'status', name: 'status', orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false},]
            });
            
            
            
            
            
             // start edit
            /* When click edit user */
            $('body').on('change', '.status', function() {
                var store_id = $(this).data('id');
                var status = $(this).val();
                // alert(active);
               
                $.ajax({
                    type: "POST",
                    url: '{{url('admin/status-store')}}'+'/' + store_id,
                    data: {id: store_id , status: status , "_token": "{{ csrf_token() }}"},
                }).done(function(data){
                     console.log(4654);

                    });
                });



            // end edit 
            
            
        </script>
    @endpush

@endsection