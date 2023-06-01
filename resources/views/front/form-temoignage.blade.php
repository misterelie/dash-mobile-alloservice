@extends('layouts.master')
@section('content')
  
<section class="section-contact mb-4">

    <div class="titre-temoignage mb-2" style="background: #3800bf">
        <div class="p-4 shadow-4 w">
            <p class="text-center pt-5" style="color: #fff; font-size: 20px">
             <a href="{{ route('front.temoingnage') }}"><i class="fa fa-arrow-left" style="color: #ffff; margin: 20px"></i></a>  Ecris ton témoignage
            </p>
        </div>
    </div><br><br>
    <div class="container">
        <div class="form-group ">
            <!--AFFICHER LE MESSAGE DE SUCCESS-->
            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <p class="text-center">{{ $message }}</p>
                </div>
            @endif
  
            <!--AFFICHER LE MESSAGE D'ERROR-->
            @if($errors->any())
                <div class="alert alert-danger">
                    <p>Humm!</p> Il y a eu des problèmes avec votre entrée.<br><br>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <form action="{{ route('save.temoignage')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <h6 class="text-center" style="color: red; font-size: 12px">
                NB: Les champs marqués par une étoile <br> sont obligatoires
             </h6>
            <!-- Name input -->
            <div class="form-outline mb-3" style="color: #1b9c1e">
                <label class="form-label" for="form1Example2"><span style="color: red">*</span> Nom:</label>
                <input type="text" id="form1Example2" class="form-control form-control-lg" name="nom" placeholder="Entrer votre nom svp !" required/>
             </div>

             <div class="form-outline mb-3" style="color: #1b9c1e">
                <label class="form-label" for="form1Example2">Contact:</label>
                <input type="tel" id="form1Example2" class="form-control form-control-lg" 
                name="contact" placeholder="Entrer votre numéro de téléphone!"/>
             </div>
    

             <div class="form-outline mb-3" style="color: #1b9c1e">
                <label class="form-label" for="form1Example2">Ajouter une photo:</label>
                <input type="file" id="form1Example2" name="photo_person" class="form-control form-control-lg"/>
             </div>
            <!-- Message input -->
            <div class="form-outline mb-3" style="color: #1b9c1e">
                <label class="form-label" for="form4Example3"><span style="color: red">*</span> Ecrivez votre témoignage:</label>
              <textarea class="form-control form-control" name="texte" id="form4Example3" rows="4" 
              placeholder="Ecrivez votre témoignage ici !" required="">
            </textarea>
            </div>
            <!-- Submit button -->
            <div class="d-grid gap-2 mx-auto mb-5">
                <button type="submit" class="btn btn-success btn-lg btn-responsive" value="Sign In" style="background: #1b9c1e">Soumettre</button>
            </div>
          </form>
    </div><br><br>
</section>
@endsection