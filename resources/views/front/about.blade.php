@extends('layouts.master')
@section('content')
@if(!is_null($abouts))
@foreach($abouts as $about)
    <section id="section-content">
        <div class="container  m-auto mx-auto">
            <div class="text-center">
                <img class="d-block mx-auto img-fluid"
                    src="{{ asset('assets/images/eli1.png') }}" alt="" width="50"
                    id="img-content">

                <h5 style="color: #3800bf" class="fw-bold text-body-emphasis">{{ $about->titre }} </h5>
                <div class="col-lg-6 mx-auto">
                    <p style="font-style: italic; font-size: 12px" class="lead">
                        {!!$about->description!!}
                    </p>

                    <main class="px-3">
                        <p class="text-center">
                        <a href="{{route('front.contact')}}" class="btn btn-primary"  style="background-color: #3800bf">
                            Contactez-nous ici !</a>
                        </p>
                    </main>
                </div>
            </div>
        </div>
    </section>
@endforeach
@endif
@endsection
