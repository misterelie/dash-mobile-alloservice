@extends('layouts.master')
@section('content')


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

<section class="category-section top-category pt-10 pb-10 appear-animate fadeIn appear-animation-visible">
    <div class="titre-temoignage" style="background: #3800bf">
        <div class="p-4 shadow-4 w">
            <p class="text-center pt-5 text-uppercase" style="color: #fff; font-size: 20px">
                Toutes nos prestations
            </p>
        </div>
    </div>
    <div class="container m-auto mx-auto mb-5">
        <div class="shop-default shop-cards shop-tech"><br><br>
            <div class="row">
                <div class="col-6 card-section">
                    <div class="block product no-border z-depth-2-top z-depth-2--hover mb-2">
                        <div class="block-image">
                            <a href="#">
                                <img src="https://www.alloservice.ci/Images/542cbf6b7cd1b09ce700fb923a561184.jpg"
                                    class="img-center">
                            </a>
                        </div>
                        <div class="block-body text-center">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3 class="heading heading-5 strong-600"
                                        style="background-color: #1b9c1e; margin-bottom: 0px">
                                        <a href="#"
                                            style="color: #fff; font-weight:bold">Jardiniers</a> 
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

                <div class="col-6 card-section">
                    <div class="block product no-border z-depth-2-top z-depth-2--hover mb-2">
                        <div class="block-image">
                            <a href="#">
                                <img src="https://www.alloservice.ci/Images/d14a85a4d69c87210d8d956edaef51fe.jpg"
                                    class="img-center">
                            </a>
                        </div>
                        <div class="block-body text-center">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3 class="heading heading-5 strong-600"
                                        style="background-color: #1b9c1e; margin-bottom: 0px">
                                        <a href="{{ route('front.prestation') }}"
                                            style="color: #fff; font-weight:bold">Mécanicien</a>
                                    </h3>
                                </div>
                                <div class="col-lg-12">
                                    <a href="{{ route('front.prestation') }}">
                                        <button type="button" id="prevBtn">
                                            Demander la prestation <img src="{{ asset('assets/images/point.png') }}" 
                                            width="" class="img-fluid" alt=""> Cliquez ici
                                        </button>
                                    </a>
                                </div>
                                <div class="col-lg-12">
                                    <a href="{{route('front.prestataire')}}">
                                        <button type="button" id="prevBtn" style="color: #1b9c1e; background-color: #e6e7e8">
                                            Devenir un prestataire<br> <img src="{{ asset('assets/images/point_blue.png') }}" 
                                            width="" class="img-fluid" alt=""> Cliquez ici
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6 card-section">
                    <div class="block product no-border z-depth-2-top z-depth-2--hover mb-2">
                        <div class="block-image">
                            <a href="#">
                                <img src="https://www.alloservice.ci/Images/5ee3020f0a7f44c9015e0cfe02892d6c.jpg"
                                    class="img-center">
                            </a>
                        </div>
                        <div class="block-body text-center">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3 class="heading heading-5 strong-600"
                                        style="background-color: #1b9c1e; margin-bottom: 0px">
                                        <a href="{{ route('front.prestation') }}"
                                            style="color: #fff; font-weight:bold">Menusier</a>
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
                                    <a href="{{route('front.prestataire')}}">
                                        <a href="{{route('front.prestataire')}}">
                                            <button type="button" id="prevBtn" style="color: #1b9c1e; background-color: #e6e7e8">
                                                Devenir un prestataire<br> <img src="{{ asset('assets/images/point_blue.png') }}" 
                                                width="" class="img-fluid" alt=""> Cliquez ici
                                            </button>
                                        </a>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 card-section">
                    <div class="block product no-border z-depth-2-top z-depth-2--hover mb-2">
                        <div class="block-image">
                            <a href="#">
                                <img src="https://www.alloservice.ci/Images/ed4239edd6dbb061e604a6f970fd0c48.jpg"
                                    class="img-center">
                            </a>
                        </div>
                        <div class="block-body text-center">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3 class="heading heading-5 strong-600"
                                        style="background-color: #1b9c1e; margin-bottom: 0px">
                                        <a href="{{ route('front.prestation') }}"
                                            style="color: #fff; font-weight:bold">Coiffeurs & Coiffeuses</a>
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
                                    <a href="{{route('front.prestataire')}}">
                                        <button type="button" id="prevBtn" style="color: #1b9c1e; background-color: #e6e7e8">
                                            Devenir un prestataire<br> <img src="{{ asset('assets/images/point_blue.png') }}" 
                                            width="" class="img-fluid" alt=""> Cliquez ici
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6 card-section">
                    <div class="block product no-border z-depth-2-top z-depth-2--hover mb-2">
                        <div class="block-image">
                            <a href="#">
                                <img src="https://www.alloservice.ci/Images/eacee773d9ebcae92901fd6e4caea35b.jpg"
                                    class="img-center">
                            </a>
                        </div>
                        <div class="block-body text-center">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3 class="heading heading-5 strong-600"
                                        style="background-color: #1b9c1e; margin-bottom: 0px">
                                        <a href="{{ route('front.prestation') }}"
                                            style="color: #fff; font-weight:bold">Chauffeurs</a>
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
                                    <a href="{{route('front.prestataire')}}">
                                        <button type="button" id="prevBtn" style="color: #1b9c1e; background-color: #e6e7e8">
                                            Devenir un prestataire<br> <img src="{{ asset('assets/images/point_blue.png') }}" 
                                            width="" class="img-fluid" alt=""> Cliquez ici
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 card-section mb-5">
                    <div class="block product no-border z-depth-2-top z-depth-2--hover mb-2">
                        <div class="block-image">
                            <a href="#">
                                <img src="https://www.alloservice.ci/Images/d0c8fc7fd66d8ccc9f720279eda89726.jpg"
                                    class="img-center">
                            </a>
                        </div>
                        <div class="block-body text-center">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3 class="heading heading-5 strong-600"
                                        style="background-color: #1b9c1e; margin-bottom: 0px">
                                        <a href="{{ route('front.prestation') }}"
                                            style="color: #fff; font-weight:bold">Femmes de ménage</a>
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
                                    <a href="{{route('front.prestataire')}}">
                                        <button type="button" id="prevBtn" style="color: #1b9c1e; background-color: #e6e7e8">
                                            Devenir un prestataire<br> <img src="{{ asset('assets/images/point_blue.png') }}" 
                                            width="" class="img-fluid" alt=""> Cliquez ici
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 
@endsection