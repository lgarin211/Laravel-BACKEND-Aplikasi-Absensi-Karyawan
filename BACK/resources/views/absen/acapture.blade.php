<!DOCTYPE HTML>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>Azures BootStrap</title>
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
            <!-- <iframe class="embed-responsive-item" style="border: none;margin-top: -15px;margin-bottom: -30px;" src="{{url('/Base/')}}/clock.html"></iframe> -->
            <!-- <a href="#" data-menu="menu-main" class="bg-fade-gray1-dark shadow-xl preload-img" data-src="{{url('/azure')}}/images/avatars/5s.png"></a> -->
        </div>
        <div class="card header-card shape-rounded" data-card-height="100">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
            <div class="card-bg preload-img" data-src="{{$data['user']->profile_photo_path}}"></div>
        </div>

        <div class="card card-style">
        <div class="container mt-5 card">
        <div class="row text-center">
            <div class="col-sm-12 row">
                <div class="col-md-12 text-center">
                    <video id="video" class="card" style="height: 40vh;width: 100%;" autoplay></video>
                </div>
            </div>
            <div class="col-sm-12">
                <form action="{{url('/req/sen1/')}}" method="post" class="form-grup" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 bt-2">
                            <label for="Status" class="form-label">Status</label><br>
                            <select name="keterangan" class="custom-select col-md-12 form-select" style="font-size: 15px;" id="Status" required>
                                <option value="ONSITE">Onsite</option>
                                <option value="WFH">WFH</option>
                                <option value="Dinas">Dinas</option>
                                <option value="Sakit">Sakit</option>
                                <option value="Izin">Izin</option>
                            </select>
                        </div>
                    <input type="file" class="form-control" name="foto" id="foto" style="display: none;">
                    <button class="btn btn-outline-success w-80" style="display: none;" type="submit" id="paladinmas">Kirim</button>
                </form>
            </div>
            <div class="col-md-12">
                <button type="button" class="col-md-12 btn btn-lg btn-primary" id="snap">Kirim Data</button>
            </div>
        </div>

    </div>

    <canvas id="canvas" height="480" widht="640" class="text-center" style="display: none;"></canvas>

    <!-- Optional JavaScript; choose one of the two! -->

        </div>

        <!-- footer and footer card-->
        <!-- <div class="footer" data-menu-load="menu-footer.html"></div>   -->
    </div>
    <!-- end of page content-->

</div>





<script type="text/javascript" src="{{url('/azure')}}/scripts/jquery.js"></script>
<script type="text/javascript" src="{{url('/azure')}}/scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="{{url('/azure')}}/scripts/custom.js"></script>




    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        // Grab elements, create settings, etc.
        var video = document.getElementById('video');

        // Get access to the camera!
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            // Not adding `{ audio: true }` since we only want video now
            navigator.mediaDevices.getUserMedia({
                video: true
            }).then(function(stream) {
                //video.src = window.URL.createObjectURL(stream);
                video.srcObject = stream;
                video.play();
            });
        } else if (navigator.getUserMedia) { // Standard
            navigator.getUserMedia({
                video: true
            }, function(stream) {
                video.src = stream;
                video.play();
            }, errBack);
        } else if (navigator.webkitGetUserMedia) { // WebKit-prefixed
            navigator.webkitGetUserMedia({
                video: true
            }, function(stream) {
                video.src = window.webkitURL.createObjectURL(stream);
                video.play();
            }, errBack);
        } else if (navigator.mozGetUserMedia) { // Mozilla-prefixed
            navigator.mozGetUserMedia({
                video: true
            }, function(stream) {
                video.srcObject = stream;
                video.play();
            }, errBack);
        }

        function dataURItoBlob(dataURI) {
            // convert base64 to raw binary data held in a string
            // doesn't handle URLEncoded DataURIs - see SO answer #6850276 for code that does this
            var byteString = atob(dataURI.split(',')[1]);

            // separate out the mime component
            var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

            // write the bytes of the string to an ArrayBuffer
            var ab = new ArrayBuffer(byteString.length);
            var ia = new Uint8Array(ab);
            for (var i = 0; i < byteString.length; i++) {
                ia[i] = byteString.charCodeAt(i);
            }

            //Old Code
            //write the ArrayBuffer to a blob, and you're done
            //var bb = new BlobBuilder();
            //bb.append(ab);
            //return bb.getBlob(mimeString);

            //New Code
            return new Blob([ab], {
                type: mimeString
            });


        }

        function FileListItems(files) {
            var b = new ClipboardEvent("").clipboardData || new DataTransfer()
            for (var i = 0, len = files.length; i < len; i++) b.items.add(files[i])
            return b.files
        }

        var canvas = document.getElementById('canvas');
        var context = canvas.getContext('2d');
        var video = document.getElementById('video');
        var doc = document.getElementById('foto');
        // Trigger photo take
        document.getElementById("snap").addEventListener("click", function() {
            context.drawImage(video, 0, 0, 480, 640);
            var canvas = document.querySelector('#canvas');
            var dataURL = canvas.toDataURL("image/jpeg", 1.0);
            // 	downloadImage(dataURL,""
            var blob = dataURItoBlob(dataURL);
            let file = new File([blob], "img.jpg", {
                type: "image/jpeg",
                lastModified: new Date().getTime()
            });
            let container = new DataTransfer();
            // let container = new DataTransfer();
            container.items.add(file);
            doc.files = container.files;
            // downloadImage(file);


            // console.log(doc.value);
            // downloadImage(dataURL,  'context.jpeg');
            document.getElementById('paladinmas').click()
        });

        // 	// Convert canvas to image
        // document.getElementById('btn-download').addEventListener("click", function(e) {
        //     var canvas = document.querySelector('#my-canvas');

        //     var dataURL = canvas.toDataURL("image/jpeg", 1.0);

        //     downloadImage(dataURL, 'my-canvas.jpeg');
        // });
        // // Save | Download image
        function downloadImage(data, filename = 'untitled.jpeg') {
            var a = document.createElement('a');
            a.href = data;
            a.download = filename;
            document.body.appendChild(a);
            a.click();
        }
    </script>
</body>

