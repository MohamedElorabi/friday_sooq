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
        <li class="breadcrumb-item">فليرات المتاجر </li>
        @slot('breadcrumb_icon')
            <li>
            <a href="{{route('storeflyers.create')}}" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="plus"></i></a>
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
                                    <th>الاسم</th>
                                    <th>اسم المتجر</th>
                                    <th>الاجراء</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Store Name</th>
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
                processing: true,
                serverSide: true,
                "ajax": "{{ route('storeflyers.index') }}",
                "columns": [{data: 'id', name: 'id'},
                    {data: 'name_ar', name: 'name_ar'},
                    {data: 'store', name: 'store'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},]
            });
        </script>
    @endpush

@endsection