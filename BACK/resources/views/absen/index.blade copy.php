@extends('assetabsen/master')
@section('conten1')
{{-- <div id="preloader">
    <div class="spinner-border color-highlight" role="status"></div>
</div> --}}
  <div id="page">
    <!-- header and footer bar go here-->
    <div class="header header-fixed header-auto-show header-logo-app">
      <!-- <a href="#" data-back-button class="header-title header-subtitle">Back to Pages</a> -->
      <a href="#" data-back-button class="header-icon header-icon-1 ml-1">Presensi </i>
      </a>
      <a href="#" data-toggle-theme class="header-icon header-icon-2 show-on-theme-dark">
        <i class="fas fa-sun"></i>
      </a>
      <a href="#" data-toggle-theme class="header-icon header-icon-2 show-on-theme-light">
        <i class="fas fa-moon"></i>
      </a>
      <!-- <a href="#" data-menu="menu-highlights" class="header-icon header-icon-3"><i class="fas fa-brush"></i></a> -->
      <!-- <a href="#" data-menu="menu-main" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a> -->
    </div> @include('assetabsen/navbar') <div class="page-content">
      <div class="page-title page-title-small">
        <h2>
          <a href="#" data-back-button>
            <i class="fa fa-arrow-left"></i>
          </a> Selamat Pagi
        </h2>
        <a href="#" data-menu="menu-main" class="bg-fade-gray1-dark shadow-xl preload-img" data-src="{{url('/azure')}}/images/avatars/5s.png"></a>
      </div>
      <div class="card header-card shape-rounded" data-card-height="150">
        <div class="card-overlay bg-highlight opacity-95"></div>
        <div class="card-overlay dark-mode-tint"></div>
        <div class="card-bg preload-img" data-src="{{url('/storage')}}/{{$data['user']->profile_photo_path}}"></div>
      </div>
      <div class="card card-style">
        <div class="d-flex content mb-1">
          <!-- left side of profile -->
          <div class="flex-grow-1">
            <h1 class="font-700">{{$data['user']->name}}
              <i class="fa fa-check-circle color-blue2-dark float-right font-13 mt-2 mr-3"></i>
            </h1>
            <p class="mb-2">
              {{$data['user']->jabatan}}
              <br>SMKN 4 Kota Bogor
            </p>
            <p class="font-10">
              {{-- <strong class="color-theme pr-1">NIK</strong>{{$data['user']->nip}} --}} <strong class="color-theme pl-3 pr-1">EMAIL</strong>{{$data['user']->email}}
            </p>
          </div>
          <!-- right side of profile. increase image width to increase column size-->
          <img src="{{url('/storage')}}/{{$data['user']->profile_photo_path}}" data-src="{{url('/storage')}}/{{$data['user']->profile_photo_path}}" style="height: 100px;
                  width: 200px;" class="bg-highlight rounded-circle mt-3 shadow-xl preload-img">
        </div>
        <!-- follow buttons-->
        <style>
          .hie {
            display: none !important;
          }
  
          .hila {
            display: none !important;
          }
        </style> @if (date('H.i')>=$data['setting']['jam-absen-masuk-close']->value) <div class="alert alert-primary" role="alert"> Presensi Pulang di Buka Pada {{$data['setting']['jam-absen-keluar-open']->value}}
          <br> Harap Menekan Lonceng Biru
        </div> @else <div class="alert alert-warning" role="alert"> Presensi Masuk di Buka Pada {{$data['setting']['jam-absen-masuk-open']->value}}
          <br> Harap Menekan Lonceng Kuning
        </div> @endif <div class="divider "></div>
        <div class="p-3">
          <div class="row text-center row-cols-12 ">
            <div class="content">
              <div class="row mb-0">
                <div class="col-12 hie hila" id="tmasuk">
                  <button style="height: 100px;width: 300px;" href="#" class="btn rounded-s text-uppercase font-900 bg-blue1-light" onclick="window.location.replace('{{url("/dam")}}');">
                    <i class="fas fa-bell animate__animated animate__swing swing " style="font-size: 90px;"></i>
                  </button>
                </div>
                <div class="col-12 hie hila" id="tpulang">
                  <button style="height: 100px;width: 300px;" href="#" class="btn rounded-s text-uppercase font-900 bg-blue1-light" onclick="fas()">
                    <i class="fas fa-bell animate__animated animate__swing swing " style="font-size: 90px;"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
        Tanggal = new Date().getDate();
        Bulan = new Date().getMonth() + 1;
        Tahun = new Date().getFullYear();
        cadi = Bulan + '-' + Tanggal + '-' + Tahun
  
        function los(params) {
          fetch("{{url('/req/sen3?vas=')}}" + cadi, {
            method: 'GET',
          }).then((response) => response.json()).then((data) => {
            if (data.status == true) {
              document.getElementById('tpulang').classList.toggle('hie');
              // document.getElementById('tpulang').classList.toggle('hila');
              // document.getElementById('moska').classList.toggle('neka2');
            } else {
              document.getElementById('tmasuk').classList.toggle('hie');
            }
          });
          fetch("{{url('/req/sen4?vas=')}}" + cadi, {
            method: 'GET',
          }).then((response) => response.json()).then((data) => {
            // alert(data.status)
            if (!data.status == true) {
              document.getElementById('tpulang').classList.toggle('hie');
              // document.getElementById('moska').classList.toggle('neka3');
            }
          });
          menit = new Date().getMinutes();
          jam = new Date().getHours();
          set_open = "{{$data['setting']['jam-absen-masuk-open']->value}}"
          set_close = "{{$data['setting']['jam-absen-masuk-close']->value}}"
          das_open = "{{$data['setting']['jam-absen-keluar-open']->value}}"
          das_close = "{{$data['setting']['jam-absen-keluar-close']->value}}"
          // console.log((jam+'.'+menit>=set_open));
          // console.log((jam+'.'+menit,set_close));
          // console.log(jam+'.'+menit,set_open,jam+'.'+menit,set_close);
          // console.log(jam+'.'+menit,set_open,set_close,das_open,das_close,'die')
          if ((parseFloat(jam + '.' + menit) >= parseFloat(set_open)) && (parseFloat(jam + '.' + menit) <= parseFloat(set_close))) {
            document.getElementById('tmasuk').classList.toggle('hila');
          } else {
            console.log((parseFloat(jam + '.' + menit) >= parseFloat(set_open)), (parseFloat(jam + '.' + menit) <= parseFloat(set_close)));
            // console.log('satu gagal',jam+'.'+menit>=set_open,jam+'.'+menit<=set_close,jam+'.'+menit,set_close)
          }
          if ((parseFloat(jam + '.' + menit) >= parseFloat(das_open)) && (parseFloat(das_close) >= parseFloat(jam + '.' + menit))) {
            document.getElementById('tpulang').classList.toggle('hila');
            document.getElementById('tpulang').classList.toggle('hie');
          } else {
            console.log(jam + '.' + menit, das_open);
            console.log('dua gagal', jam + '.' + menit >= das_open, jam + '.' + menit <= das_close)
          }
        }
        los();
  
        function fas() {
          fetch("{{url('/req/sen2')}}?vas=" + cadi, {
            method: 'GET',
          }).then((response) => response.json()).then((data) => {
            // document.getElementById('ocuka').click()
            // document.getElementById('onl2').click()
            document.getElementById('tpulang').classList.toggle('hila');
            window.location.replace('{{url("/absen")}}');
          });
        }
      </script> @include('absen/chart')
      <!-- char here -->
      <!-- footer and footer card-->

    </div>
    <!-- end of page content-->
    <script>
        var lias = document.getElementsByClassName('swing');
        setInterval(() => {
          for (let index = 0; index < lias.length; index++) {
            console.log(index);
            const element = lias[index];
            element.classList.toggle('animate__swing');
          }
        }, 1000);
      </script>
</div>    
@endsection

