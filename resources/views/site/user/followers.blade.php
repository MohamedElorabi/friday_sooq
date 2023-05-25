@extends('site.layout')
@section('content')
        <!-- followers-page-start -->
        <section class="followers-page">
            <div class="container">
                <div class="section-title">
                    <h4 class="title">المتابعون</h4>
                </div>
                <div class="row">
                    @forelse($users as $user)
                    <div class="col-lg-3 col-sm-6">
                        <div class="follow-card shadow-sm">
                            <a href="{{route('site.user.show',$user->id)}}" class="user-img image-cover sameHeight">
                                <img src="{{$user->image}}">
                            </a>
                            <div class="content">
                                <a href="{{route('site.user.show',$user->id)}}" class="name">
                                    <h5>{{$user->name}}</h5>
                                </a>
                                <p class="date"><i class="fal fa-calendar-alt"></i>{{$user->created_at}}</p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="empty-area">
                        <div class="icon">
                            <img src="{{asset('wb/imgs/no-users.png')}}" alt="no-users">
                        </div>
                        <h4 class="title">لا يوجد متابعون</h4>
                    </div>
                    @endforelse
                </div>
            </div>
            {{$users->links()}}
        </section>
        <!-- followers-page-end -->
@endsection