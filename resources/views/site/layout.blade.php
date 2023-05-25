<!doctype html>
<html lang="{{ App::getLocale() }}" @if (App::getLocale() == 'ar' || App::getLocale() == 'ur') dir="rtl"@else dir="ltr" @endif>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('site.partials.style')
    <title>FridaySooq</title>
</head>

<body>
    <div id="page">
        @include('site.partials.header')

        @if (Session::has('success'))
            <div class="position-fixed alert-toast top-0 start-0 p-3" style="z-index: 11;">
                <div id="alertToast" class="toast text-white bg-success " role="alert" aria-live="assertive"
                    data-bs-delay="2000" aria-atomic="true">
                    <div class="d-flex align-items-center gap-3">
                        <div class="toast-body flex-fill">
                            {{ Session::get('success') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @elseif(Session::has('error'))
            <div class="position-fixed alert-toast top-0 start-0 p-3" style="z-index: 11;">
                <div id="alertToast" class="toast text-white bg-danger" role="alert" aria-live="assertive"
                    data-bs-delay="2000" aria-atomic="true">
                    <div class="d-flex align-items-center gap-3">
                        <div class="toast-body flex-fill">
                            {{ Session::get('error') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif
        @yield('content')
        @include('site.partials.footer')
    </div>
    @include('site.partials.scripts')
</body>

</html>
