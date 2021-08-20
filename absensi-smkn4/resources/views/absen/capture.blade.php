<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>



    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button>

  <!-- Modal -->
  <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           <div class="card w-50">

            <div class="col-6">


            </div>
            <div class="col-6">

              <video id="video" width="100%" height="480" autoplay></video>
              <button id="snap">Snap Photo</button>
              <canvas id="canvas" style="display: none;" width="640" height="480"></canvas>
              <form action="" method="post" enctype="multipart/form-data">

              <input type="file" name="foto" id="foto" value="">

              <button type="submit">Kirim</button>
              </form>

            </div>
           </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
      // Grab elements, create settings, etc.
      var video = document.getElementById('video');

      // Get access to the camera!
      if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
          // Not adding `{ audio: true }` since we only want video now
          navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
              //video.src = window.URL.createObjectURL(stream);
              video.srcObject = stream;
              video.play();
          });
      }

      /* Legacy code below: getUserMedia
      else if(navigator.getUserMedia) { // Standard
          navigator.getUserMedia({ video: true }, function(stream) {
              video.src = stream;
              video.play();
          }, errBack);
      } else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
          navigator.webkitGetUserMedia({ video: true }, function(stream){
              video.src = window.webkitURL.createObjectURL(stream);
              video.play();
          }, errBack);
      } else if(navigator.mozGetUserMedia) { // Mozilla-prefixed
          navigator.mozGetUserMedia({ video: true }, function(stream){
              video.srcObject = stream;
              video.play();
          }, errBack);
      }
      */

      var canvas = document.getElementById('canvas');
      var context = canvas.getContext('2d');
      var video = document.getElementById('video');
      var doc = document.getElementById('foto');
      // Trigger photo take
      document.getElementById("snap").addEventListener("click", function() {
          context.drawImage(video, 0, 0, 640, 480);
          var canvas = document.querySelector('#canvas');
          var dataURL = canvas.toDataURL("image/jpeg", 1.0);
          // 	downloadImage(dataURL,""
          // doc.value = dataURL;
          // console.log(doc.value);
          downloadImage(dataURL,  'context.jpeg');
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
</html>
