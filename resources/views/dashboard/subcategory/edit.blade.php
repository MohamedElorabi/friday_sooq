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
                    <h3>الاقسام الفرعيه</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">الرئيسية</a></li>
                        <li class="breadcrumb-item">تعديل قسم فرعي</li>
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
                                <form action={{route('subcategories.update',$info->id)}} method="post" enctype="multipart/form-data">
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
                                        <label class="col-form-label pt-0" for="image">القسم الرئيسي </label>
                                        <select id="maincategory"  name="category_id"  class="form-control">
                                            <option >اختر القسم</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}"{{($category->id==$info->category_id)? "selected":""}} >{{$category->name_ar}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en"> القسم الفرعي الرئيسي</label>
                                        <select id="subcategory"  name="parent_id"  class="form-control">
                                            @foreach($subcategories as $subcategory)
                                                <option value="{{$subcategory->id}}" {{($subcategory->id == $info->parent_id)? "selected":""}}>{{$subcategory->name_ar}}</option>
                                                @endforeach

                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="image">الصوره </label>
                                        <input class="form-control" id="image" name="image" type="file">
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
        <script>
            $("#maincategory").change(function (e) {
                e.preventDefault();
                var categoryId = $(this).val();
                // alert(categoryId);
                $.ajax({
                    url: '{{url('admin/get-main-sub')}}'+'/' + categoryId,
                    type:"GET",
                }).done(function(data){
                    //  console.log(data[i].name);
                    $('#subcategory').html('');

                    $('#subcategory').append('<option value="">اختار القسم الفرعي</option>');
                    for( var i = data.length - 1; i >= 0; i--){
                        html ='<option value="'+data[i].id+'">' +data[i].name_ar+'</option>';


                        $('#subcategory').append(html);
                    };
                });
            });

        </script>
    @endpush


@endsection

