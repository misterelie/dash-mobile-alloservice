@extends('layouts.master')

@section('content')

<!-- Hero -->
<section style="background: #3800bf;">
    <div class="">
        <div class="p-4 shadow-4 w">
            <p class="text-center pt-5" style="color: #fff; font-size: 30px">
             Besoin d'assistance
            </p>
          </div>
    </div>
</section>

<section id="section-content">
  <div class="container  m-auto mx-auto">
      <div class="text-center">
          <img class="d-block mx-auto img-fluid mb-4"
              src="{{ asset('assets/images/image-assist.jpg') }}" alt="" width="100"
              id="img-content">
          <h6 class="tittle-assist" style="color: black; font-weight:500">Appelez-nous sur l'un  des numéros suivants:</h6>
          <div class="row">
            <div class="col-lg-12">
                <h3 class="number-assist">+225 27 22 26 88 43</h3>
            </div>
            <div class="col-lg-12">
                <h3 class="number-assist">+225 01 40 49 22 96</h3>
            </div>
            <div class="col-lg-12 mb-2">
                <h3 class="number-assist">+225 05 56 43 84 29</h3>
            </div>

            <div class="col-lg-12 mb-3">
              <h6 class="tittle-assist" style="color: black; font-weight:500">Ou envoyer nous un mail à l'adresse:</h6>
          </div>
          <div class="col-lg-12">
            <h4 style="color: #1b9c1e; font-size: 30px">contact@alloservice.ci</h4>
          </div>

          <div class="col-lg-12">
            <h4 style="font-size: 17px">Ou encore, retrouvez-nous ici:</h4>
          </div>
        </div>
      </div>
  </div>
</section><br><br><br>
  <!-- Hero -->
@endsection
@yield('js')