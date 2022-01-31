
@extends('assetabsen/master')
@section('conten1')
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
    
<div id="page">
    @include('assetabsen/navbar')
    <!-- header and footer bar go here-->  
    <div class="page-content">
        
        <div class="page-title page-title-small">
            <h2><a href="#" data-back-button></a>SIK-K4</h2>
            <a href="#" data-menu="menu-main" class="bg-fade-gray1-dark shadow-xl preload-img" data-src="https://i.ibb.co/2qrYpQL/Whats-App-Image-2022-01-26-at-10-56-08-removebg-preview.png"></a>
        </div>
        <div class="card header-card shape-rounded" data-card-height="180">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
            <div class="card-bg preload-img" data-src="images/pictures/20s.jpg"></div>
        </div>
        
        <div class="card card-style">
            <div class="content">
                <h4 class="font-600">Informasi</h4>
                <p>
                    Silahkan Pilih Menu Informasi
                </p>
            </div>
        </div>

        <?php
        $loop=[
            "Laporan Aktivitas"=>['fas fa-address-book fa-5x','red',url("/create"),'Laporan Aktivitas SMKN 4 Bogor'],
            "Galery Bulan ini"=>['fas fa-camera fa-5x','red',url("/galery"),'Bukti Presensi Saya Bulan ini'],
        ];

        ?>
            @foreach ($loop as $key=> $item)
            <a href="{{$item[2]}}" class="card card-style mb-3 d-flex" data-card-height="100" style="height: 100px;">
                <div class="d-flex justify-content-between">
                    <div class="pl-3 ml-1 align-self-center">
                        <h4 class="font-600 mb-0 pt-4">{{$key}}</h4>
                        <p class="mt-n1 font-11" style="color:{{$item[1]}}; ">
                            {{$item[3]}}
                        </p>
                    </div>
                    <div class="pr-3 align-self-center" style="color:{{$item[1]}};">
                        <i class="{{$item[0]}}"></i>
                    </div>
                </div>
            </a>
            @endforeach        
        
        <!-- footer and footer card-->
        <div class="footer" data-menu-load="{{url('/foot')}}"></div>

    </div>    
    <!-- end of page content-->
@endsection