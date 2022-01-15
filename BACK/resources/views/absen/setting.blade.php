
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
<link rel="manifest" href="{{url('/azure')}}/_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="{{url('/azure')}}/app/icons/icon-192x192.png">
</head>
    
<body class="theme-light" data-highlight="blue2">
    
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
    
<div id="page">
    
    <!-- header and footer bar go here-->
    @include('assetabsen/navbar')
    
    <div class="page-content">
        
        <div class="page-title page-title-small">
            <h2><a href="{{url('/absen')}}" data-back-button><i class="fa fa-arrow-left"></i></a>Settings</h2>
            <a href="{{url('/absen')}}" data-menu="menu-main" class="bg-fade-gray1-dark shadow-xl preload-img" data-src="{{url('/azure')}}/images/avatars/5s.png"></a>
        </div>
        <div class="card header-card shape-rounded" data-card-height="210">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
            <div class="card-bg preload-img" data-src="{{url('/azure')}}/images/pictures/20s.jpg"></div>
        </div>
        
        <div class="card card-style">
            <div class="content mt-0 mb-2">
                <div class="list-group list-custom-large mb-4">     
                    <a href="{{url('/')}}/user/profile">
                        <i class="fa font-14 fa-share-alt bg-red2-dark rounded-sm"></i>
                        <span>Profile</span>
                        <strong>Cukup Tekan</strong>
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

    
    <div id="menu-share" 
         class="menu menu-box-bottom menu-box-detached rounded-m" 
         data-menu-load="menu-share.html"
         data-menu-height="420" 
         data-menu-effect="menu-over">
    </div>    
    
    <div id="menu-highlights" 
         class="menu menu-box-bottom menu-box-detached rounded-m" 
         data-menu-load="{{url('/azure')}}/menu-colors.html"
         data-menu-height="510" 
         data-menu-effect="menu-over">        
    </div>
    
    <div class="footer" data-menu-load="{{url('/azure')}}/menu-footer.html"></div>  




    
</div>    


<script type="text/javascript" src="{{url('/azure')}}/scripts/jquery.js"></script>
<script type="text/javascript" src="{{url('/azure')}}/scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('/azure')}}/scripts/custom.js"></script>
</body>
