<!doctype html>
<html lang="ar" dir="rtl">
@include('site.partials.auth.header')

<body>
    <main class="login-page">
        @if (Session::has('success'))
            <div class="position-fixed alert-toast top-0 end-0 p-3" style="z-index: 11">
                <div id="alertToast" class="toast text-white bg-success " role="alert" aria-live="assertive"
                    aria-atomic="true" data-bs-delay="2000">
                    <div class="d-flex align-items-center gap-3">
                        <div class="toast-body flex-fill">
                            {{ Session::get('success') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @elseif(Session::has('error'))
            <div class="position-fixed alert-toast top-0 end-0 p-3" style="z-index: 11">
                <div id="alertToast" class="toast text-white bg-danger" role="alert" aria-live="assertive"
                    aria-atomic="true" data-bs-delay="2000">
                    <div class="d-flex align-items-center gap-3">
                        <div class="toast-body flex-fill">
                            {{ Session::get('error') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo-slogan">
                        <a href="{{ route('index') }}">
                            <img src="{{ asset('wb/imgs/white-logo.svg') }}" alt="logo">
                        </a>
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
    </main>
    @include('site.partials.auth.footer')
</body>

</html>
