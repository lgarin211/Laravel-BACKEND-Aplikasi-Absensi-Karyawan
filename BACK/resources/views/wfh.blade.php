<?php $asl=$_GET['to'];?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>Azures BootStrap</title>
<link rel="stylesheet" type="text/css" href="{{url('/azure')}}/styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="{{url('/azure')}}/styles/style.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{url('/azure')}}/fonts/css/fontawesome-all.min.css">     
<link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<link rel="apple-touch-icon" sizes="180x180" href="{{url('/azure')}}/app/icons/icon-192x192.png"></head>
    
<body class="theme-light" data-highlight="blue2">
    
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
    
<div id="page">
    
    <!-- header and footer bar go here-->

    @include('assetabsen/navbar')
    <div class="page-content" style="min-height:60vh!important">
        <div class="page-title page-title-small">
            <h2><a href="#" data-back-button></a>SIK-K4</h2>
            <a href="#" data-menu="menu-main" class="bg-fade-gray1-dark shadow-xl preload-img" data-src="https://i.ibb.co/2qrYpQL/Whats-App-Image-2022-01-26-at-10-56-08-removebg-preview.png"></a>
        </div>
        <div class="card header-card shape-rounded" data-card-height="150">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
            <div class="card-bg preload-img" data-src="images/pictures/20s.jpg"></div>
        </div>
        
        <div class="card card-style">
            <p class="content">
                Silahkan isi pengajuan kapan akan melakukan {{$asl}} beserta keterangannya.
            </p>
        </div>

        <div class="card card-style">
            <div class="content mb-0">        
                <h3>Pengajuan {{$asl}}</h3>
              <br>
              <form action="{{url('/wfhprocess')}}" method="POST">
                <input type="hidden" name="to" value="{{$_GET['to']}}">
                @csrf
                <div class="input-style mt-1 mb-3 has-icon input-required">
                    <i class="input-icon fa fa-calendar"></i>
                    <span class="color-highlight">Dari tanggal</span>
                    <em>(Wajib)</em>
                    <input class="form-control" type="date" name="date1" placeholder="">
                </div> 
                <div class="input-style mt-1 mb-3 has-icon input-required">
                    <i class="input-icon fa fa-calendar"></i>
                    <span class="color-highlight">Hingga tanggal</span>
                    <em>(Wajib)</em>
                    <input class="form-control" type="date" name="date2" placeholder="">
                </div> 
                <div class="input-style input-style-2 input-required">
                
                    <span>Masukan keterangan {{$asl}}</span>
                    <em>(Wajib)</em>
                    <input class="form-control" required type="text" name="keterangan" placeholder="">

                </div>

                {{-- <button class="btn btn-primary" type="submit" name="proses">Ajukan</button> --}}
                <a class="btn btn-primary" href="#" onclick="alert('Mohon Maaf Saat Ini Pengajuan Sedang Dalam Pengembangan Harap Ajukan Beberapa Hari Berikutnya')">Ajukan</a>
                <br><br>

              </form>


                
            </div>
        </div>


            
        <!-- footer and footer card-->
        <div class="footer" data-menu-load="{{url('/foot')}}"></div>
    <!-- end of page content-->
    
    
    
   
    
    
</div>    


<script type="text/javascript" src="{{url('/azure')}}/scripts/jquery.js"></script>
<script type="text/javascript" src="{{url('/azure')}}/scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('/azure')}}/scripts/custom.js"></script>
</body>
