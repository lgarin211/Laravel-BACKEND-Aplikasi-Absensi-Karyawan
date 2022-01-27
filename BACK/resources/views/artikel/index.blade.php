    @extends('assetabsen/master')
    @section('conten1')
    <div id="page">
        @include('assetabsen/navbar') 
    <div class="page-content">
        <div class="page-title page-title-small">
            <h2><a href="#" data-back-button><i class="fa fa-arrow-left"></i></a>Artikel</h2>
            <a href="#" data-menu="menu-main" class="bg-fade-gray1-dark shadow-xl preload-img" data-src="images/avatars/5s.png"></a>
        </div>
        <div class="card header-card shape-rounded" data-card-height="150">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
            <div class="card-bg preload-img" data-src="https://i.ibb.co/2qrYpQL/Whats-App-Image-2012-01-26-at-10-56-08-removebg-preview.png"></div>
        </div>
        

        @foreach($artikels as $art)
        <div class="card card-style">
            <div data-card-height="300" class="card shadow-l mb-0 bg-18" style="background-image: url({{$art->image}});">
                <div class="card-bottom ml-3">
                    <p class="color-white font-10 opacity-80 mb-n1">
                        <i class="far fa-calendar"></i> {{$art->date}}
                        <i class="ml-3 far fa-clock"></i> {{$art->times}}
                    </p>
                    <p class="color-white font-10 opacity-80 mb-2">
                        <i class="fa fa-map-marker-alt"></i> {{$art->location}}
                    </p>
                </div>
                <div class="card-overlay bg-gradient opacity-90"></div>
            </div>  
            <div class="content mb-0">
                <div class="float-left">
                    <h1 class="mb-n1">{{$art->title}}</h1>
                </div>
                <a href="" class="float-right btn btn-s bg-highlight rounded-xl shadow-xl text-uppercase font-900 font-11 mt-2 mb-3">Lihat</a>
            </div>
        </div>
        @endforeach

        <!-- footer and footer card-->
        <div class="footer" data-menu-load="{{url('/foot')}}"></div>  
    </div> 
    </div>    
    @endsection