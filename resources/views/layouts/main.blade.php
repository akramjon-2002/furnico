
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="{{asset('/assets/images/favicon.png')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <link href="{{asset('/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{asset('/assets/css/tiny-slider.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
    <title>Furni Free Bootstrap 5 Template for Furniture and Interior Design Websites by Untree.co </title>
</head>

<body>

<!-- Start Header/Navigation -->
<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="Furni navigation bar">

    <div class="container">
        <a class="navbar-brand" href="{{route('frontend.home')}}">FurniCo<span>.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurn">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item {{ request()->is('frontend/home') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('frontend.home') }}">Bosh sahifa</a>
                </li>
                <li class="nav-item {{ request()->is('frontend/product/shop') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('frontend.product.shop') }}">Sotib olish</a>
                </li>
                <li class="nav-item {{ request()->is('frontend/product/about') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('frontend.product.about') }}">Biz haqimizda</a>
                </li>
                <li class="nav-item {{ request()->is('frontend/post/index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('frontend.post.index') }}">Blog</a>
                </li>
                <li class="nav-item {{ request()->is('frontend/product/contact') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('frontend.product.contact') }}">Biz bilan bog'lanish</a>
                </li>
            </ul>


            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                <li><a class="nav-link" href="{{route('frontend.user.index')}}"><img src="{{asset('/assets/images/user.svg')}}"></a></li>
                <li><a class="nav-link" href="{{route('frontend.cart.index')}}"><img src="{{asset('/assets/images/cart.svg')}}"></a></li>
            </ul>
        </div>
    </div>

</nav>
<!-- End Header/Navigation -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@yield('content')



<!-- Start Footer Section -->
<footer class="footer-section">
    <div class="container relative">

        <div class="sofa-img">
            <img src="{{asset('/assets/images/sofa.png')}}" alt="Image" class="img-fluid">
        </div>



        <div class="row g-5 mb-5">
            <div class="col-lg-4">
                <div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">FurniCo<span>.</span></a></div>
                <p class="mb-4">Biz sizga yordamimiz tekkanidan xursandmiz va sizni yana kutib qolamiz! </p>

                <ul class="list-unstyled custom-social">
                    <li><a href="https://t.me/akramjon26"><span class="fa fa-brands fa-telegram"></span></a></li>
                    <li><a href="https://github.com/akramjon-2002"><span class="fa fa-brands fa-github"></span></a></li>
                    <li><a href="https://linkedin.com/in/акрамжон-тургунов-11475824b"><span class="fa fa-brands fa-linkedin"></span></a></li>
                </ul>
            </div>

            <div class="col-lg-8">
                <div class="row links-wrap">
                    <div class="col-6 col-sm-6 col-md-6 offset-md-4">
                        <ul class="list-unstyled">
                            <li><a href="{{route('frontend.product.about')}}">Biz haqimizda!</a></li>
                            <li><a href="{{route('frontend.post.index')}}">Maqolalar</a></li>
                            <li><a href="{{route('frontend.product.contact')}}">Biz bilan bog'laning!</a></li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>

        <div class="border-top copyright">
            <div class="row pt-4">
                <div class="col-lg-6">
                    <p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> Distributed By <a hreff="https://themewagon.com">ThemeWagon</a>  <!-- License information: https://untree.co/license/ -->
                    </p>
                </div>
            </div>
        </div>

    </div>
</footer>
<!-- End Footer Section -->


<script src="{{asset('/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/assets/js/tiny-slider.js')}}"></script>
<script src="{{asset('/assets/js/custom.js')}}"></script>
</body>

</html>
