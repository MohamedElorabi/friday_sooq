@extends('layouts.default-layout.master')

@section('title')الاعلانات
{{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>الاعلانات</h3>
        @endslot
        <li class="breadcrumb-item active">الاعلانات</li>
        @slot('breadcrumb_icon')
            <li>
            <a href="{{route('ads.create')}}" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="plus"></i></a>
            </li>
        @endslot
    @endcomponent
    
     @if(Session::has('success'))

                <div class="alert alert-success">{{Session::get('success')}}</div>

            @endif

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
                                    <th>الاعلان</th>
                                    <th>اسم المعلن</th>
                                    <th> القسم الرئيسي</th>
                                    <th> القسم الفرعي</th>
                                    <th> حاله الاعلان</th>
                                    <th> تمييز الاعلان</th>
                                    <th>الاجراء</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>الاعلان</th>
                                    <th>اسم المعلن</th>
                                    <th> القسم الرئيسي</th>
                                    <th> القسم الفرعي</th>
                                    <th> حاله الاعلان</th
                                    <th> تمييز الاعلان</th>
                                    <th>الاجراء</th>
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
                "ajax": "{{ route('ads.index',request()->route('type')) }}",
                "columns": [{data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'user', name: 'user'},
                    {data: 'category', name: 'category'},
                    {data: 'subcategory', name: 'subcategory'},
                    {data: 'active', name: 'active', orderable: false, searchable: false},
                    {data: 'special', name: 'special', orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false},]
            });



            // start edit
            /* When click edit user */
            $('body').on('change', '.status', function() {
                var ad_id = $(this).data('id');
                var active = $(this).val();
                // alert(active);
               
                $.ajax({
                    type: "POST",
                    url: '{{url('admin/status')}}'+'/' + ad_id,
                    data: {id: ad_id , active: active , "_token": "{{ csrf_token() }}"},
                }).done(function(data){
                     console.log(4654);

                    });
                });



            // end edit
            
            
              $('body').on('change', '.special', function() {
                var ad_id = $(this).data('id');
                var special = $(this).val();
                // alert(active);
               
                $.ajax({
                    type: "POST",
                    url: '{{url('admin/special')}}'+'/' + ad_id,
                    data: {id: ad_id , special: special , "_token": "{{ csrf_token() }}"},
                }).done(function(data){
                     console.log(4654);

                    });
                });




        </script>




    @endpush

@endsection