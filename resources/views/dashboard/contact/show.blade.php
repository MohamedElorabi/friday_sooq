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
	                        <table class="display" id="basic-1">
	                            <thead>
	                                <tr>
	                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>البريد الالكتروني</th>
                                    <th> الموضوع </th>
                                    <th> الرساله </th>
                                    <th>الاجراء</t
	                                </tr>
	                            </thead>
	                            <tbody>
	                                <tr>
	                                    <th>#</th>
                                    <th>{{$info->name}}</th>
                                    <th>{{$info->email}}  </th>
                                    <th> {{$info->subject}} </th>
                                    <th>  {{$info->massege}}</th>
                                    <th>الاجراء</th>
	                                </tr>
	                            </tbody>
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
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>

        </script>

    @endpush
