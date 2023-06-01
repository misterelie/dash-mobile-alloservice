@extends('layouts.master')

@section('content')

<!-- Hero -->
<section style="background: #3800bf;">
  <div class="pt-4">
      <div class="shadow-4 w">
          <p class="text-center pt-3" style="color: #fff; font-size: 20px">
              <a href="{{route('front.index')}}"><i class="fa fa-arrow-left" aria-hidden="true" style="color: #ffff; margin: 15px;"></i></a> BESOIN D'ASSISTANCE
          </p>
      </div>
  </div>
</section>

@if(!is_null($assistances))
@foreach($assistances as $assistance)
  <section id="section-content">
    <div class="container  m-auto mx-auto">
        <div class="text-center">
            <img class="d-block mx-auto img-fluid mb-4"
                src="{{ asset('assets/images/image-assist.jpg') }}" alt="" width="100"
                id="img-content">
            <h6 class="tittle-assist" style="color: black; font-weight:500">Appelez-nous sur l'un  des numéros suivants:</h6>
            <div class="row">
             

              @if(!is_null($assistance->telephone1))
                  <div class="col-lg-12">
                      <h3 class="number-assist">{{ $assistance->telephone1 }}</h3>
                  </div>
              @endif

              @if(!is_null($assistance->telephone2))
                  <div class="col-lg-12">
                      <h3 class="number-assist">{{ $assistance->telephone2 }}</h3>
                  </div>
              @endif

              @if(!is_null($assistance->telephone3))
                <div class="col-lg-12 mb-2">
                  <h3 class="number-assist">{{ $assistance->telephone3 }}</h3>
                </div>
              @endif
            
              <div class="col-lg-12 mb-3">
                <h6 class="tittle-assist" style="color: black; font-weight:500">Ou envoyer nous un mail à l'adresse:</h6>
              </div>
              @if(!is_null($assistance->email))
                <div class="col-lg-12">
                  <h4 style="color: #1b9c1e; font-size: 30px">{{ $assistance->email }}</h4>
                </div>
              @endif

            <div class="col-lg-12">
              <h4 style="font-size: 17px">Ou encore, retrouvez-nous ici:</h4>
            </div>
          </div>
        </div>
    </div>
  </section><br><br><br>
@endforeach
@endif
  <!-- Hero -->
@endsection
@yield('js')