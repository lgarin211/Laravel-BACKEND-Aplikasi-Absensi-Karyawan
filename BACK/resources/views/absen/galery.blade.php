@extends('assetabsen/master')
@section('conten1')

<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
    
<div id="page">
    
    @include('assetabsen/navbar')
    <div class="page-content">
        <div class="page-title page-title-small">
            <h2><a href="#" data-back-button></a>SIK-K4</h2>
            <a href="#" data-menu="menu-main" class="bg-fade-gray1-dark shadow-xl preload-img" data-src="https://i.ibb.co/2qrYpQL/Whats-App-Image-2022-01-26-at-10-56-08-removebg-preview.png"></a>
        </div>
        <div class="card header-card shape-rounded" data-card-height="150" style="height: 150px;">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
            <div class="card-bg preload-img" data-src="images/pictures/20s.jpg" style="background-image: url(&quot;images/pictures/20s.jpg&quot;);"></div>
        </div>

        {{-- <div class="card header-card shape-rounded" data-card-height="150">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
            <div class="card-bg preload-img" data-src="{{$data['user']->profile_photo_path}}"></div>
        </div> --}}
        
        <div class="card card-style">
            <!-- follow buttons-->
            <div class="divider mb-3 mt-1"></div>
            <div class="p-3">
                <div class="row text-center row-cols-3 mb-n4">
                            @foreach ($data['dam'] as $key=>$vel )
                            
                            <a class="col mb-4" data-lightbox="gallery-1" href="{{url('/').'/'.$vel->bukti_masuk}}" title="{{$vel->keterangan}},{{$vel->jam_masuk}}">
                                <img data-src="{{url('/').'/'.$vel->bukti_masuk}}" class="img-fluid rounded-xs preload-img" alt="{{$vel->keterangan}},{{$vel->jam_masuk}}">
                            </a>
           
                            @endforeach
                </div>
            </div>
        </div>

<!-- char here -->
       
        <!-- footer and footer card-->
        <div class="footer" data-menu-load="{{url('/foot')}}"></div>  
    </div>    
    <!-- end of page content-->
        
</div>    
@endsection