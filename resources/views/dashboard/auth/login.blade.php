@extends('dashboard.auth.master')

@section('title')تسجيل دخول
{{ $title }}
@endsection

@push('css')
@endpush

@section('content')
    <section>
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <div class="login-card">
                        <form class="theme-form login-form" action="{{route('post-login')}}" method="post">
                            @csrf
                            <h4>تسجيل دخول</h4>
                            <h6>مرحبا بك!</h6>
                            <div class="form-group">
                                <label>البريد الالكتروني</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="icon-email"></i></span>
                                    <input class="form-control" type="email" name="email" required="" placeholder="Test@gmail.com" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>كلمة المرور</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="icon-lock"></i></span>
                                    <input class="form-control" type="password" name="password" required="" placeholder="*********" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <input id="checkbox1" type="checkbox" />
                                    <label for="checkbox1">Remember password</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">تسجيل دخول</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @push('scripts')
    @endpush

@endsection