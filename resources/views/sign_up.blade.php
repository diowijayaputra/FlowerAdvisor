<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign Up</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 sign-up-padding-fix">
                <span class="login100-form-title p-b-48">
                    FlowerAdvisor
                </span>

                <div class="wrap-input100 validate-input" data-validate="Enter full name">
                    <input id="fullname" class="input100" type="text" name="fullname">
                    <span class="focus-input100" data-placeholder="Full name"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                    <input id="email" class="input100" type="text" name="email">
                    <span class="focus-input100" data-placeholder="Email"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <span class="btn-show-pass">
                        <i class="zmdi zmdi-eye"></i>
                    </span>
                    <input id="password" class="input100" type="password" name="password">
                    <span class="focus-input100" data-placeholder="Password"></span>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button onclick="validation()" class="login100-form-btn">
                            Sign Up
                        </button>
                    </div>
                </div>

                <div class="text-center p-t-70">
                    <span class="txt1">
                        Already have an account?
                    </span>

                    <a class="txt2" href="/login">
                        Sign In
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <script src="js/main.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>

<script>
    function signUp(fullname, email, password) {
        var tokenVal = $('meta[name="csrf-token"]').attr('content');
        var fd = new FormData();

        fd.append("fullname", fullname);
        fd.append("email", email);
        fd.append("password", password);
        fd.append("_token", tokenVal);

        $.ajax({
            type: 'POST',
            url: '/register_user',
            data: fd,
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            async: false,
            processData: false,
            success: function(response) {
                console.log(response);

                Swal.fire({
                    icon: "success",
                    title: "USER HAS BEEN REGISTERED!",
                    showConfirmButton: false,
                    timer: 1500
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        window.location.href = "/login";
                    }
                });
            },
            error: function(error) {
                Swal.fire({
                    title: "Please fill the required form!",
                    icon: "error"
                });
            }
        });
    }

    function validation() {
        var object = {}

        $("input").each(function(index, value) {
            object[value.id] = $(value).val();
        });

        var tokenVal = $('meta[name="csrf-token"]').attr('content');
        var fd = new FormData();

        fd.append("_token", tokenVal);

        $.ajax({
            type: 'POST',
            url: '/get_data/' + object.fullname + '/' + object.email,
            data: fd,
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            async: false,
            processData: false,
            success: function(response) {
                if (response == 1 || response == 2 || response == 3) {
                    Swal.fire({
                        title: "Username or Email already registered",
                        text: "Please try another combination!",
                        icon: "error"
                    });
                } else {
                    signUp(object.fullname, object.email, object.password);
                }
            },
            error: function(error) {
                Swal.fire({
                    title: "Please fill the required form!",
                    icon: "error"
                });
            }
        });
    }
</script>