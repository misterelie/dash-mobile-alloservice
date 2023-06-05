@extends('layouts.master')
@section('content')

<section class="section-contact mb-4">

    <div class="titre-temoignage mb-2" style="background: #3800bf">
        <div class="p-4 shadow-4 w">
            <p class="text-center pt-5" style="color: #fff; font-size: 20px">
                Contacter-nous
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

        <form action="{{ route('save_contact')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Name input -->
            <div class="form-outline mb-3" style="color: #1b9c1e">
                <label class="form-label" for="form1Example2"><span style="color: red">*</span> Nom:</label>
                <input type="text" id="form1Example2" class="form-control form-control-lg" name="nom" placeholder="Entrer votre nom svp !" required/>
             </div>

             <div class="form-outline mb-3" style="color: #1b9c1e">
                <label class="form-label" for="form1Example2"><span style="color: red">*</span> Prénoms :</label>
                <input type="text" id="form1Example2" class="form-control form-control-lg" name="prenoms" placeholder="Entrer votre prenoms svp !" required/>
             </div>
    
             <div class="form-outline mb-3" style="color: #1b9c1e">
                <label class="form-label" for="form1Example2"><span style="color: red">*</span> Email:</label>
                <input type="email" id="form1Example2" name="email"  class="form-control form-control-lg" required placeholder="Saisissez votre email !"/>
             </div>

             <div class="form-outline mb-3" style="color: #1b9c1e">
                <label class="form-label" for="form1Example2"><span style="color: red">*</span> Objet:</label>
                <input type="text" id="form1Example2" name="objet"  class="form-control form-control-lg" required placeholder="Saisissez votre objet !"/>
             </div>
            <!-- Message input -->
            <div class="form-outline mb-3" style="color: #1b9c1e">
                <label class="form-label" for="form4Example3"><span style="color: red">*</span> Message:</label>
              <textarea 
              class="form-control form-control" name="message" id="form4Example3" rows="4" placeholder="Ecrivez votre message ici !"></textarea>
            </div>
            <!-- Submit button -->
            <div class="d-grid gap-2 mx-auto mb-5">
                <button type="submit" class="btn btn-success btn-lg btn-responsive" value="Sign In" style="background: #1b9c1e">Envoyer</button>
            </div>
          </form>
    </div><br><br>
</section>

@endsection