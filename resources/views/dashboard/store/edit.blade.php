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
                    <h3> المتجر</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">الرئيسية</a></li>
                        <li class="breadcrumb-item">تعديل  متجر  </li>
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
                                <form action="{{route('stores.update',$info->id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_ar">الاسم </label>
                                        <input class="form-control" id="name_ar" type="text" value="{{$info->name}}"  name="name">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">الوصف </label>
                                        <textarea class="form-control" name="description">{{$info->description}}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">افاتار </label>
                                        <input class="form-control" id="name_en" type="file"  name="avatar">
                                    </div>
                                     <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">كفر </label>
                                        <input class="form-control" id="name_en" type="file"  name="cover">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">العنوان  </label>
                                        <input class="form-control" id="name_en" type="text" value="{{$info->address}}"  name="address">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">رقم الهاتف </label>
                                        <input class="form-control" id="name_en" type="text" value="{{$info->phone}}"  name="phone">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">الموقع </label>
                                        <input class="form-control" id="name_en" type="text"value="{{$info->wrbsite}}"  name="wrbsite">
                                    </div>
                                     <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">فيس بوك </label>
                                        <input class="form-control" id="name_en" type="text" value="{{$info->facebook}}"  name="facebook">
                                    </div>
                                     <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">تويتر </label>
                                        <input class="form-control" id="name_en" type="text" value="{{$info->twitter}}"  name="twitter">
                                    </div>
                                     <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">انستجرام </label>
                                        <input class="form-control" id="name_en" type="text" value="{{$info->instagram}}" name="instagram">
                                    </div>
                                     <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">سناب شات </label>
                                        <input class="form-control" id="name_en" type="text"value="{{$info->snapchat}}"  name="snapchat">
                                    </div>
                                     <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">يوتيوب </label>
                                        <input class="form-control" id="name_en" type="text" value="{{$info->youtube}}"  name="youtube">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">المستخدم </label>
                                        <select class="form-control"  name="user_id">
                                            <option disapled selected>اختر </option>
                                            @foreach($users as $user)
                                            <option value="{{$user->id}}" {{($user->id==$info->user_id)? "selected":""}}>{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">النوع </label>
                                        <select class="form-control"  name="type_id">
                                             <option disapled selected>اختر </option>
                                            @foreach($storetypes as $storetype)
                                            <option value={{$storetype->id}} {{($storetype->id==$info->type_id)? "selected":""}}>{{$storetype->name_ar}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">حفظ</button>
                                    <button class="btn btn-secondary">الغاء</button>
                                </form>

          @push('scripts')
                <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
                 <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
          @endpush

@endsection