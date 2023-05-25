@extends('layouts.default-layout.master')

@section('title')إضافة باقه 
{{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>اضافة  باقه</h3>
        @endslot
        <li class="breadcrumb-item">اضافة  باقه</li>
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
                                <form action={{route('adpackages.store')}} method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_ar">الاسم بالعربية</label>
                                        <input class="form-control" id="name_ar" type="text"   name="name_ar">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">الاسم بالانجليزيه</label>
                                        <input class="form-control" id="name_en" type="text"  name="name_en">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">السعر </label>
                                        <input class="form-control" id="name_en" type="text"  name="price">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">المده </label>
                                        <input class="form-control" id="name_en" type="number"  name="period">
                                    </div>
                                    <div id="form">

                                        <div class="row">
                                            <div class="col-12 col-md-2 mb-3">
                                                <label class="col-form-label pt-0" for="name_ar">المحتوي بالعربيه </label>
                                                <textarea type="text" class="form-control" name="content_ar[]"  required></textarea>
                                            </div>
                                             <div class="col-12 col-md-2 mb-3">
                                                <label class="col-form-label pt-0" for="name_ar">المحتوي بالانجليزيه </label>
                                                <textarea type="text" class="form-control" name="content_en[]"  required></textarea>
                                            </div>
                                        </div>

                                    </div>
                                 <button type="button" name="add" id="add" class="btn btn-success">اضافة المزيد  +</button>
                                    <button type="submit" class="btn btn-primary">حفظ</button>
                                    <button class="btn btn-secondary">الغاء</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

          @push('scripts')
                <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
                 <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
                  <script type="text/javascript">

            $("#add").click(function(){
                $("#form").append('<div class="row butto"><div class="col-12 col-md-2 mb-3">\n' +
                    '                                          <label class="col-form-label pt-0" for="name_ar">المحتوي بالعربيه </label>     \n' +
                    '                                           <textarea type="text" class="form-control" name="content_ar[]"  required></textarea>    \n' +
                    '                                            </div>\n' +
                    '                                           <div class="col-12 col-md-2 mb-3">\n' +
                    '                                          <label class="col-form-label pt-0" for="name_ar">المحتوي بالانجليزيه </label>     \n' +
                    '                                           <textarea type="text" class="form-control" name="content_en[]"  required></textarea>    \n' +
                    '                                            </div>\n' +
                    '                                            <div class="col-12 col-md-2 mb-3"><button type="button" class="remove-tr btn btn-danger">حذف</button></div></div>');
            });

            $(document).on('click', '.remove-tr', function(){

                $(this).parents('div.butto').remove();

            });

        </script>
          @endpush

@endsection