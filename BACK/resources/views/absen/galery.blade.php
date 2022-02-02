<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>Azures BootStrap</title>
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/azure/styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/azure/styles/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
    <link rel="manifest" href="{{url('/')}}/_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="{{url('/')}}/azure/app/icons/icon-192x192.png">
  </head>
  <body class="theme-light" data-highlight="blue2">
    <div id="preloader">
      <div class="spinner-border color-highlight" role="status"></div>
    </div>
    <div id="page">
      @include('assetabsen/navbar')
      <div class="page-content">
        <div class="page-title page-title-small">
          <h2>
            <a href="{{url('/absen')}}" data-back-button>
              <i class="fa fa-arrow-left"></i>
            </a>Kembali
          </h2>
          {{-- <a href="#" data-menu="menu-main" class="bg-fade-gray1-dark shadow-xl preload-img" data-src="{{url('/')}}/azure/images/avatars/5s.png"></a> --}}
        </div>
        <div class="card header-card shape-rounded" data-card-height="150">
          <div class="card-overlay bg-highlight opacity-95"></div>
          <div class="card-overlay dark-mode-tint"></div>
          <div class="card-bg preload-img" data-src="{{url('/')}}/azure/images/pictures/20s.jpg"></div>
        </div>
        <div class="card card-style">
          {{-- <div class="d-flex content mb-1">
            <!-- left side of profile -->
            <div class="flex-grow-1">
              <h1 class="font-700">Karla Black <i class="fa fa-check-circle color-blue2-dark float-right font-13 mt-2 mr-3"></i>
              </h1>
              <p class="mb-2"> Karla Black is a name used when you generate a text with an annonymous name. </p>
              <p class="font-10">
                <strong class="color-theme pr-1">1k</strong>Followers <strong class="color-theme pl-3 pr-1">342</strong>Following
              </p>
            </div>
            <!-- right side of profile. increase image width to increase column size-->
            <img src="{{url('/')}}/azure/images/empty.png" data-src="{{url('/')}}/azure/images/avatars/4s.png" width="115" class="bg-highlight rounded-circle mt-3 shadow-xl preload-img">
          </div> --}}
          <!-- follow buttons-->
          {{-- <div class="content">
            <div class="row mb-0">
              <div class="col-6">
                <a href="#" class="btn btn-full btn-sm rounded-s text-uppercase font-900 bg-blue2-dark">Follow</a>
              </div>
              <div class="col-6">
                <a href="#" class="btn btn-full btn-sm btn-border rounded-s text-uppercase font-900 color-highlight border-blue2-dark">Message</a>
              </div>
            </div>
          </div> --}}
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
        <!-- footer and footer card-->
        <div class="footer" data-menu-load="{{url('/')}}/foot"></div>
      </div>
      <!-- end of page content-->
      <div id="menu-share" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-load="{{url('/')}}/azure/menu-share.html" data-menu-height="420" data-menu-effect="menu-over"></div>
      <div id="menu-highlights" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-load="{{url('/')}}/azure/menu-colors.html" data-menu-height="510" data-menu-effect="menu-over"></div>
      <div id="menu-main" class="menu menu-box-right menu-box-detached rounded-m" data-menu-width="260" data-menu-load="{{url('/')}}/azure/menu-main.html" data-menu-active="nav-pages" data-menu-effect="menu-over"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    {{-- <script type="text/javascript" src="{{url('/')}}/azure/scripts/jquery.js"></script> --}}
    <script type="text/javascript" src="{{url('/')}}/azure/scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/azure/scripts/custom.js"></script>
  </body>