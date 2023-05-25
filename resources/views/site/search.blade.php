@extends('site.layout')
@section('content')
  <!-- featured-ads-start -->
        <section class="featured-ads">
            <div class="container">
                <div class="section-title">
                    <h4 class="title">نتايج البحث</h4>
                </div>
                <div class="row">
                    @forelse($ads as $ad)
                    <div class="col-lg-6">
                        <div class="ad-card featured shadow-sm">
                            <a href="{{route('ad.show',$ad->slug)}}" class="ad-img image-cover sameWidth">
                                @if($ad->special == true)<small class="featured-badge">{{__('site.Featured_AD')}}</small>@endif
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
                                    <h5 class="price">@if($ad->price != 0 || $ad->price != null){{$ad->price}} {{$ad->country_currency}} @else {{__('site.Ask_Seller')}} @endif</h5>
                                    <ul class="ctrls">
                                        <li>
                                            <button class="ctrl-btn like-btn @if($ad->Favoried == true) active @endif" data-href="{{ route('toggle_like',$ad->id) }}">
                                                <img src="{{asset('wb/icons/heart-white-r.svg')}}" class="icon-img">
                                            </button>
                                        </li>
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
                                    <img src="http://badalsale.com/wb/imgs/no-ads.png" alt="no-ads">
                                </div>
                                <h4 class="title">لا يوجد اعلانات</h4>
                            </div> 
                    @endforelse
                </div>
            </div>
            {{ $ads->links() }}
        </section>
        <!-- featured-ads-end -->

@endsection