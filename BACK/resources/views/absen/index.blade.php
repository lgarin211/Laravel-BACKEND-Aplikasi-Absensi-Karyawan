<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Tooplate">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
    <title>Absensi Karyawan</title>

    <!-- Bootstrap core CSS -->
    <link href="{{url('/Base/')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{url('/Base/')}}/assets/css/fontawesome.css">
    <link rel="stylesheet" href="{{url('/Base/')}}/assets/css/tooplate-main.css">
    <link rel="stylesheet" href="{{url('/Base/')}}/assets/css/owl.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .neka {
            display: none;
        }

        .neka2 {
            display: none;
        }

        .neka3 {
            display: none;
        }

        .domi {
            display: none;
        }
    </style>
    <script>
    </script>
</head>

<body>
    <div class="sequence">
        <div class="seq-preloader">
            <svg width="39" height="16" viewBox="0 0 39 16" xmlns="http://www.w3.org/2000/svg"
                class="seq-preload-indicator">
                <g fill="#F96D38">
                    <path class="seq-preload-circle seq-preload-circle-1"
                        d="M3.999 12.012c2.209 0 3.999-1.791 3.999-3.999s-1.79-3.999-3.999-3.999-3.999 1.791-3.999 3.999 1.79 3.999 3.999 3.999z" />
                    <path class="seq-preload-circle seq-preload-circle-2"
                        d="M15.996 13.468c3.018 0 5.465-2.447 5.465-5.466 0-3.018-2.447-5.465-5.465-5.465-3.019 0-5.466 2.447-5.466 5.465 0 3.019 2.447 5.466 5.466 5.466z" />
                    <path class="seq-preload-circle seq-preload-circle-3"
                        d="M31.322 15.334c4.049 0 7.332-3.282 7.332-7.332 0-4.049-3.282-7.332-7.332-7.332s-7.332 3.283-7.332 7.332c0 4.05 3.283 7.332 7.332 7.332z" />
                </g>
            </svg>
        </div>
    </div>
    <div class="logo">
        <h1>SMKN 4 Bogor <i class="fa fa-braille" style="font-size:30px;color:red"></i></h1>
        <h2><i class="fa fa-braille" style="font-size:30px;color:red"></i></h2>
    </div>
    <nav>
        <ul>
            <li><a href="#1"><img src="{{url('/Base/')}}/assets/images/icon-1.png" alt=""> <em>Home</em></a></li>
            <li><a href="#2"><img src="{{url('/Base/')}}/assets/images/icon-2.png" alt="" id="onl2"> <em>Laporan
                        Saya</em></a>
            </li>
            <li><a href="#3"><img src="{{url('/Base/')}}/assets/images/icon-3.png" alt=""> <em>Lampiran Absensi</em></a>
            </li>
            <li><a href="#4"><img src="{{url('/Base/')}}/assets/images/icon-4.png" alt=""> <em>Bantuan</em></a></li>
        </ul>
    </nav>

    <div class="slides">
        <div class="slide" id="1">
            <div id="slider-wrapper">
                <div id="image-slider">
                    <ul>
                        <li class="active-img" id="c_profile">
                            <div class="slide-caption">
                                <h6>{{ Auth::user()->jabatan }}</h6>
                                <h2><span style="font-size: 30px;">{{ Auth::user()->name }}</span><br>Gelar</h2>
                            </div>
                        </li>
                        <li id="c_masuk">
                            <div class="slide-caption">
                                <div class="rounded embed-responsive embed-responsive-21by9">
                                    <iframe class="embed-responsive-item" src="{{url('/Base/')}}/clock.html"></iframe>
                                </div>
                                <h6>Absen Masuk</h6>
                                <h2 style="font-size: 30px;">Absen DI Buka
                                    <br>{{$data['setting']['jam-absen-masuk-open']->value}}.00</h2>

                                    
                                <button type="button" id="nas1" class="btn btn-lg btn-primary neka" data-toggle="modal"
                                    data-target="#modalmasuk">
                                    Isi Daftar Hadir
                                </button>
                            </div>
                        </li>
                        <li id="c_keluar">
                            <div class="slide-caption">
                                <div class="rounded embed-responsive embed-responsive-21by9">
                                    <iframe class="embed-responsive-item" src="{{url('/Base/')}}/clock.html"></iframe>
                                </div>
                                <h6>Absen Keluar</h6>
                                <h2 style="font-size: 30px;">Absen DI Buka
                                    <br>{{$data['setting']['jam-absen-keluar-open']->value}}.00</h2>
                                <a href="#" id="nas2" class="btn btn-primary btn-lg neka" onclick="fas()">Isi Daftar
                                    Keluar</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="thumbnail">
                    <ul>
                        <li class="active"><img id="ocuka" class="rounded" src="{{ Auth::user()->profile_photo_path }}"
                                alt="Earth" /></li>
                        <li><img id="mosku" class="rounded domi" src="{{url('/Base/')}}/assets/images/Masuk.png"
                                alt="Meeting" /></li>
                        <li><img id="moska" class="rounded domi neka" src="{{url('/Base/')}}/assets/images/Keluar.png"
                                alt="Smart" /></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="slide" id="2">
            <div class="content second-content">
                <div id='tabs'>
                    <ul>
                        <li><a href='#tabs-1'><span class='fa fa-desktop'></span></a></li>
                        <li><a href='#tabs-2'><span class='fa fa-users'></span></a></li>
                        <li><a href='#tabs-3'><span class='fa fa-mobile'></span></a></li>
                    </ul>
                    <section class='tabs-content'>
                        <article id='tabs-1'>
                            <h2>Jam Pekerjaan</h2>
                            <span>8,25/4000 Jam</span>
                            <div class="text-center">
                                <div class="rounded embed-responsive embed-responsive-21by9">
                                    <iframe class="embed-responsive-item" src="{{url('/Base/')}}/chart.html"></iframe>
                                </div>
                            </div>
                        </article>
                        <article id='tabs-2'>
                            <h2>Laporan Absensi</h2>
                            <div class="text-center">
                                <div class="rounded embed-responsive embed-responsive-21by9">
                                    <iframe class="embed-responsive-item" src="{{url('/')}}/req/sen5"></iframe>
                                </div>
                            </div>
                        </article>
                        <article id='tabs-3'>
                            belum tau mau di isi apa
                            <!-- <h2>Who We Are?</h2>
              <span>Etiam tempus ex ut mi</span>
              <p>Vivamus dictum odio at enim posuere, et dapibus nunc sagittis. Pellentesque habitant morbi tristique
                senectus et netus et malesuada fames ac turpis egestas.</p>
              <p>Integer a egestas tellus, id malesuada velit. Pellentesque tincidunt, libero eu rutrum volutpat, nisi
                urna mollis felis, sed mollis sem libero at magna.</p> -->
                        </article>
                    </section>
                </div>
            </div>
        </div>
        <div class="slide" id="3">
            <div class="content third-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="owl-carousel owl-theme">
                            <!-- here -->
                            @foreach ($data['dam'] as $key=>$vel )
                            <div class="col-md-12">
                                <div class="featured-item">
                                    <a href=""><img src="{{url('/')}}/{{$vel->bukti_masuk}}" alt=""></a>
                                    <div class="down-content">
                                        <h4>{{$vel->keterangan}}</h4>
                                        <h6>{{$vel->jam_masuk}}</h6>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- end -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="slide" id="4">
            <div class="content fourth-content">
                <div class="container-fluid">
                    <form id="contact" action="" method="post">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2>{{$data['setting']['help-contak']->value}}</h2>
                                <p style="color: white;">{{$data['setting']['help-contak']->value1}}</p>
                            </div>
                            <h2 class="text-center">
                                <a href="https://wa.me/{{$data['setting']['help-contak']->value2}}"
                                    class="btn btn-success" target="blank">Hubungi
                                    {{$data['setting']['help-contak']->value3}}</a>
                            </h2>
                            <!-- <div class="col-md-6">
                <fieldset>
                  <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required="">
                </fieldset>
              </div>
              <div class="col-md-6">
                <fieldset>
                  <input name="email" type="text" class="form-control" id="email" placeholder="Your email..."
                    required="">
                </fieldset>
              </div>
              <div class="col-md-12">
                <fieldset>
                  <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..."
                    required=""></textarea>
                </fieldset>
              </div>
              <div class="col-md-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="button">Send Now</button>
                </fieldset>
              </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- modal start -->

    <!-- Modal masuk-->
    <div class="modal fade" id="modalmasuk" tabindex="-1" role="dialog" aria-labelledby="modalmasukLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalmasukLabel">Harap Isi Data Masuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('/req/sen1/')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="Waktu" class="form-label">Waktu Absen Masuk</label>
                            <input type="date" name="waktu" class="form-control" id="Waktu" value="">
                        </div>
                        <div class="mb-3">
                            <label for="Status" class="form-label">Status</label>
                            <select name="keterangan" class="custom-select" id="Status" required>
                                <option value="ONSITE">Onsite</option>
                                <option value="WFH">WFH</option>
                                <option value="Dinas">Dinas</option>
                                <option value="Sakit">Sakit</option>
                                <option value="Izin">Izin</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">Lampiran</label>
                            <input type="file" class="form-control" name="image" id="file" value="" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <a type="a" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="{{url('/Base/')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{url('/Base/')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="{{url('/Base/')}}/assets/js/owl.js"></script>
    <script src="{{url('/Base/')}}/assets/js/accordations.js"></script>
    <script src="{{url('/Base/')}}/assets/js/main.js"></script>

    <script type="text/javascript">
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
                    document.getElementById('moska').classList.toggle('domi');
                    // document.getElementById('moska').classList.toggle('neka2');
                }else{
                    document.getElementById('mosku').classList.toggle('domi');
                }
            });
            fetch("{{url('/req/sen4?vas=')}}"+cadi, {
                method: 'GET',
            }).then((response) => response.json())
            .then((data) => {
                // alert(data.status)
                if (!data.status==true) {
                    document.getElementById('moska').classList.toggle('neka');
                    // document.getElementById('moska').classList.toggle('neka3');

                }
            });
            menit = new Date().getMinutes();
        jam = new Date().getHours();
        set_open="{{$data['setting']['jam-absen-masuk-open']->value}}"
        set_close="{{$data['setting']['jam-absen-masuk-close']->value}}"
        das_open="{{$data['setting']['jam-absen-keluar-open']->value}}"
        das_close="{{$data['setting']['jam-absen-keluar-close']->value}}"

        if ((jam>=set_open)&&(jam<=set_close)) {
            document.getElementById('nas1').classList.toggle('neka');
        }
        if ((jam>=das_open)&&(jam<=das_close)) {
            document.getElementById('nas2').classList.toggle('neka');
        }

        }
        los();
        function fas() {
            fetch("{{url('/req/sen2')}}", {
                method: 'GET',
            }).then((response) => response.json())
            .then((data) => {
                document.getElementById('ocuka').click()
                document.getElementById('onl2').click()
                document.getElementById('moska').classList.toggle('neka');
            });
        }

        $(document).ready(function() {
            // navigation click actions
            $('.scroll-link').on('click', function(event) {
                event.preventDefault();
                var sectionID = $(this).attr("data-id");
                scrollToID('#' + sectionID, 750);
            });
            // scroll to top action
            $('.scroll-top').on('click', function(event) {
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: 0
                }, 'slow');
            });
            // mobile nav toggle
            $('#nav-toggle').on('click', function(event) {
                event.preventDefault();
                $('#main-nav').toggleClass("open");
            });
        });
        function scrollToID(id, speed) {
            var offSet = 0;
            var targetOffset = $(id).offset().top - offSet;
            var mainNav = $('#main-nav');
            $('html,body').animate({
                scrollTop: targetOffset
            }, speed);
            if (mainNav.hasClass("open")) {
                mainNav.css("height", "1px").removeClass("in").addClass("collapse");
                mainNav.removeClass("open");
            }
        }
        if (typeof console === "undefined") {
            console = {
                log: function() {}
            };
        }
    </script>

</body>

</html>
