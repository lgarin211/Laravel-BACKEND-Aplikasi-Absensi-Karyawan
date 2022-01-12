<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>PRESENSI</title>
<link rel="stylesheet" type="text/css" href="{{url('/azure')}}/styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="{{url('/azure')}}/styles/style.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{url('/azure')}}/fonts/css/fontawesome-all.min.css">    
<!-- <link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js"> -->
<link rel="apple-touch-icon" sizes="180x180" href="{{url('/azure')}}/app/icons/icon-192x192.png">
</head>
    
<body class="theme-light" data-highlight="blue2">
    
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
    
<div id="page">
    
    <!-- header and footer bar go here-->
    <div class="header header-fixed header-auto-show header-logo-app">
        <!-- <a href="#" data-back-button class="header-title header-subtitle">Back to Pages</a>
        <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-arrow-left"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-2 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-2 show-on-theme-light"><i class="fas fa-moon"></i></a>
        <a href="#" data-menu="menu-highlights" class="header-icon header-icon-3"><i class="fas fa-brush"></i></a>
        <a href="#" data-menu="menu-main" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a> -->
    </div>
    <div id="footer-bar" class="footer-bar-5">
        <a href="index-components.html"><i data-feather="heart" data-feather-line="1" data-feather-size="21" data-feather-color="red2-dark" data-feather-bg="red2-fade-light"></i><span>Features</span></a>
        <a href="index-media.html"><i data-feather="image" data-feather-line="1" data-feather-size="21" data-feather-color="green1-dark" data-feather-bg="green1-fade-light"></i><span>Media</span></a>
        <a href="index.html"><i data-feather="home" data-feather-line="1" data-feather-size="21" data-feather-color="blue2-dark" data-feather-bg="blue2-fade-light"></i><span>Home</span></a>
        <a href="index-pages.html" class="active-nav"><i data-feather="file" data-feather-line="1" data-feather-size="21" data-feather-color="brown1-dark" data-feather-bg="brown1-fade-light"></i><span>Pages</span></a>
        <a href="index-settings.html"><i data-feather="settings" data-feather-line="1" data-feather-size="21" data-feather-color="gray2-dark" data-feather-bg="gray2-fade-light"></i><span>Settings</span></a>
    </div>
    
    <div class="page-content">
        
        <div class="page-title page-title-small">
            <!-- <h2>
                <a href="#" data-back-button><i class="fa fa-arrow-left"></i></a>
                Selamat Pagi
            </h2> -->
            <iframe class="embed-responsive-item" style="border: none;margin-top: -15px;margin-bottom: -30px;" src="{{url('/Base/')}}/clock.html"></iframe>
            <!-- <a href="#" data-menu="menu-main" class="bg-fade-gray1-dark shadow-xl preload-img" data-src="{{url('/azure')}}/images/avatars/5s.png"></a> -->
        </div>
        <div class="card header-card shape-rounded" data-card-height="150">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
            <div class="card-bg preload-img" data-src="{{$data['user']->profile_photo_path}}"></div>
        </div>
        
        <div class="card card-style">
            <div class="d-flex content mb-1">
                <!-- left side of profile -->
                <div class="flex-grow-1">
                    <h1 class="font-700">{{$data['user']->name}}<i class="fa fa-check-circle color-blue2-dark float-right font-13 mt-2 mr-3"></i></h1>
                    <p class="mb-2">
                    {{$data['user']->jabatan}}
                    </p>
                    <p class="font-10">
                        <strong class="color-theme pr-1">NIP</strong>{{$data['user']->nip}}
                        <strong class="color-theme pl-3 pr-1">email</strong>{{$data['user']->email}}
                    </p>
                </div>
                <!-- right side of profile. increase image width to increase column size-->
                <img src="{{$data['user']->profile_photo_path}}" data-src="{{$data['user']->profile_photo_path}}" width="115" class="bg-highlight rounded-circle mt-3 shadow-xl preload-img">
            </div>
            <!-- follow buttons-->
            <style>
                .hie{
                    display: none !important;
                }
                .hila{
                    display: none !important;
                }
            </style>
            <div class="content">
                <div class="row mb-0">
                    <div class="col-12 " id="tmasuk">
                        <button href="#" class="btn btn-full btn-sm rounded-s text-uppercase font-900 bg-blue2-dark"  onclick="window.location.replace('{{url("/dam")}}');">Presensi Masuk</button>
                    </div>
                    <div class="col-12 hie" id="tpulang">
                        <a href="#" class="btn btn-full btn-sm btn-border rounded-s text-uppercase font-900 color-highlight border-blue2-dark" onclick="fas()">Presensi pulang</a>
                    </div>
                </div>
            </div>
            <div class="divider mb-3 mt-1">aass</div>
            <script>
                function los(params) {
                            Tanggal = new Date().getDate();
                            Bulan = new Date().getMonth()+1;
                            Tahun = new Date().getFullYear();
                            cadi='0'+Bulan+'-0'+Tanggal+'-'+Tahun
                            fetch("{{url('/req/sen3?vas=')}}"+cadi, {
                                method: 'GET',
                            }).then((response) => response.json())
                            .then((data) => {
                                if (data.status==true) {
                                    document.getElementById('tmasuk').classList.toggle('hie');
                                    // document.getElementById('moska').classList.toggle('neka2');
                                }else{
                                    document.getElementById('tpulang').classList.toggle('hie');
                                }
                            });
                            fetch("{{url('/req/sen4?vas=')}}"+cadi, {
                                method: 'GET',
                            }).then((response) => response.json())
                            .then((data) => {
                                // alert(data.status)
                                if (!data.status==true) {
                                    document.getElementById('tpulang').classList.toggle('hie');
                                    // document.getElementById('moska').classList.toggle('neka3');

                                }
                            });

                    menit = new Date().getMinutes();
                    jam = new Date().getHours();
                    set_open="{{$data['setting']['jam-absen-masuk-open']->value}}"
                    set_close="{{$data['setting']['jam-absen-masuk-close']->value}}"
                    das_open="{{$data['setting']['jam-absen-keluar-open']->value}}"
                    das_close="{{$data['setting']['jam-absen-keluar-close']->value}}"
                        console.log(jam+'.'+menit,set_open,set_close,das_open,das_close)
                        if ((jam+'.'+menit>=set_open)&&(set_close<=jam+'.'+menit)) {
                            document.getElementById('tmasuk').classList.toggle('hila');
                        }else{
                            console.log('saty gagal',jam+'.'+menit>=set_open,jam+'.'+menit<=set_close,jam+'.'+menit,set_close)
                        }

                        if ((jam+'.'+menit>=das_open)&&(das_close<=jam+'.'+menit)) {
                            document.getElementById('tpulang').classList.toggle('hila');
                        }else{
                            console.log('dua gagal',jam+'.'+menit>=das_open,jam+'.'+menit<=das_close)
                        }
                }

                los();

                function fas() {
                    fetch("{{url('/req/sen2')}}", {
                        method: 'GET',
                    }).then((response) => response.json())
                    .then((data) => {
                        // document.getElementById('ocuka').click()
                        // document.getElementById('onl2').click()
                        document.getElementById('tpulang').classList.toggle('hila');
                    });
                }
            </script>
            <div class="p-3">
                <div class="row text-center row-cols-3 mb-n4">
                            @foreach ($data['dam'] as $key=>$vel )
                            
                            <a class="col mb-4" data-lightbox="gallery-1" href="{{$vel->bukti_masuk}}" title="{{$vel->keterangan}},{{$vel->jam_masuk}}">
                                <img data-src="{{$vel->bukti_masuk}}" class="img-fluid rounded-xs preload-img" alt="{{$vel->keterangan}},{{$vel->jam_masuk}}">
                            </a>
           
                            @endforeach
                </div>
            </div>
        </div>
        <div class="card card-style">
            <div data-card-height="500" class="card shadow-l mb-0 bg-18">
                <div class="card-bottom ml-3">
                    <p class="color-white font-10 opacity-80 mb-n1"><i class="far fa-calendar"></i> August 28 <i class="ml-3 far fa-clock"></i> 09:00 PM</p>
                    <p class="color-white font-10 opacity-80 mb-2"><i class="fa fa-map-marker-alt"></i> Melbourne, Victoria, Australia Collins Street</p>
                </div>
                <div class="card-overlay bg-gradient opacity-90"></div>
            </div>  
            <div class="content mb-0">
                <div class="float-left">
                    <h1 class="mb-n1">Classic Event Card</h1>
                    <p class="font-10 mb-2 pb-1"><i class="fa fa-map-marker-alt mr-2"></i>Melbourne Victoria, Collins Street</p>
                </div>
                <a href="#" class="float-right btn btn-s bg-highlight rounded-xl shadow-xl text-uppercase font-900 font-11 mt-2 mb-2">View on Map</a>
            </div>
        </div>
       
        <!-- footer and footer card-->
        <!-- <div class="footer" data-menu-load="menu-footer.html"></div>   -->
    </div>    
    <!-- end of page content-->
        
</div>    


<script type="text/javascript" src="{{url('/azure')}}/scripts/jquery.js"></script>
<script type="text/javascript" src="{{url('/azure')}}/scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('/azure')}}/scripts/custom.js"></script>
</body>
