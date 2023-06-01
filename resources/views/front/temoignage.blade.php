@extends('layouts.master')

@section('content')
<style>
    /* Category Ads */

    #ads {
        margin: 30px 0 30px 0;

    }

    #ads .card-notify-year {
    position: absolute;
    left: -21px;
    top: -29px;
    /* background: #fff; */
    border-radius: 50% !important;
    text-align: center;
    color: #fff;
    font-size: 14px;
    width: 55px;
    height: 55px;
    padding: 15px 0 0 0;
    }

    #ads .card:hover {
        background: #fff;
        box-shadow: 12px 15px 20px 0px rgba(46, 61, 73, 0.15);
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    #ads .card-image-overlay {
        font-size: 20px;
    }

    #ads .card-image-overlay span {
        display: inline-block;
    }

    #ads .ad-title h5 {
        text-transform: uppercase;
        font-size: 18px;
    }
</style>

<section class="part-temoignage">

    <section style="background: #3800bf;">
        <div class="pt-4">
            <div class="shadow-4 w">
                <p class="text-center pt-3" style="color: #fff; font-size: 20px">
                    <a href="{{route('front.index')}}"><i class="fa fa-arrow-left" aria-hidden="true" style="color: #ffff; margin: 15px;"></i></a> LES TEMOIGNAGES
                </p>
            </div>
        </div>
    </section>
        {{-- <div class="titre-temoignage mb-4" style="background: #3800bf">
            <div class="p-4 shadow-4 w">
                <p class="text-center pt-5" style="color: #fff; font-size: 20px">
                 <a href="{{route('front.index')}}"><i class="fa fa-arrow-left" style="color: #ffff; margin: 15px"></i></a> LES TEMOIGNAGES
                </p>
            </div>
        </div> --}}
    <div class="container">
        <div class="">
            <h4 class="text-center" style="color: #000; font-weight:bolder; font-size: 16px">
                Ce que disent nos clients...</h4>
        </div><br>

       
        <main class="px-3">
            <p class="text-center">
              <a href="{{ route('form.temoignage')}}" class="btn btn btn-primary" style="background-color: #1b9c1e; border-color: #1b9c1e">
                Laissez votre témoignage
            </a>
            </p>
        </main>
       
        <div class="row" id="ads">
            <!-- Category Card -->
            @if(!is_null($temoignages))
            @foreach($temoignages as $temoignage)
            <div class="col-md-6 mb-4">
                <div class="card rounded" style="border-color: #1b9c1e; border-style: solid; height: 145px; background-color: #f1f2f2">
                    
                    <div class="card-image">
                        @if($temoignage->photo_person)
                            <span class="card-notify-year">
                                <img src="/TemoignagnesPhoto/{{ $temoignage->photo_person }}"
                                 alt="" class="avatar-xs rounded-circle" style="height: 35px; width: 35px;">
                            </span>
                        @else
                            <span class="card-notify-year">
                                <img src="{{asset('assets/images/avatar.png')}}"
                                alt="" class="avatar-xs rounded-circle" style="height: 35px; width: 35px;">
                            </span>
                        @endif
                    </div>

                    <div class="card-body">
                        <div class="ad-title m-auto">
                            <p class="product-description" style="color: #111; font-style:italic; font-weight:500"
                                style="font-size: 12px"><br>
                                {{ \Illuminate\Support\Str::words( $temoignage->texte, 10,'...') }}
                                <i class="fa fa-arrow-right" aria-hidden="true"><a href="{{ route('detail.temoignage', $temoignage->id) }}"> Lire la suite</a></i>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif

            {{-- <div class="col-md-6 mb-4">
                <div class="card rounded" style="border-color: #1b9c1e; border-style: solid; height: 145px; background-color: #f1f2f2">
                    <div class="card-image">
                        <span class="card-notify-year">Photo</span>
                    </div>

                    <div class="card-body">
                        <div class="ad-title m-auto">
                            <p class="product-description" style="color: #111; font-style:italic; font-weight:500"
                                style="font-size: 12px"><br>
                                Allô Service est une entreprise de mise en relation entre prestataires de service et particuliers à la recherche...
                                <i class="fa fa-arrow-right" aria-hidden="true"><a href="{{ route('detail.temoignage') }}"> Lire la suite</a></i>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card rounded" style="border-color: #1b9c1e; border-style: solid; height: 145px; background-color: #f1f2f2">
                    <div class="card-image">
                        <span class="card-notify-year">Photo</span>
                    </div>

                    <div class="card-body">
                        <div class="ad-title m-auto">
                            <p class="product-description" style="color: #111; font-style:italic; font-weight:500"
                                style="font-size: 12px"><br>
                                Allô Service est une entreprise de mise en relation entre prestataires de service et particuliers à la recherche...
                                <i class="fa fa-arrow-right" aria-hidden="true"><a href=""> Lire la suite</a></i>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card rounded" style="border-color: #1b9c1e; border-style: solid; height: 145px; background-color: #f1f2f2">
                    <div class="card-image">
                        <span class="card-notify-year">Photo</span>
                    </div>

                    <div class="card-body">
                        <div class="ad-title m-auto">
                            <p class="product-description" style="color: #111; font-style:italic; font-weight:500"
                                style="font-size: 12px"><br>
                                Allô Service est une entreprise de mise en relation entre prestataires de service et particuliers à la recherche...
                                <i class="fa fa-arrow-right" aria-hidden="true"><a href=""> Lire la suite</a></i>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card rounded" style="border-color: #1b9c1e; border-style: solid; height: 145px; background-color: #f1f2f2">
                    <div class="card-image">
                        <span class="card-notify-year">Photo</span>
                    </div>

                    <div class="card-body">
                        <div class="ad-title m-auto">
                            <p class="product-description" style="color: #111; font-style:italic; font-weight:500"
                                style="font-size: 12px"><br>
                                Allô Service est une entreprise de mise en relation entre prestataires de service et particuliers à la recherche...
                                <i class="fa fa-arrow-right" aria-hidden="true"><a href=""> Lire la suite</a></i>
                            </p>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div><br><br>
       
    </div>
</section>
@endsection