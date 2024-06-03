<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard FA</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/icons/favicon.ico') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <nav class="navbar navbar-light bg-light static-top">
        <div class="container">
            <a class="navbar-brand fw-bolder" href="#">Flower Advisor</a>
            <ul class="nav nav-tabs nav-user shadow-sm">
                <li class="nav-item dropdown">
                    <a id="user-email" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a onclick="logout()" class="dropdown-item" href="#">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <header class="masthead">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="text-center text-white">
                        <h1 class="mb-5">This landing page was made by Dio for Flower Advisor</h1>
                        <div class="row">
                            <div class="col-6 d-flex justify-content-end">
                                <button onclick="someonedayButton()" class="btn btn-primary btn-lg" id="someoneday-button">Someone's day</button>
                            </div>
                            <div class="col-6 d-flex justify-content-start">
                                <button onclick="learnmoreButton()" class="btn btn-transparent btn-lg" id="learnmore-button">Learn more</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="showcase">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>Welcome to Flower Advisor</h2>
                    <p class="lead mb-0">You can use this promo code below to get more discount.</p>
                    <div class="promo-code mt-5">
                        <button class="btn btn-dark" id="copyPromoCode" onclick="copyToClipboard('HALLOW10')">HALLOW10</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                    <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2024. All Rights Reserved.</p>
                </div>
                <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item me-4">
                            <a href="https://www.floweradvisor.com.ph/"><i class="bi-laptop-fill fs-3"></i></a>
                        </li>
                        <li class="list-inline-item me-4">
                            <a href="#"><i class="bi-facebook fs-3"></i></a>
                        </li>
                        <li class="list-inline-item me-4">
                            <a href="#"><i class="bi-twitter fs-3"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><i class="bi-instagram fs-3"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>

<script>
    profileName();

    function profileName() {
        var tokenVal = $('meta[name="csrf-token"]').attr('content');
        var fd = new FormData();

        fd.append("_token", tokenVal);

        $.ajax({
            type: 'GET',
            url: '/get_email',
            data: fd,
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            async: false,
            processData: false,
            success: function(response) {
                $("#user-email").text(response);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function logout() {
        console.log("logout");

        Swal.fire({
            title: 'Logout',
            text: 'Are you sure you want to logout?',
            icon: 'question',
            confirmButtonColor: '#212529',
            denyButtonColor: '#a3a3a3',
            showDenyButton: true,
            confirmButtonText: 'Yes',
            denyButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                var tokenVal = $('meta[name="csrf-token"]').attr('content');
                var fd = new FormData();

                fd.append("_token", tokenVal);

                $.ajax({
                    type: 'POST',
                    url: '/session_destroy',
                    data: fd,
                    enctype: 'multipart/form-data',
                    cache: false,
                    contentType: false,
                    async: false,
                    processData: false,
                    success: function(response) {
                        window.location.href = "/login";
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            } else if (result.isDenied) {
                window.location.reload();
            }
        });
    }

    function someonedayButton() {
        window.location.href = "https://www.floweradvisor.com.ph/flowersphilippines";
    }

    function learnmoreButton() {
        window.location.href = "https://itunes.apple.com/us/app/online-florist-floweradvisor/id1185232807";
    }

    function copyToClipboard(text) {
        const tempInput = document.createElement('input');
        tempInput.value = text;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);

        Swal.fire({
            icon: "success",
            title: tempInput.value + " is copy to clipboard",
            showConfirmButton: false,
            timer: 1000
        });
    }
</script>