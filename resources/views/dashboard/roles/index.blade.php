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
        <li class="breadcrumb-item">Starter Kit</li>
        <li class="breadcrumb-item">Color Version</li>
        <li class="breadcrumb-item active">Layout Light</li>
    @endcomponent

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-1">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>الاجراء</th>
                                </tr>
                                </thead>
                               @foreach($roles as $key => $role)
                                <tr>
                                    <th>{{ ++$i }}</th>
                                    <th>{{ $role->name }}</th>
                                </tr>
                               @endforeach
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
            {{--$('#ajax-data-object').DataTable({--}}
                {{--processing: true,--}}
                {{--serverSide: true,--}}
                {{--"ajax": "{{ route('roles.index') }}",--}}
                {{--"columns": [{data: 'id', name: 'id'},--}}
                    {{--{data: 'name', name: 'name'},--}}
                    {{--{data: 'action', name: 'action', orderable: false, searchable: false},]--}}
            {{--});--}}
        </script>
    @endpush

@endsection