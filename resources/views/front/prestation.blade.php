@extends('layouts.master')
@section('content')


<style>
    .form-control{
        border-color: #3800bf;
    }
</style>
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

          <h6 class="text-center" style="color: red; font-size: 12px">
            NB: Les champs marqués par une étoile <br> sont obligatoires
         </h6><br>

            <!-- Name input -->

            <div class="form-outline mb-3" style="color: #1b9c1e">
                <label class="form-label" for="form1Example2"> <span style="color: red">*</span> Nom :</label>
                <input type="text" id="form1Example2" 
                    class="form-control form-control-lg @error('nom') is-invalid @enderror" name="nom"
                placeholder="Saisissez votre nom !"/>
                    @error('nom')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div>

            <div class="form-outline mb-3" style="color: #1b9c1e">
                <label class="form-label" for="form1Example2"> <span style="color: red">*</span> Prénoms :</label>
                <input type="text" id="form1Example2" 
                    class="form-control form-control-lg @error('prenoms') is-invalid @enderror" name="prenoms"
                placeholder="Saisissez votre prénom !"/>
                    @error('prenoms')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div>

            <div class="form-outline mb-3" style="color: #1b9c1e">
                <label class="form-label" for="form1Example2"> <span style="color: red">*</span> Téléphone :</label>
                <input type="text" id="form1Example2" 
                    class="form-control form-control-lg @error('telephone') is-invalid @enderror" name="telephone"
                placeholder="Saisissez votre numéro de téléphone !"/>
                    @error('telephone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div>

            <div class="form-outline mb-3" style="color: #1b9c1e">
                <label class="form-label" for="form1Example2">Email :</label>
                <input type="email" id="form1Example2" 
                    class="form-control form-control-lg" name="email"
                placeholder="Saisissez votre email !"/>
                    
            </div>

            <div class="form-outline mb-3" style="color: #1b9c1e">
                <label class="form-label" for="form4Example1"><span style="color: red">*</span> Choisir la prestation :</label>
                <select name="prestation_id" class="form-select form-select-lg mb-3 form-control 
                @error('prestation_id') is-invalid @enderror">
                <option value="">-- Sélectionnez une option --- </option>
                @if (!is_null($prestations))
                    @foreach ($prestations as $prestation)
                        <option value="{{ $prestation->id }}"
                            {{ !is_null(old('prestation_id')) ? 'selected' : '' }}>
                            {{ Str::ucfirst($prestation->libelle) }}
                        </option>
                    @endforeach
                @endif
                </select>

                @error('prestation_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
          
            <div class="form-outline mb-3" style="color: #1b9c1e">
                <label class="form-label" for="form4Example1"><span style="color: red">*</span> Mode de travail :</label>
                <select name="mode_id" class="@error('mode_id') is-invalid @enderror form-select form-select-lg mb-3 form-control">
                    <option value="">-- Sélectionnez une option ---</option>
                    @if (!is_null($modes))
                        @foreach ($modes as $mode)
                            <option value="{{ $mode->id }}"
                                {{ !is_null(old('mode')) ? 'selected' : '' }}>
                                {{ Str::ucfirst($mode->mode) }}
                            </option>
                        @endforeach
                    @endif
                </select>
                @error('mode_id')
                <span class="text-danger">{{ $message }}</span>
               @enderror
            </div>
    
            <div class="form-outline mb-3" style="color: #1b9c1e">
                <label class="form-label" for="form1Example2"> <span style="color: red">*</span> Salaire proposé :</label>
                <input type="text" id="form1Example2" 
                    class="form-control form-control-lg @error('salaire_propose') is-invalid @enderror" name="salaire_propose"
                placeholder="Proposez un salaire en FCFA !"/>
                    @error('salaire_propose')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div>
    
            <div class="form-outline mb-3" style="color: #1b9c1e">
                <label class="form-label" for="form1Example2">Age :</label>
                <input type="text" id="form1Example2" 
                    class="form-control form-control-lg" name="age_demande"
                placeholder="Saisissez votre age !"/>
            </div>

            <div class="form-outline mb-3" style="color: #1b9c1e">
                <label class="form-label" for="form4Example1">Ethnie:</label>
                <select name="ethnie_id" class="form-select form-control form-select-lg mb-3">
                    <option value="">-- Sélectionnez une option ---</option>
                    @if (!is_null($ethnies))
                        @foreach ($ethnies as $ethnie)
                            <option value="{{ $ethnie->id }}"
                                {{ !is_null(old('ethnie')) ? 'selected' : '' }}>
                                {{ Str::ucfirst($ethnie->ethnie) }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>

             <div class="form-outline mb-3" style="color: #1b9c1e">
                <label class="form-label" for="form1Example2">Date d'exécution  :</label>
                <input type="date" id="form1Example2" 
                    class="form-control form-control-lg" name="date_demande"
                placeholder="Saisissez la date !"/>
            </div>

             <div class="form-outline mb-3" style="color: #1b9c1e">
                <label class="form-label" for="form1Example2">Heure :</label>
                <input type="time" id="form1Example2" 
                    class="form-control form-control-lg" name="heure_demande"
                placeholder="Saisissez  l'heure !"/>
            </div>
            <!-- Message input -->
            <div class="form-outline mb-3" style="color: #1b9c1e">
                <label class="form-label" for="form4Example3">Voulez-vous précicez quelques choses ?</label>
              <textarea  class="form-control form-control" id="form4Example3" rows="4" name="observation" placeholder="Vous pouvez écrire ici !"></textarea>
            </div>
            <!-- Submit button -->
            <div class="d-grid gap-2 mx-auto mb-5">
                <button type="submit" class="btn btn-success btn-lg btn-responsive"  style="background: #1b9c1e">Envoyer</button>
            </div>
          </form>
       </div><br><br>
</section>
@endsection