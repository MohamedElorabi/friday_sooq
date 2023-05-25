@extends('layouts.default-layout.master')

@section('title')الرئيسيه 
{{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/daterange-picker.css') }}">
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3> الرئيسية</h3>
        @endslot
        <li class="breadcrumb-item"> الرئيسية</li>

    @endcomponent
    <div class="theme-form">
        <form action="{{route('admin')}}" method="get">
          @csrf
          <div class="form-group">
              <input class="form-control digits" type="text" name="daterange" value="{{\Carbon\Carbon::now()->format('m/d/Y')}} - {{\Carbon\Carbon::now()->format('m/d/Y')}}"  />
             </div>
             <div class="col-md-12 text-center mb-4">
          <button class="btn btn-info" type="submit">عرض</button>
             </div> 
              </form>
    </div>
           
<div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                        <div class="bg-primary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center"><i data-feather="database"></i></div>
                                <div class="media-body">
                                    <span class="m-0">الاعلانات</span>
                                    <h4 class="mb-0 counter">{{$ads}}</h4>
                                    <i class="icon-bg" data-feather="database"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                        <div class="bg-secondary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center"><i data-feather="shopping-bag"></i></div>
                                <div class="media-body">
                                    <span class="m-0">الزوار</span>
                                    <h4 class="mb-0 counter">{{$views}}</h4>
                                    <i class="icon-bg" data-feather="shopping-bag"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                        <div class="bg-primary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center"><i data-feather="message-circle"></i></div>
                                <div class="media-body">
                                    <span class="m-0">الزيارات</span>
                                    <h4 class="mb-0 counter">{{$ss}}</h4>
                                    <i class="icon-bg" data-feather="message-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                        <div class="bg-primary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center"><i data-feather="message-circle"></i></div>
                                <div class="media-body">
                                    <span class="m-0">التبليغات</span>
                                    <h4 class="mb-0 counter">{{$reports}}</h4>
                                    <i class="icon-bg" data-feather="message-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        <div class="row">

            <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                        <div class="bg-primary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center"><i data-feather="message-circle"></i></div>
                                <div class="media-body">
                                    <span class="m-0">الاعلانات الفعاله</span>
                                    <h4 class="mb-0 counter">{{$activeads}}</h4>
                                    <i class="icon-bg" data-feather="message-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
             <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                        <div class="bg-primary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center"><i data-feather="message-circle"></i></div>
                                <div class="media-body">
                                    <span class="m-0">الاعلانات المنتظره</span>
                                    <h4 class="mb-0 counter">{{$waitingeads}}</h4>
                                    <i class="icon-bg" data-feather="message-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
             <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                        <div class="bg-primary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center"><i data-feather="message-circle"></i></div>
                                <div class="media-body">
                                    <span class="m-0">الاعلانات المرفوضه</span>
                                    <h4 class="mb-0 counter">{{$refusedads}}</h4>
                                    <i class="icon-bg" data-feather="message-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
             <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                        <div class="bg-primary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center"><i data-feather="message-circle"></i></div>
                                <div class="media-body">
                                    <span class="m-0">الاعلانات المباعه</span>
                                    <h4 class="mb-0 counter">{{$soldads}}</h4>
                                    <i class="icon-bg" data-feather="message-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
             
                
        </div>
        
        <hr>
        <div class="row">
            <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                        <div class="bg-primary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center"><i data-feather="user-plus"></i></div>
                                <div class="media-body">
                                    <span class="m-0">الاعضاء</span>
                                    <h4 class="mb-0 counter">{{$users}}</h4>
                                    <i class="icon-bg" data-feather="user-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                        <div class="bg-primary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center"><i data-feather="message-circle"></i></div>
                                <div class="media-body">
                                    <span class="m-0">اعضاء الموقع</span>
                                    <h4 class="mb-0 counter">{{$siteUsers}}</h4>
                                    <i class="icon-bg" data-feather="message-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
             <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                        <div class="bg-primary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center"><i data-feather="message-circle"></i></div>
                                <div class="media-body">
                                    <span class="m-0">أعضاء التطبيق</span>
                                    <h4 class="mb-0 counter">{{$appUsers}}</h4>
                                    <i class="icon-bg" data-feather="message-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                        <div class="bg-primary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center"><i data-feather="message-circle"></i></div>
                                <div class="media-body">
                                    <span class="m-0">أعضاء بالجيميل</span>
                                    <h4 class="mb-0 counter">{{$googleUsers}}</h4>
                                    <i class="icon-bg" data-feather="message-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                        <div class="bg-primary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center"><i data-feather="message-circle"></i></div>
                                <div class="media-body">
                                    <span class="m-0">أعضاء بالفيس بوك</span>
                                    <h4 class="mb-0 counter">{{$fbUsers}}</h4>
                                    <i class="icon-bg" data-feather="message-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                        <div class="bg-primary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center"><i data-feather="message-circle"></i></div>
                                <div class="media-body">
                                    <span class="m-0">أعضاء بالابل اي دي</span>
                                    <h4 class="mb-0 counter">{{$appleUsers}}</h4>
                                    <i class="icon-bg" data-feather="message-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden border-0">
                        <div class="bg-primary b-r-4 card-body">
                            <div class="media static-top-widget">
                                <div class="align-self-center text-center"><i data-feather="message-circle"></i></div>
                                <div class="media-body">
                                    <span class="m-0">أعضاء بالموبايل</span>
                                    <h4 class="mb-0 counter">{{$mobileUsers}}</h4>
                                    <i class="icon-bg" data-feather="message-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

                
        </div>
            
        </div>
        
        
        
        
@endsection
 @push('scripts')
 <script src="{{ asset('assets/js/datepicker/daterange-picker/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/daterange-picker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/daterange-picker/daterange-picker.custom.js') }}"></script>
 @endpush


