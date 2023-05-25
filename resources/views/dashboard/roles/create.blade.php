@extends('layouts.default-layout.master')

@section('title')Layout Light
{{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>الاعضاء</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">الرئيسية</a></li>
                        <li class="breadcrumb-item">اضافه  عضو جديد</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-xl-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                @if (count($errors) > 0)

                                    <div class="alert alert-danger">

                                        <ul>

                                            @foreach ($errors->all() as $error)

                                                <li>{{ $error }}</li>

                                            @endforeach

                                        </ul>

                                    </div>

                                @endif

                                @if(Session::has('success'))

                                    <div class="alert alert-success">{{Session::get('success')}}</div>

                                @endif
                            </div>
                            <div class="card-body">
                                <form action="{{route('roles.store')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_ar">الاسم </label>
                                        <input class="form-control" id="name_ar" type="text"   name="name">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en"> Permission:</label>
                                        <br/>
                                        @foreach($permission as $value)
                                            <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $value->name }}"> <label class="form-check-label" for="inline-form-1">{{ $value->name }}</label>
                                            <br/>
                                        @endforeach
                                    </div>

                                    <button type="submit" class="btn btn-primary">حفظ</button>
                                    <button class="btn btn-secondary">الغاء</button>
                                </form>

                                @push('scripts')
                                    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
                                    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
                                @endpush

                                @endsection


                                {{--<div class="form-check form-check-inline checkbox checkbox-primary">--}}
                                    {{--<input class="form-check-input" id="inline-form-1" type="checkbox" />--}}
                                    {{--<label class="form-check-label" for="inline-form-1">Option 1</label>--}}
                                {{--</div>--}}