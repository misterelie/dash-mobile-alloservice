<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Allô service</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <style>
         button {
            width: 100%;
            background-color: #3800bf;
            color: #ffffff;
            border: none;
            padding: 6px 8px;
            font-size: 12px;
            cursor: pointer;
    }

    button:hover {
        opacity: 0.8;
    }

    #prevBtn {
        background-color: #3800bf;
    }
    </style>
</head>

<body>
    <header class="header">
        <nav class="navbar fixed-top bg-body-tertiary">
            <div class="container">
                <a class="navbar-brand text-center" href="{{ route('front.index') }}">
                    <img src="{{ asset('assets/images/logo.png') }}"
                        class="img-fluid rounded-circle-15" width="130" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation" style="height: 29px">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <a href="{{ route('front.index') }}"><i class="fa fa-arrow-left"
                                aria-hidden="true" style="color:#3800bf; font-size:16px"></i></a>
                        <img src="{{ asset('assets/images/logo.png') }}"
                            class="img-fluid rounded-circle-15" width="150" alt="">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <hr>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a href="{{ route('front.index') }}" class="nav-link text-truncate">
                                    <i class="fa fa-home"></i><span class="ms-1 d-sm-inline">Accueil</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('front.prestation') }}"
                                    class="nav-link text-truncate">
                                    <i class="fa  fa-tasks"></i><span class="ms-1 d-sm-inline">Demande de
                                        prestations</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('front.prestataire') }}"
                                    class="nav-link text-truncate">
                                    <i class="fa fa-users"></i><span class="ms-1 d-sm-inline">Devenir prestataire</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('front.temoingnage') }}" class="nav-link text-truncate">
                                    <i class="fa fa-user-plus"></i><span class="ms-1 d-sm-inline">Témoignages</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('front.assistance')}}" class="nav-link text-truncate">
                                    <i class="fa fa-question-circle"></i><span
                                        class="ms-1 d-sm-inline">Assistance</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('front.contact') }}" class="nav-link text-truncate">
                                    <i class="fa fa-phone"></i><span class="ms-1 d-sm-inline">Contacts</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav><br><br>
    </header>

        <section id="slide" class="mb-4">
            <div id="carouselExampleAutoplaying" class="carousel slide mt-2" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://www.alloservice.ci/Images/8feda64b71d118a513e0209ab9e13409.png"
                            class="d-block w-100" alt="">
                       
                    </div>
                    <div class="carousel-item">
                        <img src="https://www.alloservice.ci/Images/8feda64b71d118a513e0209ab9e13409.png"
                            class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://www.alloservice.ci/Images/8feda64b71d118a513e0209ab9e13409.png"
                            class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>

        <section
            class="category-section top-category bg-gray pt-10 pb-10 appear-animate fadeIn appear-animation-visible">
            <div class="container m-auto mx-auto">
                <div class="commune-annonce">
                    <div class="card commune-card">
                        <div class="card-body card-bouton">
                            <a href="{{ route('front.prestation') }}">
                                <h5 class="titre-prestation" style="font-size: 16px">Demander une prestation</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="commune-annonce">
                    <div class="card commune-card">
                        <div class="card-body card-bouton">
                            <a href="{{ route('front.prestataire') }}">
                                <h5 class="titre-prestation" style="font-size: 16px">Devenir un prestataire</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div><br>
        </section>

        <section class="category-section top-category bg-gray pt-10 pb-10 appear-animate fadeIn appear-animation-visible">
            <div class="container m-auto mx-auto">
                <div class="row mb-2">
                    <h5 class="title justify-content-center pt-1 ls-normal mb-4 text-center" style="font-size: 16px">
                        Chez Allô Service c’est
                    </h5>
                    <div class="col-4 mb-4">
                        <div class="card category-card">
                            <a href="">
                                <div class="category-image position-relative carre-card">
                                    <h4 class="text-center"><span>+1500</span></h4>
                                    <p class="category-name text-center">
                                        Demandes<br>enregistrées
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-4 mb-3">
                        <div class="card category-card-card-client">
                            <a href="">
                                <div class="category-image position-relative carre-card">
                                    <h4 class="text-center"><span>+1000</span></h4>
                                    <p class="category-name text-center">
                                        Clients<br>satisfaits
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card category-card">
                            <a href="">
                                <div class="category-image position-relative carre-card">
                                    <h4 class="text-center"><span>+200</span></h4>
                                    <p class="category-name text-center">
                                        Prestataires<br>disponibles
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="category-section top-category pt-10 pb-10 appear-animate fadeIn appear-animation-visible">
            <div class="container m-auto mx-auto">
                <div class="shop-default shop-cards shop-tech">
                    <div class="row">
                        <h5 class="title justify-content-center pt-1 ls-normal mb-4 text-center" style="font-size: 16px">
                            Nos prestations
                        </h5>
                        @if(!is_null($prestations))
                        @foreach($prestations as $prestation)
                        <div class="col-6 card-section">
                            <div class="block product no-border z-depth-2-top z-depth-2--hover mb-2">
                                <div class="block-image">
                                   @if(!is_null($prestation->image_prestation))
                                    <a href="#">
                                        <img src="../uploadsprestation/{{ $prestation->image_prestation}}"
                                            class="img-center">
                                        </a>
                                   @endif
                                </div>
                                <div class="block-body text-center">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h3 class="heading heading-5 strong-600"
                                                style="background-color: #1b9c1e; margin-bottom: 0px">
                                                <a href="#"
                                                    style="color: #fff; font-weight:bold">{{ $prestation->libelle }}</a> 
                                            </h3>
                                        </div>
                                        <div class="col-lg-12">
                                            <a href="{{ route('front.prestation') }}">
                                                <button type="button" id="prevBtn">Demander la prestation 
                                                    <img src="{{ asset('assets/images/point.png') }}" 
                                                    width="" class="img-fluid" alt=""> Cliquez ici
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col-lg-12">
                                            <a href="{{ route('front.prestation') }}">
                                                <button type="button" id="prevBtn" style="color: #1b9c1e; background-color: #e6e7e8">
                                                    Devenir un prestataire<br>
                                                    <img src="{{ asset('assets/images/point_blue.png') }}" 
                                                    width="" class="img-fluid" alt=""> Cliquez ici
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>

                   
                    <main class="px-3">
                        <p class="text-center">
                          <a href="{{route('front.nos-prestations')}}" class="btn btn btn-primary"  style="background-color: #3800bf">
                            Voir toutes nos prestations »</a>
                        </p>
                    </main>
                </div>
            </div>
        </section> 

      
        <section id="section-content">
            @include('front.about')
        </section><br><br><br>

        <section>
            <!-- Bottom Navbar -->
            <nav class="navbar navbar-dark navbar-expand fixed-bottom">
                <ul class="navbar-nav nav-justified w-100">
                    <li class="nav-item">
                        <a href="{{ route('front.index') }}" class="nav-link text-center">
                            <i class="fa fa-home icon-Bottom-Navbar" aria-hidden="true"></i>
                            <span class="small d-block title-Bottom-Navbar text-center">Accueil</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('front.nos-prestations')}}" class="nav-link text-center">
                            <i class="fa fa-tasks icon-Bottom-Navbar" aria-hidden="true"></i>
                            <span class="small d-block title-Bottom-Navbar text-center">Prestations</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('front.temoingnage') }}" class="nav-link text-center">
                            <i class="fa fa-users icon-Bottom-Navbar" aria-hidden="true"></i>
                            <span class="small d-block title-Bottom-Navbar text-center">Témoignages</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('front.assistance')}}" class="nav-link text-center">
                            <i class="fa fa-question-circle icon-Bottom-Navbar" aria-hidden="true"></i>
                            <span class="small d-block title-Bottom-Navbar text-center">Assistance</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>
</body>

</html>