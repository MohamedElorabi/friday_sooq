@component('mail::message')

    # تواصل معنا


    <h3>الأسم : {{$data['name'] }}</h3>
    <h3>البريد الإلكترونى : {{$data['email'] }}</h3>
    <h3> عنوان الرسالة : {{$data['subject'] }}</h3>
    <h3>الرسالة : {{$data['massege'] }}</h3>


    شكرا<br>
    {{ config('app.name') }}
@endcomponent
