
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Absen</title>
    <style>
    body{
        width: 100vw;
        height: 100vh;
        overflow: hidden;
    }
    .c1{
    max-width: 100vw;
    max-height: 10vh;
    min-width: 10vh;
    min-height: 10vh;
    }
    .t{
    max-width: 100vw;
    max-height: 75vh;
    min-width: 10vh;
    min-height: 75vh;
    }

    .c2{
        max-width: 100vw;
        max-height: 10vh;
        min-width: 10vh;
        min-height: 10vh;
    }

    .hilang{
        display: none;
    }
    </style>
</head>

<body class="text-center">
                <canvas id="canvas" width="640" height="480" class="text-center c1" style="display: none;"></canvas>
                <form action="{{url('/req/sen1/')}}" method="post" class="form-grup" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3 bt-2">
                            <label for="Status" class="form-label">Status</label><br>
                            <select name="keterangan" class="custom-select col-md-12 " style="font-size: 50px;" id="Status" onchange="cekLokasi()" required>
                                
                                @if (!empty($pengajuan->deskripsi)))
                                <option value="{{$pengajuan->cren}}">{{$pengajuan->cren}}</option>                                    
                                @endif

                                <option value="Kantor">KANTOR</option>
                            </select>
                            <div id="me"></div>
                        </div>
                    <input type="file" class="form-control" name="foto" id="foto" style="display: none;">
                    <button class="btn btn-outline-success w-80" style="display: none; width: 100vw;" type="submit" id="paladinmas">Kirim</button>
                </form>
                <video id="video" class="card t" autoplay></video>
                <h3 class="col-md-12 alert alert-lg alert-primary c2 hilang" id="snap2">
                Harap Pertahankan Posisi Anda
                </h3>
                <button type="button" style="display: block;width: 100vw;" class="col-md-12 btn btn-lg btn-primary c2" id="snap" onclick="linkar()"><i class="fas fa-camera fa-3x"></i></button>
    <!-- Optional JavaScript; choose one of the two! -->
                <script>
                        function linkar() {
                            document.getElementById('snap').classList.toggle('hilang')
                            document.getElementById('snap2').classList.toggle('hilang')
                            
                        }
                </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
    function cekLokasi() {
    console.log("cekLokasi");
        if(document.getElementById("Status").value == "Kantor"){
            console.log('masuk');
            if(navigator.geolocation){

            navigator.geolocation.getCurrentPosition(async (position) => {
            const {longitude, latitude} = position.coords
            console.log({longitude, latitude}, "$$$$");


            //reverse Geocode
            //ArcGis
            const response = await fetch(`https://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer/reverseGeocode?f=pjson&featureTypes=&location=${longitude},${latitude}`);

            //SMKN 4 lat long
            // const response = await fetch(`https://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer/reverseGeocode?f=pjson&featureTypes=&location=106.824705215847,-6.640719063919977`);
            const data = await response.json();

            console.log(data, "$$$$");

            // if (data.address.Match_addr == "SMK Negeri 4 Bogor" || data.address.Match_addr == "Jalan Royal Boulevard 2-8, Bogor Selatan, Bogor Kota, Jawa Barat, 16134"){
            //     alert(data.address.Match_addr)
            //     document.getElementById("snap").style.display="block";
            // }
            var asd=JSON.stringify(data.address);
            // document.write(asd);
            if (data.address.Postal == "16137"){
                // alert(data.address.Neighborhood)
                document.getElementById("snap").style.display="block";
            }
            else{
                // alert(data.address)
                alert("Anda Belum Berada Di Area SMKN 4 Kota Bogor");            
                document.getElementById("snap").style.display="none";
            }
            });
            }
           
    } else{
                document.getElementById("snap").style.display="block";
            }
        }
    </script>
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
        var hex=document.querySelectorAll('video')[0].clientHeight
        var wit=document.querySelectorAll('video')[0].clientWidth
        document.getElementById("snap").addEventListener("click", function() {

            context.drawImage(video, 0, 0,640,480);
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
        cekLokasi()
    </script>

</body>

</html>
