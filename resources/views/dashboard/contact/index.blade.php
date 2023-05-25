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
            <h3>الرسايل</h3>
        @endslot
        <li class="breadcrumb-item active">الرسايل</li>
        @slot('breadcrumb_icon')
           
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
                                    <th>الاسم</th>
                                    <th>البريد الالكتروني</th>
                                    <th> الموضوع </th>
                                    <th> الرساله </th>
                                    <!--<th>الاجراء</th>-->
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>البريد الالكتروني </th>
                                    <th> الموضوع </th>
                                    <th>  الرساله</th>
                                    <!--<th>الاجراء</th>-->
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
    @push('scripts')
        <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
        <script type="text/javascript">
            $('#ajax-data-object').DataTable({
                select: true,
                processing: true,
                serverSide: true,
                "ajax": "{{ route('messages.index') }}",
                "columns": [{data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'subject', name: 'subject'},
                    {data: 'massege', name: 'massege'},
                    ]
            });



        </script>

    @endpush
