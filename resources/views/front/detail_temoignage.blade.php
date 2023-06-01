@extends('layouts.master')
@section('content')

<section style="background: #3800bf;">
    <div class="">
        <div class="p-4 shadow-4 w">
            <p class="text-center pt-5" style="color: #fff; font-size: 30px">
             Lire son témoignage
            </p>
          </div>
    </div>
</section>
<section id="section-content">
    <div class="container  m-auto mx-auto">
        @if(!is_null($temoignage))
            <div class="text-center mt-4">
                @if(!is_null($temoignage->photo_person))
                    <img class="d-block mx-auto img-fluid mb-2"
                        src="../TemoignagnesPhoto/{{ $temoignage->photo_person }}" alt="" width="100"
                        id="img-content">
                @endif

                @if(!is_null($temoignage->photo_person))
                    <h6 style="color: #3800bf; font-style: italic" class="mb-4 text-center">{{$temoignage->nom}}</h6>
                @endif

                @if(!is_null($temoignage->photo_person))
                    <div class="col-lg-6 mx-auto">
                        <p style="font-style: italic; font-size: 12px" class="lead">
                            {!! $temoignage->texte !!}
                        </p>
                    </div>
                @endif
            </div>
        @endif
    </div>
</section>
@endsection