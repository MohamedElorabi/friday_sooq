@extends('site.layout')
@section('content')
    <!-- profile-page-start -->

    <div class="profile-page">
        <section class="profile-main-info shadow">
            <div class="container">
                <div class="info">
                    <div class="row">
                        <div
                            class="col-md-6 d-flex align-items-center justify-content-md-start justify-content-center mb-md-0 mb-4">
                            <div class="account-details">
                                <div class="image image-cover sameHeight">
                                    <img src="{{$user->image}}">
                                </div>
                                <div class="text">
                                    <h5 class="name">{{$user->name}}</h5>
                                    <small>
                                        <i class="fal fa-calendar-alt"></i>
                                        {{$user->created_at}}
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-md-6 d-flex align-items-center justify-content-md-end justify-content-center">
                            <ul class="controls">
                                <li>
                                    <a href="tel:{{$user->mobile}}" class="ctrl-btn phone">
                                        <i class="fal fa-phone-alt"></i>
                                        {{__('site.Call')}}
                                    </a>
                                </li>
                                <li>
                                    <button class="ctrl-btn follow" data-href="{{ route('follow.unfollow',$user->id) }}" data-id="{{$user->id}}" data-value="{{($user->is_follow== true) ? "follow":"unfollow"}}">
                                        @if($user->is_follow == true)
                                        <i class="fal fa-user-times"></i>
                                       {{__('site.Un_follow')}}
                                       @else
                                       <i class="fal fa-user-plus"></i>
                                       {{__('site.Follow')}}
                                       @endif
                                    </button>
                                </li>
                                <li>
                                    <a href="https://wa.me/{{$user->whatsapp}}" class="ctrl-btn whats" target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                        {{__('site.Whatsapp')}}
                                    </a>
                                </li>
                                <li>
                                    <button class="ctrl-btn block">
                                        <i class="fal fa-ban"></i>
                                        {{__('site.Block')}}
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-active-ads-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-active-ads" type="button" role="tab"
                            aria-controls="pills-active-ads" aria-selected="true">{{__('site.Actived_ADS')}}</button>
                    </li>
                </ul>
            </div>

        </section>
        <section class="active-ads">
            <div class="container">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-active-ads" role="tabpanel"
                        aria-labelledby="pills-active-ads-tab">
                        <div class="row">
                            <div class="section-title">
                                <h4 class="title">{{__('site.Actived_ADS')}}</h4>
                            </div>
                            @forelse($ads as $ad)
                            <div class="col-lg-6">
                                <div class="ad-card featured shadow-sm">
                                    <a href="{{route('ad.show',$ad->slug)}}" class="ad-img image-cover sameWidth">
                                        @if($ad->special == true)<small class="featured-badge">اعلان مميز</small>@endif
                                        <img src="{{$ad->image}}">
                                    </a>
                                    <div class="content">
                                        <div class="card-hd">
                                            <a href="{{route('ad.show',$ad->slug)}}" class="title">
                                                <h5>{{$ad->name}}</h5>
                                            </a>
                                            <div class="categs-date">
                                                <div class="categs">
                                                    <p>{{$ad->category_name}}</p>
                                                </div>
                                                <small class="date">{{$ad->active_at}}</small>
                                            </div>
                                        </div>
                                        <div class="card-ftr">
                                            <h5 class="price">{{$ad->price}} {{$ad->country_currency}}</h5>
                                            <ul class="ctrls">
                                                @if($ad->Favoried == 'ok')
                                                <li>
                                                    <button class="ctrl-btn like-btn" data-href="{{ route('toggle_like',$ad->id) }}">
                                                        <img src="{{asset('wb/icons/heart-white-r.svg')}}" class="icon-img">
                                                    </button>
                                                </li>
                                                @else
                                                <li>
                                                 <button class="ctrl-btn like-btn" data-href="{{ route('toggle_like',$ad->id) }}">
                                                        <img src="{{asset('wb/icons/heart-white-r.svg')}}" class="icon-img">
                                                    </button>
                                                </li>
                                               @endif
                                                <li>
                                                    <a href="{{route('ad.show',$ad->slug)}}#comments" class="ctrl-btn">
                                                        <img src="{{asset('wb/icons/comment-white-r.svg')}}" class="icon-img">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{route('ad.show',$ad->slug)}}" class="user ctrl-btn image-cover">
                                                        <img src="{{$ad->user_image}}">
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="empty-area">
                                <div class="icon">
                                    <img src="{{asset('wb/imgs/no-ads.png')}}" alt="no-ads">
                                </div>
                                <h4 class="title">لا يوجد اعلانات</h4>
                            </div>
                            @endforelse
                            {{ $ads->links() }}
                        </div>
                    </div>
                </div>
            </section>
        </div>
    <!-- profile-page-end -->
@endsection
@push('custom-scripts')
    <script>
      $('body').on('click','.like-btn',function(e){
        //   alert(1232);
        e.preventDefault();
        @if(!auth()->user())
        window.location.href = "{{ route('login') }}";
        return;
        @endif
      var thislike = $(this);
      $.ajax({
          url : thislike.data('href'),
          method : "GET",
          success : function (data){
              if(data['like']){
                  var html = '<i class="fas fa-heart" style="color: var(--main-color)"></i>';
              }else{
                  var html = '<i class="fal fa-heart"></i>';
              }
              thislike.html(html);
          }
       })
     });
     
     
     
     
     $('body').on('click','.follow',function(e){
        var is_follow = $(this).data('value');
        var id = $(this).data('id');
        e.preventDefault();
        var thislike = $(this);
        $.ajax({
            url: thislike.data('href'),
            type:"GET",
        }).done(function(data){
            if(data){
                $('.follow').empty();
                $('.follow').append("<i class='fal fa-user-times'></i>{{__('site.Un_follow')}}")
                // 
            }else{
                $('.follow').empty();
                $('.follow').append("<i class='fal fa-user-plus'></i>{{__('site.Follow')}}")
            }
        });
     });
     
     </script>
@endpush