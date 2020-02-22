@extends('layouts.app')

@push('additional_assets')
    <script src="/js/pages.additional.1.0.js"></script>
@endpush

@section('content')
<style>
    #map {
        width:auto;
        height: 450px;
    }
</style>
<div class="site-path-wrap">
    <div class="site-path-in">
        <span class="home">
            <a href="/"></a> /
        </span>
        <div class="site-path">
            <a href="/">Главная</a> / Контакты
        </div>
    </div>
</div>
<div class="site-container">
    <main role="main" class="site-main">
        <div class="site-main__inner">
            <h1>Контакты</h1>

            <div class="localcontacts" style="width: 400px;float:left;">
                <div class="localcontacts__top">
                    <div class="localcontacts__top-title">{{setting('site.location')}}</div>
                    <a href="tel:{{setting('site.number')}}">{{setting('site.number')}}</a>
                    <div class="localcontacts__top-discription">
                        <span>{{setting('site.schedule')}}</span>
                    </div>
                </div>
                <div class="localcontacts__adress">
                    <div class="localcontacts__adress-text localnomargin">
                        <div class="localcontacts__adress-inner">
                            <b>Адрес</b>
                            <p><span style="font-family: verdana, geneva; font-size: 13pt;">{{setting('site.email')}}</span></p>
                        </div>
                        <div class="localcontacts__adress-inner">
                            <b>Мы в соц сетях</b>
                            <div class="localcontacts__adress-social localsocialview1 localsocial24x24x1">
                                <span class="icon voyager-boat"></span>
                                {{-- <a class="csspatch-ignore vk" target="_blank" href="{{setting('site.vkontakte')}}"></a> --}}
                                <a class="csspatch-ignore fb" target="_blank" href="{{setting('site.facebook')}}"></a>
                                {{-- <a class="csspatch-ignore tw" target="_blank" href="{{setting('site.twitter')}}"></a> --}}
                                <a class="csspatch-ignore inst" target="_blank" href="{{setting('site.instagram')}}"></a>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            {{-- <iframe width="600" height="450" frameborder="0" style="border:0; float:right"
                    src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJq8vFFn1ugzgRdm2YrY9mRD0&key=AIzaSyBWsxpPtRelCNDw4GUJks3F2bkL3bW3o3U" allowfullscreen></iframe> --}}
        
            <div id="map" style="border: 1px solid grey"></div>

            <script>
                var map;
                var loc = {lat: 43.248461, lng: 76.814022}
                function initMap() {
                    map = new google.maps.Map(document.getElementById('map'), {
                    center: loc,
                    zoom: 17
                    });
                    var marker = new google.maps.Marker({position: loc, map: map});
                }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWsxpPtRelCNDw4GUJks3F2bkL3bW3o3U&callback=initMap"
            async defer></script>
        </div>
        
    </main>
    
</div>
@endsection