
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
        <!-- <a href="#" data-back-button class="header-title header-subtitle">Back to Pages</a> -->
        <a href="#" data-back-button class="header-icon header-icon-1 ml-1">Presensi</i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-2 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-2 show-on-theme-light"><i class="fas fa-moon"></i></a>
        <!-- <a href="#" data-menu="menu-highlights" class="header-icon header-icon-3"><i class="fas fa-brush"></i></a> -->
        <!-- <a href="#" data-menu="menu-main" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a> -->
    </div>
    @include('assetabsen/navbar')
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
                    <div class="col-12 hie" id="tmasuk">
                        <button href="#" class="btn btn-full btn-sm rounded-s text-uppercase font-900 bg-blue2-dark"  onclick="window.location.replace('{{url("/dam")}}');">Presensi Masuk</button>
                    </div>
                    <div class="col-12 hie" id="tpulang">
                        <a href="#" class="btn btn-full btn-sm btn-border rounded-s text-uppercase font-900 color-highlight border-blue2-dark" onclick="fas()">Presensi pulang</a>
                    </div>
                </div>
            </div>
            <!-- <div class="alert alert-primary" role="alert">
                Absen DI Buka {{$data['setting']['jam-absen-masuk-open']->value}}.00
            </div> -->
            <div class="divider mb-3 mt-1"></div>
            <script>
                function los(params) {
                            Tanggal = new Date().getDate();
                            Bulan = new Date().getMonth()+1;
                            Tahun = new Date().getFullYear();
                            cadi=Bulan+'-'+Tanggal+'-'+Tahun
                            fetch("{{url('/req/sen3?vas=')}}"+cadi, {
                                method: 'GET',
                            }).then((response) => response.json())
                            .then((data) => {
                                if (data.status==true) {
                                    document.getElementById('tpulang').classList.toggle('hie');
                                    // document.getElementById('moska').classList.toggle('neka2');
                                }else{
                                    document.getElementById('tmasuk').classList.toggle('hie');
                                }
                            });

                            // fetch("{{url('/req/sen4?vas=')}}"+cadi, {
                            //     method: 'GET',
                            // }).then((response) => response.json())
                            // .then((data) => {
                            //     // alert(data.status)
                            //     if (!data.status==true) {
                            //         document.getElementById('tpulang').classList.toggle('hie');
                            //         // document.getElementById('moska').classList.toggle('neka3');

                            //     }
                            // });

                    menit = new Date().getMinutes();
                    jam = new Date().getHours();
                    set_open="{{$data['setting']['jam-absen-masuk-open']->value}}"
                    set_close="{{$data['setting']['jam-absen-masuk-close']->value}}"
                    das_open="{{$data['setting']['jam-absen-keluar-open']->value}}"
                    das_close="{{$data['setting']['jam-absen-keluar-close']->value}}"
                        console.log((jam+'.'+menit<=das_open));
                        console.log((das_close>=jam+'.'+menit));
                        // console.log(jam+'.'+menit,set_open,jam+'.'+menit,set_close);
                        // console.log(jam+'.'+menit,set_open,set_close,das_open,das_close,'die')
                        if ((jam+'.'+menit>=set_open)&&(jam+'.'+menit<=set_close)) {
                            document.getElementById('tmasuk').classList.toggle('hila');
                        }else{
                            console.log('satu gagal',jam+'.'+menit>=set_open,jam+'.'+menit<=set_close,jam+'.'+menit,set_close)
                        }

                        if ((jam+'.'+menit<=das_open)&&(das_close>=jam+'.'+menit)) {
                            document.getElementById('tpulang').classList.toggle('hila');
                        }else{
                            console.log(jam+'.'+menit,das_open);
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

        @include('absen/chart')
       
        <!-- footer and footer card-->
        <div class="footer" data-menu-load="{{url('/azure')}}/menu-footer.html"></div>  
    </div>    
    <!-- end of page content-->
        
</div>    


<script type="text/javascript" src="{{url('/azure')}}/scripts/jquery.js"></script>
<script type="text/javascript" src="{{url('/azure')}}/scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('/azure')}}/scripts/custom.js"></script>
</body>
