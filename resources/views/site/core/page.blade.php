@extends('site.layout')
@section('content')
        <!-- who-are-us-page-start -->
        <section class="who-are-us-page">
            <div class="container">
                <div class="section-title">
                    <h4 class="title">{{$page->name}}</h4>
                </div>
                <div class="text-content">
                    {!! $page->content !!}
                </div>
            </div>
        </section>
        <!-- who-are-us-page-end -->
@endsection