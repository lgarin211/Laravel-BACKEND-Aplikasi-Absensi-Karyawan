  <div class="header header-fixed header-auto-show header-logo-app">
    <a href="{{url('/azure')}}/#" data-toggle-theme class="header-icon header-icon-2 show-on-theme-dark"><i class="fas fa-sun"></i></a>
    <a href="{{url('/azure')}}/#" data-toggle-theme class="header-icon header-icon-2 show-on-theme-light"><i class="fas fa-moon"></i></a>
  </div>
  <div id="footer-bar" class="footer-bar-5">

    {{-- @dump(Auth::user()->jabatan) --}}
  @if (Auth::user()->jabatan=="KEPALA SEKOLAH")
  <a href="{{url('/kepsek/pen')}}">
  <i data-feather="calendar" data-feather-line="1" data-feather-size="21" data-feather-color="blue2-dark" data-feather-bg="blue2-fade-light"></i>
  <span>Present</span>
  </a>
  <a href="{{url('/kepsek/ten')}}">
  <i data-feather="calendar" data-feather-line="1" data-feather-size="21" data-feather-color="blue2-dark" data-feather-bg="blue2-fade-light"></i>
  <span>Not Present</span>
  </a>
  <a href="#" onclick="alert('Halaman Dalam Tahap Pengembangan')">
  <i data-feather="calendar" data-feather-line="1" data-feather-size="21" data-feather-color="blue2-dark" data-feather-bg="blue2-fade-light"></i>
  <span>Pengajuan</span>
  </a>
  <a href="#" onclick="alert('Halaman Dalam Tahap Pengembangan')">
  <i data-feather="calendar" data-feather-line="1" data-feather-size="21" data-feather-color="blue2-dark" data-feather-bg="blue2-fade-light"></i>
  <span>Laporan</span>
  </a>
  @else

  <a href="{{url('/menu2')}}">
  <i data-feather="file" data-feather-line="1" data-feather-size="21" data-feather-color="blue2-dark" data-feather-bg="blue2-fade-light"></i>
  <span>informasi</span>
  </a>
  <a href="{{url('/absen')}}" class="">
  <i data-feather="home" data-feather-line="1" data-feather-size="21" data-feather-color="blue2-dark" data-feather-bg="blue2-fade-light"></i>
  <span>Home</span>
  </a>

  <a href="{{url('/menu1')}}">
  <i data-feather="calendar" data-feather-line="1" data-feather-size="21" data-feather-color="blue2-dark" data-feather-bg="blue2-fade-light"></i>
  <span>Pengajuan</span>
  </a>

  @endif
  <a href="{{url('/setting')}}">
  <i data-feather="settings" data-feather-line="1" data-feather-size="21" data-feather-color="gray2-dark" data-feather-bg="gray2-fade-light"></i>
  <span>Settings</span>
  </a>
  </div>
