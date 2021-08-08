<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>Signin Template · Bootstrap v5.1</title>

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/"> -->


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/apple-touch-icon.png"
        sizes="180x180">
    <link rel="icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32"
        type="image/png">
    <link rel="icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16"
        type="image/png">
    <link rel="manifest" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/safari-pinned-tab.svg"
        color="#7952b3">
    <link rel="icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .clos {
            display: none;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.1/examples/sign-in/signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <main class="form-signin">
        <form method="POST" name="regisba" action="{{url('/api/login')}}">
            <h1 class="h3 mb-3 fw-normal">Harap Melakukan Registrasi</h1>
            <div class="form-floating" id='DNIP'>
                <input type="number" class="form-control" id="NIP" name="NIP" placeholder="NIP">
                <label for="floatingInput">NIP</label>
                <div id="akses">
                    <a href="#" class="btn btn-primary" id='akses' onclick="val()">periksa</a>
                </div>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" name="Nama">
                <label for="nama">Nama Lengkap</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="Jabatan" placeholder="Jabatan" name="Jabatan">
                <label for="Jabatan">Jabatan</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="Kontak" placeholder="Kontak" name="Kontak" value="62">
                <label for="Kontak">Kontak</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="PW" placeholder="Password" name="pwd">
                <label for="PW">Password</label>
            </div>
            <a class="w-100 btn btn-lg btn-primary clos" id="tn" onclick="regis()">Registrasi</a>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function val() {
            let NIP = document.getElementById('NIP').value
            if (NIP == "") {
                alert("Harap isi NIP");
            } else {
                console.log('{{url("/api/register")}}??val1=true&NIP=' + NIP);
                axios.get('{{url("/api/register")}}??val1=true&NIP=' + NIP)
                    .then(function (response) {
                        if (response.data.code == 1) {
                            alert("NIP Anda Dapat Di Daftarkan Harap Mengisi Lengkapi Data Berikut")
                            let das = document.getElementsByClassName('clos')
                            // for (let i = 0; i < das.length; i++) {
                            //     const element = das[i];
                            //     element.classList.toggle("clos");
                            //     console.log(element.name);
                            // }
                            document.getElementById('tn').classList.toggle("clos");
                            document.getElementById('DNIP').classList.toggle("clos");
                        } else {
                            alert("NIP Anda Tidak Dapat Di Daftarkan Harap Periksa NIP yang Anda Masukan Atau Hubungi Administrator")
                        }
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });

                }
        }
            function makeid(length) {
                var result           = '';
                var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                var charactersLength = characters.length;
                for ( var i = 0; i < length; i++ ) {
                  result += characters.charAt(Math.floor(Math.random() *
             charactersLength));
               }
               return result;
            }

            console.log(makeid(5));
        function regis() {
            let dokan=document.forms["regisba"].getElementsByTagName("input");
            let entu=[]
            // data
            for (let i = 0; i < dokan.length; i++) {
                const element = dokan[i];
                entu[element.name]=element.value
            }
            entu['uname']=makeid(20)
            //post start
               var data = new FormData();
                data.append("photo", "WhatsApp Image 2021-08-02 at 12.02.59.jpeg");
                data.append("reg", "true");
                data.append("Jabatan", entu.Jabatan);
                data.append("Nama", entu.Nama);
                data.append("pwd", entu.pwd);
                data.append("Kontak", entu.contak);
                data.append("NIP", entu.NIP);
                data.append("uname", "smkn4"+entu.uname);
                var xhr = new XMLHttpRequest();
                xhr.withCredentials = true;
                xhr.addEventListener("readystatechange", function () {
                  if (this.readyState === 4) {
                    console.log(this.responseText);
                  }
                });
                xhr.open("POST", "http://localhost:8000/api/register");
                xhr.setRequestHeader("authorization", "Basic Og==");
                xhr.setRequestHeader("cache-control", "no-cache");
                xhr.setRequestHeader("postman-token", "29ee2fa9-f775-cb99-a30e-ca7b8dfb9e49");
                xhr.send(data);
        }
    </script>

</body>

</html>
