<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Prestation;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index(){
        return view('admin.dashboard');
    }

    //NOS PRESTATION
    public function liste_prestation(){
        $prestations = Prestation::all();
        return view('admin.nos-prestations.index', compact('prestations'));
    }

    public function save_prestation(Request $request){
        //dd($request->all());
        $request->validate([
            'libelle' => 'required',
            'image_prestation' => 'required',
    
        ]);
        $prestations = new Prestation();
        $prestations->libelle = $request->libelle;

        if ($request->hasFile('image_prestation')) {
            $filename = $request->image_prestation;
            $fileprestation = time() . '.' . $filename->Extension();
            $filename->move(public_path("uploadsprestation"), $fileprestation);
            $prestations->image_prestation = $fileprestation;
        }
        $prestations->save();
        return redirect()->back()->with('success', 'Félicitations!  Vous avez la prestation  ajouté avec succès ');
    }
    
    public function update(Request $request, Prestation $prestation){
            $request->validate([
                'libelle' => 'required',
                'image_prestation' => 'nullable',
            
                ]);

                $prestation->libelle = $request->libelle;

                if ($request->hasFile('image_prestation')) {
                    $filename = $request->image_prestation;
                    $fileprestation = time() . '.' . $filename->Extension();
                    $filename->move(public_path("uploadsprestation"), $fileprestation);
                    $prestation->image_prestation = $fileprestation;
                }
                $prestation->update();
                return redirect()->back()->with('success', 'Félicitations!  Vous mis à jour la prestation avec succès ');
            }

            public function delete(Prestation $prestation){
                $prestation->delete();
                return back()->with("success", "Cette prestation a été supprimé avec succès !");
            }
}
