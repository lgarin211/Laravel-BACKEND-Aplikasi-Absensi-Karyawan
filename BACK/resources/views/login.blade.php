<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>Signin Template · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">



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
    </style>


    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.1/examples/sign-in/signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <main class="form-signin">
        <form method="GET" action="{{url('/api/login')}}">
            <img class="mb-4" src="https://getbootstrap.com/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72"
                height="57">
            <h1 class="h3 mb-3 fw-normal">Harap Login</h1>
            <div class="form-floating">
                <input type="number" class="form-control" id="NIP" name="NIP" placeholder="0039101302">
                <label for="floatingInput">NIP</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="PW" placeholder="Password" name="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <a class="w-100 btn btn-lg btn-primary" href="#" onclick="login()">Login</a>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function login() {

            let NIP=document.getElementById('NIP').value
            let PASS=document.getElementById('PW').value
            console.log('{{url("/api/login")}}?NIP='+NIP+'&Password='+PASS);
            axios.get('{{url("/api/login")}}?NIP='+NIP+'&Password='+PASS)
                .then(function (response) {
                  // handle success
                  console.log(response);
                })
                .catch(function (error) {
                  // handle error
                  console.log(error);
                })
                .then(function () {
                  // always executed
                });
        }
    </script>

</body>

</html>
