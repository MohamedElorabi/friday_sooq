@extends('layouts.default-layout.master')

@section('title')تعديل قسم رئيسي
{{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush
@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>تعديل قسم رئيسي</h3>
        @endslot
        <li class="breadcrumb-item">تعديل قسم رئيسي</li>
        @slot('breadcrumb_icon')
        @endslot
    @endcomponent

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
                                <form action={{route('categories.update',$info->id)}} method="post" enctype="multipart/form-data">
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
                                        <label class="col-form-label pt-0" for="image">الصوره </label>
                                        <input class="form-control" id="image" name="image" type="file">
                                    </div>


                                    <button type="submit" class="btn btn-primary">حفظ</button>
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

