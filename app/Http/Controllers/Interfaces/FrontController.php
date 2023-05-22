<?php

namespace App\Http\Controllers\Interfaces;

use Exception;
use App\Models\Mode;
use App\Models\Dispo;
use App\Models\Piece;
use App\Models\Ethnie;
use App\Models\Commune;
use App\Models\Contact;
use App\Models\Diplome;
use App\Models\Domaine;
use App\Models\Alphabet;
use App\Models\Quartier;
use App\Models\Prestation;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;
use App\Models\DemandePrestation;
use App\Models\DevenirPrestataire;
use App\Http\Controllers\Controller;
use App\Models\Canal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class FrontController extends Controller
{
    public function index(){
        return view('front.index');
    }

    /* DEMANDE DE PRESTATION */
    public function demande_prestation(){
        $prestations = Prestation::orderBy('id','asc')->get();
        $ethnies = Ethnie::all();
        $modes = Mode::all();
        return view('front.prestation', compact('prestations', 'ethnies', 'modes'));
    }

    public function send_contact(){
        return view('front.contact');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'nom' => 'required',
            'prenoms' => 'required',
            'telephone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:10',
            'email' => 'nullable|email:unique',
            'prestation_id' => 'required',
            'mode_id' => 'required',
            'salaire_propose' => 'required|numeric|min:0',
            'age_demande' => 'required',
            'ethnie_id' => 'nullable',
            'date_demande' => 'required',
            'heure_demande'  => 'required',
            'observation' => 'nullable'
        ]);
        $askprestations = new DemandePrestation();
        $askprestations->nom = $request->nom;
        $askprestations->prenoms = $request->prenoms;
        $askprestations->email = $request->email;
        $askprestations->telephone = $request->telephone;
        $askprestations->prestation_id = $request->prestation_id;
        $askprestations->mode_id = $request->mode_id;
        $askprestations->salaire_propose = intval($request->salaire_propose);
        $askprestations->age_demande = $request->age_demande;
        $askprestations->ethnie_id = $request->ethnie_id;
        $askprestations->date_demande = $request->date_demande;
        $askprestations->heure_demande = $request->heure_demande;
        $askprestations->observation = $request->observation;
        $askprestations->save();
        return redirect()->back()->with('success', 'Félicitations!  Votre demande a été envoyé avec succès ');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store_prestataire(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'nom' => 'required',
            'prenoms' => 'required',
            'civilite' => 'required',
            'date_naissance' => 'required',
            'situation_matri' => 'required',
            'nombre_enfant' => 'nullable',
            'telephone1' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:10',
            'telephone2' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|max:10',
            'whatsapp' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|max:10',
            'email' => 'required|email',
            'ethnie_id' => 'required',
            'commune_id' => 'required',
            'quartier_id' => 'required',
            'photo' => 'required',
            'domaine_id' => 'required',
            'annee_experience' => 'nullable',
            'pretention_salairiale' => 'required|numeric|min:0',
            'zone_intervention' => 'required',
            'personne_contact' => 'required',
            'reference' => 'required',
            'reference_contact' => 'required',
            'alphabet_id' => 'required',
            'diplome_id' => 'required',
            'mode_id' => 'required',
            'dispo_id' => 'required',
            'piece_id' => 'required',
            'numero_piece' => 'required',
            'copie_piece' => 'required|mimes:png,jpg,jpeg,csv,txt,pdf|max:2048',
            'canal_id' => 'nullable',
            'date_appel' => 'required', 
            'copie_dernier_diplome' => 'nullable|mimes:png,jpg,jpeg,csv,txt,pdf|max:2048', 
            'catalogue_realisation' => 'required',
            'avis' => 'nullable',
        ]);

        $devenirprestataires = new DevenirPrestataire();
        $devenirprestataires->nom = $request->nom;
        $devenirprestataires->prenoms = $request->prenoms;
        $devenirprestataires->civilite = $request->civilite;
        $devenirprestataires->date_naissance = $request->date_naissance;
        $devenirprestataires->situation_matri = $request->situation_matri;
        $devenirprestataires->nombre_enfant = $request->nombre_enfant;
        $devenirprestataires->telephone1 = $request->telephone1;
        $devenirprestataires->telephone2 = $request->telephone2;
        $devenirprestataires->whatsapp = $request->whatsapp;
        $devenirprestataires->email = $request->email;
      
         //tratietement d'image
        if ($request->hasFile('photo')) {
            $imag = $request->photo;
            $imageName = time() . '.' . $imag->Extension();
            $imag->move(public_path("PrestatairePhoto"), $imageName);
            $devenirprestataires->photo = $imageName;
        }
        //TRAITEMENT COPIER DE LA PIECE

        if ($request->hasFile('copie_piece')) {
            $filename = $request->copie_piece;
            //dd($filename);
            $imageName = time() . '.' . $filename->Extension();
            $filename->move(public_path("FichierCopiepiece"), $imageName);
            $devenirprestataires->copie_piece = $imageName;
        }
        //TRAITEMENT COPIE DU DERNIER DIPLOME
        if ($request->hasFile('copie_dernier_diplome')) {
            $filename = $request->copie_dernier_diplome;
            $filepiece = time() . '.' . $filename->Extension();
            $filename->move(public_path("uploads"), $filepiece);
            $devenirprestataires->copie_dernier_diplome = $filepiece;
        }

        if (!is_null($request->quartier_id)) {
            $devenirprestataires->quartier_id = $request->quartier_id;
        }

        if (!is_null($request->commune_id)) {
            $devenirprestataires->commune_id = $request->commune_id;
        }

        if (!is_null($request->ethnie_id)) {
            $devenirprestataires->ethnie_id = $request->ethnie_id;
        }

        if (!is_null($request->domaine_id)) {
            $devenirprestataires->domaine_id = $request->domaine_id;
        }

        if (!is_null($request->alphabet_id)) {
            $devenirprestataires->alphabet_id = $request->alphabet_id;
        }

        if (!is_null($request->diplome_id)) {
            $devenirprestataires->diplome_id = $request->diplome_id;
        }

        if (!is_null($request->mode_id)) {
            $devenirprestataires->mode_id = $request->mode_id;
        }

        if (!is_null($request->dispo_id)) {
            $devenirprestataires->dispo_id = $request->dispo_id;
        }

        if (!is_null($request->piece_id)) {
            $devenirprestataires->piece_id = $request->piece_id;
        }

        if (!is_null($request->canal_id)) {
            $devenirprestataires->canal_id = $request->canal_id;
        }

        $devenirprestataires->annee_experience = $request->annee_experience;
        $devenirprestataires->pretention_salairiale = $request->pretention_salairiale;
        $devenirprestataires->zone_intervention = $request->zone_intervention;
        $devenirprestataires->personne_contact = $request->personne_contact;
        $devenirprestataires->reference = $request->reference;
        $devenirprestataires->reference_contact = $request->reference_contact;
        $devenirprestataires->numero_piece = $request->numero_piece;
        $devenirprestataires->date_appel = $request->date_appel;
        $devenirprestataires->catalogue_realisation = $request->catalogue_realisation;
        $devenirprestataires->avis = $request->avis;
        $devenirprestataires->save();
        return redirect()->back()->with('success', 'Félicitations!  Votre demande a été envoyé avec succès ');
    }

    //SOTRE CONTACT
    public function store_contact(Request $request){
        //dd($request->all());
        $request->validate([
            'nom' => 'required',
            'prenoms' => 'required',
            'email' => 'required',
            'objet' => 'required',
            'message' => 'required',
        ]);
        $contact = new Contact();
        $contact->nom = $request->nom;
        $contact->prenoms = $request->prenoms;
        $contact->email = $request->email;
        $contact->objet = $request->objet;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back()->with('success', 'Félicitations!  Votre demande a été envoyé avec succès ');
        
    }

     //devenir un prestataire
     public function prestataire(){
        $ethnies = Ethnie::all();
        $communes = Commune::all();
        $quartiers = Quartier::all();
        $domaines = Domaine::all();
        $alphabets = Alphabet::all();
        $canals = Canal::all();
        $modes = Mode::all();
        $dispos = Dispo::all();
        $pieces = Piece::all();
        $diplomes = Diplome::all();
        return view('front.prestataire', 
              compact('ethnies', 'pieces','communes', 'quartiers', 'domaines', 'alphabets', 'diplomes', 'dispos', 'modes', 'canals'));
    }

    //all prestations
    public function all_prestations(){
        return view('front.nos-prestations');
    }

    //temongnage
    public function testimonial(){
        return view('front.temoignage');
    }

    public function help(){
        return view('front.assistance');
    }
}
