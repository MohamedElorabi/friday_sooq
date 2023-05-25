@extends('site.layout')
@section('content')

    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('index')}}"><small>الرئيسية</small></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>اتصل بنا</h4>
                </li>
            </ol>
        </div>
    </nav>

    <section class="contact-us-page">
        <div class="container">
            <div class="souq-logo">
                <img src="{{asset('wb/imgs/blue-logo.svg')}}" alt="logo">
                <p>يمكنك دائما الاتصال بادارة "<span>سوق الجمعة</span>" عن طريق نموذج الاتصال اسفله</p>
            </div>
            <form action="{{route('contact-us.store')}}" method="post">
                @csrf
                <div class="form-group mb-4">
                    <label for="name" class="form-label">الاسم الكامل</label>
                    <input id="name" class="form-control" type="text" name="name" placeholder="اكتب الاسم الكامل هنا"
                           required>
                </div>
                <div class="form-group mb-4">
                    <label for="email" class="form-label">البريد الالكترونى</label>
                    <input id="email" class="form-control" type="email" name="email"
                           placeholder="اكتب البريد الالكترونى هنا" required>
                </div>
                <div class="form-group mb-4">
                    <label for="title" class="form-label">عنوان الرسالة</label>
                    <input id="title" class="form-control" type="text" name="subject" placeholder="اكتب عنوان الرسالة هنا"
                           required>
                </div>
                <div class="form-group mb-4">
                    <label for="content" class="form-label">الموضوع</label>
                    <textarea id="content" rows="5" class="form-control" name="massege"
                              placeholder="اكتب موضوع الرسالة هنا" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-1"><i class="fal fa-paper-plane"></i>ارسال</button>
            </form>

        </div>
    </section>

@endsection
