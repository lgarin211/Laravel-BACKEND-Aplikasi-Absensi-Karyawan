@extends('assetabsen/master')
@section('conten1')
    
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>    
<div id="page">
    
    <!-- header and footer bar go here-->
    @include('assetabsen/navbar')
    
    <div class="page-content">
        
        <div class="page-title page-title-small">
            <h2><a href="#" data-back-button></a>SIK-K4</h2>
            <a href="#" data-menu="menu-main" class="bg-fade-gray1-dark shadow-xl preload-img" data-src="https://i.ibb.co/2qrYpQL/Whats-App-Image-2022-01-26-at-10-56-08-removebg-preview.png"></a>
        </div>
        <div class="card header-card shape-rounded" data-card-height="210">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
            <div class="card-bg preload-img" data-src="{{url('/azure')}}/images/pictures/20s.jpg"></div>
        </div>
        
        <div class="card card-style">
            <div class="content mt-0 mb-2">
                <div class="list-group list-custom-large mb-4">     
                    <a href="{{url('/user/profile')}}">
                        <i class="fa font-14 fa-share-alt bg-red2-dark rounded-sm"></i>
                        <span>Profile</span>
                        <strong>Fiture Dalam Pengembangan</strong>
                        <i class="fa fa-angle-right mr-2"></i>
                    </a>
                    <a href="https://presinsi-notification-smkn4.web.app?id={{Auth::user()->id}}" onclick="alert('Pada Halaman Berikutnya Harap memilih setuju (allow) ')">
                        <i class="fa font-14 fa-bell bg-red1-dark rounded-sm"></i>
                        <span>Notifikasi</span>
                        <strong>Berikutnya memilih <b> setuju (allow) </b></strong>
                        <i class="fa fa-angle-right mr-2"></i>
                    </a>
                    <a href="{{url('/azure')}}/#" data-toggle-theme class="show-on-theme-light">
                        <i class="fa font-14 fa-moon bg-brown1-dark rounded-sm"></i>
                        <span>Tema Terang/Gelap</span>
                        <strong>Cukup Tekan</strong>
                        <i class="fa fa-angle-right mr-2"></i>
                    </a>     
                    <a href="{{url('/azure')}}/#" data-toggle-theme class="show-on-theme-dark">
                        <i class="fa font-14 fa-lightbulb bg-yellow1-dark rounded-sm"></i>
                        <span>Tema Terang/Gelap</span>
                        <strong>Cukup Tekan </strong>
                        <i class="fa fa-angle-right mr-2"></i>
                    </a>     
                    <a href="{{url('/azure')}}/#" data-menu="menu-highlights">
                        <i class="fa font-14 fa-brush bg-highlight color-white rounded-sm"></i>
                        <span>Skema Warna</span>
                        <strong>Skema Warna</strong>
                        <i class="fa fa-angle-right mr-2"></i>
                    </a>     
                </div>
                
                <h5>Perlu Bantuan?</h5>
                <p>
                    Jika anda Perlu Bantuan Anda Dapat menghubungi nomor berikut <a href="https://wa.me/6281221723861">081221723861</a>
                </p>
                <div class="divider mb-1"></div>
            </div>  
        </div>
       
        <!-- footer and footer card-->
        <!-- <div class="footer" data-menu-load="menu-footer.html"></div>   -->
    </div>    
    <!-- end of page content-->

    <div class="footer" data-menu-load="{{url('/foot')}}"></div>  
    




    
</div>    

@endsection
