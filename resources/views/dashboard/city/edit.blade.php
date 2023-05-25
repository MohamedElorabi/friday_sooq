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
                    <h3>المحافظات</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">الرئيسية</a></li>
                        <li class="breadcrumb-item">تعديل محافظه</li>
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
                                <form action={{route('cities.update',$info->id)}} method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_ar">الاسم بالعربية</label>
                                        <input class="form-control" value="{{$info->name_ar}}" id="name_ar" type="text"  name="name_ar">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">الاسم بالانجليزيه</label>
                                        <input class="form-control" value="{{$info->name_en}}" id="name_en" type="text"  name="name_en">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="image">الدوله </label>
                                        <select id="select"  name="country_id"  class="form-control">
                                            <option >اختر الدوله</option>
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}" {{($country->id ==$info->country_id ) ?"selected" : ""}} >{{$country->name_ar}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button class="btn btn-secondary">Cancel</button>
                                </form>                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    @endpush


@endsection

