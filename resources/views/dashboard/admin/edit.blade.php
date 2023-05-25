@extends('layouts.default-layout.master')

@section('title')تعديل مدير
{{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.css') }}">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>المديرين</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item">تعديل المدير</li>
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
                                <form action={{route('admins.update',$info->id)}} method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_ar">الاسم </label>
                                        <input class="form-control" id="name_ar" type="text" value="{{$info->name}}"   name="name">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">البريد الالكتروني</label>
                                        <input class="form-control" id="name_en" type="text" value="{{$info->email}}"  name="email">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en"> رقم الهاتف</label>
                                        <input class="form-control" id="name_en" type="text" value="{{$info->mobile}}"  name="mobile">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">كلمه المرور</label>
                                        <input class="form-control" id="name_en" type="text"  name="password">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">تأكيد كلمه المرور</label>
                                        <input class="form-control" id="name_en" type="text"  name="password_confirmation">
                                    </div>

                                    <div class="mb-2">
                                        <label class="col-form-label">Role:</label>
                                        <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="roles[]">
                                            @foreach($userRole as $role)
                                                <option value="">{{$role->name}}</option>
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
        <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
        <script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
    @endpush


@endsection

