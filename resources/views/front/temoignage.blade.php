@extends('layouts.master')

@section('content')
<style>
    /* Category Ads */

    #ads {
        margin: 30px 0 30px 0;

    }

    #ads .card-notify-year {
        position: absolute;
        left: -10px;
        top: -20px;
        background: #1b9c1e;
        border-radius: 50%;
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

<section class="part-temoignage mb-4">
        <div class="titre-temoignage mb-4" style="background: #3800bf">
            <div class="p-4 shadow-4 w">
                <p class="text-center pt-5" style="color: #fff; font-size: 30px">
                 Témoignages
                </p>
              </div>
        </div>
    <div class="container">
        <div class="">
            <h4 class="text-center" style="color: #000; font-weight:bolder; font-size: 22px">Ce que disent nos
                clients...</h4>
        </div><br>
        <div class="row" id="ads">
            <!-- Category Card -->
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
        </div><br><br>
    </div>
</section>
@endsection