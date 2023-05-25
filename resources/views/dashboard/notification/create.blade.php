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
                    <h3>ارسال اشعار عام</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">الرئيسية</a></li>
                        <li class="breadcrumb-item">   ارسال اشعار عام</li>
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
                                <form action={{route('notifications.store')}} method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                     <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_ar">الرقم التعريفي </label>
                                        <select class="form-control"   name="type">
                                            <option value="all">عام</option>
                                             <option value="ad">اعلان</option>
                                              <option value="store">متجر</option>
                                        </select>
                                    </div>
                                     <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_ar">الرقم التعريفي </label>
                                        <input class="form-control" id="name_ar" type="number" value="0"  name="id">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_ar">العنوان </label>
                                        <input class="form-control" id="name_ar" type="text"   name="title">
                                    </div>
                                     <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_ar">المحتوي </label>
                                        <input class="form-control" id="name_ar" type="text"    name="body">
                                    </div>
                                   

                                    <button type="submit" class="btn btn-primary">حفظ</button>
                                    <button class="btn btn-secondary">الغاء</button>
                                </form>

          @push('scripts')
                <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
                 <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
          @endpush

@endsection