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
        </div>
    </div><br><br>
</section><br>
@endsection