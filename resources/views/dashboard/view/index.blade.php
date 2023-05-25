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
        <li class="breadcrumb-item">الزيارات </li>
        @slot('breadcrumb_icon')
          
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
                                    <th>hits</th>
                                    <th>تاريخ المشاهده</th>
                                    <th>وقت المشاهده</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Hits</th>
                                    <th>Date</th>
                                    <th>Visit_time</th>
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
                "ajax": "{{ route('views.index') }}",
                "columns": [{data: 'id', name: 'id'},
                    {data: 'hits', name: 'hits'},
                    {data: 'date', name: 'date'},
                    {data: 'visit_time', name: 'visit_time'},
                    ]
            });
        </script>
    @endpush

@endsection