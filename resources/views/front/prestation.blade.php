@extends('layouts.master')
@section('content')

<section class="mb-4">
        <div class="titre-temoignage mb-4" style="background: #3800bf">
            <div class="p-4 shadow-4 w">
                <p class="text-center pt-5" style="color: #fff; font-size: 20px">
                 Demander une prestation
                </p>
              </div>
        </div>
       <div class="container">

        <div class="form-group">
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

        <form action="{{ route('save.demandeprestation')}}" method="POST" enctype="multipart/form-data">
          @csrf

            <!-- Name input -->
            <div class="form-outline mb-4" style="color: #1b9c1e">
                <label class="form-label" for="form4Example1">Prestation demandée<span style="color: red">(*)</span></label>
                <select name="prestation_demande" class="form-select form-select-lg mb-3 form-control @error('prestation_demande') is-invalid @enderror">
                    <option selected>Choisir la prestation</option>
                    <option>Ménage</option>
                    <option>Chauffeur</option>
                    <option>Nounou</option>
                  </select>

                @error('prestation_demande')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
          
            <div class="form-outline mb-4" style="color: #1b9c1e">
                <label class="form-label" for="form4Example1">Mode de travail<span style="color: red">(*)</span></label>
                <select name="mode_travail" 
                    class="@error('mode_travail') is-invalid @enderror form-select form-select-lg mb-3" aria-label=".form-select-lg example" required>
                    <option selected>Choisir le mode </option>
                    <option>Partiel</option>
                    <option>En plein temps</option>
                  </select>
                  
                @error('mode_travail')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
    
            <div class="form-outline mb-4" style="color: #1b9c1e">
                <label class="form-label" for="form1Example2">Salaire proposé<span style="color: red">(*)</span> :</label>
                <input type="text" name="salaire_propose" id="form1Example2" 
                class="form-control form-control-lg @error('salaire_propose') is-invalid @else is-valid @enderror" placeholder="Proposer un salaire svp !" required/>
                @error('salaire_propose')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
             </div>
    
             <div class="form-outline mb-4" style="color: #1b9c1e">
                <label class="form-label" for="form1Example2">Age<span style="color: red">(*)</span></label>
                <input type="text" name="age" id="form1Example2" 
                class="form-control form-control-lg @error('age') is-invalid @else is-valid @enderror" placeholder="Saisissez votre age !" required/>
                @error('age')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
             </div>
    
             <div class="form-outline mb-4" style="color: #1b9c1e">
                <label class="form-label" for="form4Example1">Ethnie :</label>
                <select name="ethnie" 
                class="form-select form-select-lg mb-3 @error('ethnie') is-invalid @else is-valid @enderror">
                    <option selected>Choisissez votre ethnie </option>
                    <option>Baoulé</option>
                    <option>Agni</option>
                    <option>Abron</option>
                    <option>Bété</option>
                  </select>
                  @error('ethnie')
                  <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
            </div>
    
            <div class="form-outline mb-4" style="color: #1b9c1e">
                <label class="form-label" for="form1Example2">Date d'execution<span style="color: red">(*)</span></label>
                <input type="date" name="date" id="form1Example2" class="form-control form-control-lg @error('ethnie') is-invalid @else is-valid @enderror" required/>
                @error('date')
                <div class="alert alert-danger">{{ $message }}</div>
               @enderror
             </div>
          
            <!-- Message input -->
            <div class="form-outline mb-4" style="color: #1b9c1e">
                <label class="form-label" for="form4Example3">Observation :</label>
              <textarea  class="form-control form-control @error('observation') is-invalid @enderror" id="form4Example3" rows="4" name="observation"></textarea>
              @error('observation')
                <div class="alert alert-danger">{{ $message }}</div>
             @enderror
            </div>
            <!-- Submit button -->
            <div class="d-grid gap-2 mx-auto mb-5">
                <button type="submit" class="btn btn-success btn-lg btn-responsive"  style="background: #1b9c1e">Envoyer</button>
            </div>
          </form>
       </div><br><br>
</section>
@endsection