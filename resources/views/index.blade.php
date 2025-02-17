<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tapak Suci Pekanbaru</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('welcome-page/css/styles.css') }}" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">Home</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#login">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">SISFO PENDEKAR 114</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Platform Terintegrasi untuk Mengelola Tapak Suci Secara Efisien</p>
                    <a class="btn btn-primary btn-xl" href="#login">Login</a>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="page-section bg-primary" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <!-- Card 1: Total Anggota -->
                <div class="col-md-5 col-lg-4 mb-4">
                    <div class="card border-light shadow-lg h-100 text-center">
                        <div class="card-body">
                            <i class="bi bi-person-fill fs-1 text-primary mb-3"></i>
                            <h5 class="card-title text-dark mb-3">Total Anggota</h5>
                            <p class="card-text text-muted">Jumlah total anggota yang aktif di Tapak Suci Pekanbaru saat ini.</p>
                            <h2 class="display-4 font-weight-bold text-primary">{{ count($anggotapimda) }}</h2> <!-- Ganti dengan data dinamis -->
                        </div>
                    </div>
                </div>
                <!-- Card 2: Cabang Latihan -->
                <div class="col-md-5 col-lg-4 mb-4">
                    <div class="card border-light shadow-lg h-100 text-center">
                        <div class="card-body">
                            <i class="bi bi-geo-alt-fill fs-1 text-primary mb-3"></i>
                            <h5 class="card-title text-dark mb-3">Cabang Latihan</h5>
                            <p class="card-text text-muted">Jumlah cabang latihan Tapak Suci yang tersebar di seluruh Pekanbaru.</p>
                            <h2 class="display-4 font-weight-bold text-primary">{{ count($cabanglatihan) }}</h2> <!-- Ganti dengan data dinamis -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login -->
    <section id="login">
        <div class="container px-4 px-lg-5" style="padding-bottom: 100px;">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-6">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Login</h3>
                        </div>
                        @if(session('message'))
                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="card-body">
                            <form action="/login" method="post">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input name="email" class="form-control" id="email" type="email" required />
                                    <label for="email">Email address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="password" class="form-control" id="password" type="password" required />
                                    <label for="password">Password</label>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="bg-light" style="padding-top: 60px;">
        <div class="container px-4 px-lg-5">
            <div class="small text-center text-muted">Copyright &copy; 2024 - Tapak Suci</div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('welcome-page/js/script.css') }}"></script>
    <!-- SB Forms JS-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>