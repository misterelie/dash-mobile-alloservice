@extends('layouts.master')
@section('content')


<style>
    .tab h2 span {
        color: #3601c6;
    }

    .tab h2 {
        margin: 15px 0 0 0;
        font-size: 15px;
        color: #5f5950;
    }

    .tab h2 {
        text-align: left;
        padding-bottom: 7px;
    }

    tab {
        padding: 60px 0;
    }

    .tab code {
        text-align: center;
        padding-bottom: 30px;
        font-weight: bold;
        margin: 15px auto 0px;
        color: red;
        font-size: 13px;
    }

    * {
        box-sizing: border-box;
    }

    /* body {
        background-color: #f1f1f1;
    } */

    #regForm {
        background-color: #ffffff;
        margin: 100px auto;
        padding: 30px;
        margin-top: -5rem;
        width: 100%;
        min-width: 100px;
    }

    h1 {
        text-align: center;
    }

    input {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        border: 1px solid #aaaaaa;
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        --bs-gutter-x: 1.5rem;
        --bs-gutter-y: 0;
        display: none;
        flex-wrap: wrap;
        margin-top: calc(-1 * var(--bs-gutter-y));
        margin-right: calc(-0.5 * var(--bs-gutter-x));
        margin-left: calc(-0.5 * var(--bs-gutter-x));
    }

    button {
        background-color: #1b9c1e;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 17px;
        font-family: Raleway;
        cursor: pointer;
    }

    button:hover {
        opacity: 0.8;
    }

    #prevBtn {
        background-color: #1b9c1e;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #1b9c1e;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #1b9c1e;
    }
</style>

<section class="part-prestataire mb-4">
    <div class="titre-temoignage mb-2" style="background: #3800bf">
        <div class="p-4 shadow-4 w">
            <p class="text-center pt-5" style="color: #fff; font-size: 20px">
                Devenir un prestataire
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

        <form action="{{ route('save.devenirprestataire') }}" method="POST" role="form"
            class="php-email-form" enctype="multipart/form-data" id="regForm">
            @csrf

            <div class="tab">
                <h2 class="text-center">INFORMATIONS <span>PERSONNELLES</span></h2>
                <h5 class="text-center">
                    <code> NB: Les champs marqués par une étoile sont obligatoires .</code><br /><br />
                </h5>

                <div class="row">
                    <div class="col-lg-4 col-md-6 form-group  mt-md-0" style="color: #1b9c1e">
                        <label for=""><span style="color: red">*</span> Nom: </label>
                        <p><input type="text" id="form1Example2"
                                class="form-control form-control-lg @error('nom') is-invalid @enderror" name="nom"
                                placeholder="Saisissez votre nom !" />
                            @error('nom')
                                <div class="alert alert-danger">Veuillez sasir votre nom</div>
                            @enderror
                        </p>
                    </div>

                    <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                        <label for=""><span style="color: red">*</span> Prénoms: </label>
                        <p><input type="text" id="form1Example2" class="form-control form-control-lg 
@error('prenoms') is-invalid @enderror" name="prenoms" placeholder="Saisissez votre prénom !"/>
@error('prenoms')
                                <div class=" alert alert-danger">Veuillez saisir votre prénom
                    </div>
                    @enderror
                    </p>
                </div>

                <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                    <label for=""><span style="color: red">*</span> Civilité: </label>
                    <select class="form-select form-select-lg mb-3" name="civilite">
                        <option selected>Choisir votre civilité</option>
                        <option value="celibataire">Mademoiselle</option>
                        <option value="Marie">Monsieur</option>
                        <option value="Divorce">Madame</option>
                    </select>
                    @error('civilite')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                    <label for=""><span style="color: red">*</span> Date de naissance: </label>
                    <input type="date" class="form-control form-control-lg" name="date_naissance" id="date_appel"
                        placeholder="Précisez la date" required>
                </div>
                @error('date_naissance')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0" style="color: #1b9c1e">
                    <label for="">Situation matrimoniale: </label>
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
                        name="situation_matri">
                        <option>Situation matrimoniale</option>
                        <option>célibataire</option>
                        <option>marié(e)</option>
                        <option>veuve</option>
                        <option>divorcée</option>
                    </select>
                    @error('situation_matri')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                    <label for="">Nombre d'enfant: </label>
                    <p>
                        <input type="text"
                            class="form-control form-control-lg @error('nombre_enfant') is-invalid @enderror"
                            name="nombre_enfant" id="nombre_enfant" placeholder="Saisissez le nombre d'enfant">
                        @error('nombre_enfant')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </p>
                </div>

                <div class="col-lg-4 col-md-6 form-group  mt-md-0" style="color: #1b9c1e">
                    <label for=""><span style="color: red">*</span> Téléphone 1: </label>
                    <p>
                        <input type="number"
                            class="form-control form-control-lg @error('telephone1') is-invalid @enderror"
                            name="telephone1" id="telephone1" placeholder="Ex:0143592128">
                        @error('telephone1')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </p>
                </div>

                <div class="col-lg-4 col-md-6 form-group  mt-md-0" style="color: #1b9c1e">
                    <label for="">Téléphone 2: </label>
                    <p>
                        <input type="number" class="form-control form-control-lg" name="telephone2" id="telephone2"
                            placeholder="Ex:0143592128">
                    </p>
                </div>

                <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                    <label for="">Whatsapp : </label>
                    <p><input type="number" class="form-control form-control-lg" name="whatsapp" id="whatsapp"
                            placeholder="Ex:0143592128">
                    </p>
                </div>

                <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                    <label for=""><span style="color: red">*</span> Adresse mail: </label>
                    <p><input type="email" class="form-control form-control-lg  @error('email') is-invalid @enderror"
                            name="email" id="email" placeholder="Ex: alloservice@gmail.com" required>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </p>
                </div>

                <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                    <label for=""><span style="color: red">*</span>Ethnie : </label>
                    <select class="form-select form-select-lg mb-3" name="ethnie_id">
                        <option>Choisissez votre ethnie</option>
                        @if(!is_null($ethnies))
                            @foreach($ethnies as $ethnie)
                                <option value="{{ $ethnie->id }}"
                                    {{ !is_null(old('ethnie')) ? 'selected' : '' }}>
                                    {{ Str::ucfirst($ethnie->ethnie) }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                    @error('ethnie_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                    <label for="">Commune: </label>
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
                        name="commune_id">
                        <option selected>Choisir votre commune</option>
                        @if(!is_null($communes))
                            @foreach($communes as $comm)
                                <option value="{{ $comm->id }}">
                                    {{ !is_null(old('commune')) ? 'selected' : '' }}
                                    {{ Str::ucfirst($comm->commune) }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>
                @error('commune_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                    <label class="form-label" for="">Quartier: </label>
                    <select class="form-select form-select-lg mb-3" name="quartier_id">
                        <option selected>Choisir votre Quartier</option>
                        @if(!is_null($quartiers))
                            @foreach($quartiers as $quartier)
                                <option value="{{ $quartier->id }}">
                                    {{ !is_null(old('quartier')) ? 'selected' : '' }}
                                    {{ Str::ucfirst($quartier->quartier) }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                    <label class="form-label" for=""><span style="color: red">*</span> Charger une photo:
                        <input class="form-control form-control-lg 
@error('photo') is-invalid @enderror" type="file" name="photo" placeholder=".form-control-lg">
@error('photo')
                                <span class=" text-danger">{{ $message }}</span>
                        @enderror
                </div>

            </div>
    </div>

    <div class="tab">
        <h2 class="text-center">INFORMATIONS <span>PROFESSIONNELLES</span></h2>
        <h5 class="text-center">
            <code>
                NB: Les champs marqués par une étoile sont obligatoires .
            </code> <br /><br />
        </h5>
        <div class="row">
            <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                <label for="">Domaine d'activité : </label>
                <select class="form-select form-select-lg mb-3" name="domaine_id">
                    <option selected>Choisissez votre domaine d'activité</option>
                    @if(!is_null($domaines))
                        @foreach($domaines as $domaine)
                            <option value="{{ $domaine->id }}">
                                {{ !is_null(old('domaine')) ? 'selected' : '' }}
                                {{ Str::ucfirst($domaine->domaine) }}
                            </option>
                        @endforeach
                    @endif
                </select>
                @error('domaine_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                <label for="">Année d'expérience : </label>
                <select class="form-select form-select-lg mb-3 @error('anne_experience') is-invalid @enderror"
                    aria-label=".form-select-lg example" name="annee_experience">
                    <option selected>Année d'expérience</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
                @error('annee_experience')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                <label for="">Prétention salariale: </label> <code><span style="color:red">*</code>
                <p><input type="text"
                        class="form-control form-control-lg @error('pretention_salariale') is-invalid @enderror"
                        name="pretention_salairiale" id="pretention_salairiale" placeholder="Précisez votre salaire">
                    @error('pretention_salariale')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </p>
            </div>

            <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                <label for="">Zone d'intervention: </label>
                <select class="form-select form-select-lg mb-3  @error('zone_intervention') is-invalid @enderror"
                    aria-label=".form-select-lg example" name="zone_intervention" name="zone_intervention">
                    <option selected>Zone d'intervention</option>
                    <option>Informatique</option>
                    <option>Big Data</option>
                    <option>Analyse données</option>
                </select>
                @error('zone_intervention')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                <label for="">Personne à contacter : </label> <code><span style="color:red">*</code>
                <p><input type="text"
                        class="form-control form-control-lg @error('zone_intervention') is-invalid @enderror"
                        name="personne_contact" placeholder="Veuillez saisir son nom" required>
                    @error('personne_contact')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </p>
            </div>

            <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                <label for="">Référence: </label><code><span style="color:red">*</code>
                <p><input type="text" class="form-control form-control-lg @error('reference') is-invalid @enderror"
                        name="reference" id="reference" placeholder="Saisir la référence">
                    @error('reference')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </p>
            </div>

            <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                <label for="">Référence contact: </label> <code><span style="color:red">*</code>
                <p><input type="number" class="form-control form-control-lg" name="reference_contact"
                        id="reference_contact" placeholder="Contact"></p>
            </div>
            @error('reference_contact')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                <label for="">Alphabétisation: </label>
                <select class="form-select form-select-lg" name="alphabet_id">
                    @if(!is_null($alphabets))
                        @foreach($alphabets as $alphabet)
                            <option value="{{ $alphabet->id }}">
                                {{ !is_null(old('alphabet_id')) ? 'selected' : '' }}
                                {{ Str::ucfirst($alphabet->alphabet) }}
                            </option>
                        @endforeach
                    @endif
                </select>
                @error('alphabet_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                <label for="">Dernier diplôme : </label>
                <select class="form-select form-select-lg mb-3" name="diplome_id">
                    @if(!is_null($diplomes))
                        @foreach($diplomes as $diplome)
                            <option value="{{ $diplome->id }}">
                                {{ !is_null(old('diplome_id')) ? 'selected' : '' }}
                                {{ Str::ucfirst($diplome->diplome) }}
                            </option>
                        @endforeach
                    @endif
                </select>
                @error('diplome_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="tab">
        <h2 class="text-center">AUTRES <span>INFORMATIONS</span></h2>
        <h5 class="text-center">
            <code>
                NB: Les champs marqués par une étoile sont obligatoires .
            </code> <br /><br />
        </h5>
        <div class="row">
            <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                <label for="">Mode de travail: </label>
                <select class="@error('mode_id') is-invalid @enderror form-select form-select-lg mb-3" name="mode_id">
                    <option selected>Mode de travail</option>
                    @if(!is_null($modes))
                        @foreach($modes as $mode)
                            <option value="{{ $mode->id }}">
                                {{ !is_null(old('mode_id')) ? 'selected' : '' }}
                                {{ Str::ucfirst($mode->mode) }}
                            </option>
                        @endforeach
                    @endif
                </select>
                @error('mode_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                <label for="">Disponibilité : </label>
                <select class="form-select form-select-lg mb-3" name="dispo_id">
                    <option>Votre Disponibilité</option>
                    @if(!is_null($dispos))
                        @foreach($dispos as $dispo)
                            <option value="{{ $dispo->id }}">
                                {{ !is_null(old('dispo_id')) ? 'selected' : '' }}
                                {{ Str::ucfirst($dispo->dispo) }}
                            </option>
                        @endforeach
                    @endif
                </select>
                @error('dispo_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                <label for="">Nature de la pièce : </label>
                <select class="form-select form-select-lg mb-3 
                    @error('piece_id') is-invalid @enderror" aria-label=".form-select-lg example"
                            name=" piece_id">
                    <option selected>Nature de la pièce</option>
                    @if(!is_null($pieces))
                        @foreach($pieces as $piece)
                            <option value="{{ $piece->id }}">
                                {{ !is_null(old('piece_id')) ? 'selected' : '' }}
                                {{ Str::ucfirst($piece->piece) }}
                            </option>
                        @endforeach
                    @endif
                </select>
                @error('piece_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                <label for="">Numéro de la pièce : </label> <code><span style="color:red">*</code>
                <p><input class="form-control form-control-lg" type="text" name="numero_piece"
                        placeholder="Numéro de la pièce"></p>
            </div>
            @error('numero_piece')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                <label for="">Rencontre avec Allô Service ? : </label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="canal_id">
                    <option selected>--Sélectionner un champ</option>
                    @if(!is_null($canals))
                        @foreach($canals as $canal)
                            <option value="{{ $canal->id }}">
                                {{ !is_null(old('canal_id')) ? 'selected' : '' }}
                                {{ Str::ucfirst($canal->canal) }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
            @error('canal_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                <label for="">Date de l'appel : </label> <code><span style="color:red">*</code>
                <input type="date" class="form-control form-control-lg" name="date_appel" id="date_appel"
                    placeholder="Précisez la date">
                @error('date_appel')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                <label for="">Copie de la pièce: </label> <code><span style="color:red">*</code>
                <p><input type="file" class="form-control form-control-lg" name="copie_piece" placeholder="">
                    @error('copie_piece')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </p>
            </div>


            <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                <label class="form-label" for="">Copie du dernier diplôme: </label> <code><span
                        style="color:red">*</code>
                <p><input class="form-control form-control-lg" id="formFileLg" name="copie_dernier_diplome" type="file">
                </p>
            </div>

            @error('copie_dernier_diplome')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="col-lg-4 col-md-6 form-group mt-md-0" style="color: #1b9c1e">
                <label for="">Catalogue de realisation : </label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
                    name="catalogue_realisation">
                    <option selected>Choisir</option>
                    <option>Oui</option>
                    <option>Nom</option>
                </select>
                @error('catalogue_realisation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="form4Example3">Observation</label>
                <textarea class="form-control form-control-lg" id="form4Example3" rows="4" name="avis">
                        </textarea>
            </div>

        </div>
    </div>
    <div style="overflow:auto;">
        <div style="float:right;">
            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Retour</button>
            <button type="button" id="nextBtn" onclick="nextPrev(1)">Suivant</button>
        </div>
    </div>
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
    </div>
    </form>

    </div>
</section>
@endsection
@yield('js')