<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Lieu;
use App\Models\Sport;
use App\Models\Competition;
use App\Models\Spectateur;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function createForm(){
        return view('create_login');
    }
    
    public function create(Request $request){ //pour l'inscription de l'admin
        $request->validate([      
            'name'=>'required|string',
            'email'=>'required|email',
            'password' => 'required|min:4'
        ]);
    

        User::create([    //on cree un nouveau utlisateur
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' =>Hash::make($request->input('password'))
        ]);
        echo "Votre inscription a bien été enregistré";

        return redirect()->route('auth.login');
    }

    public function account(){   //pour affichage de la page du compte admin
        return view('admin.admin_account');
    }

     public function message(){
        return view('admin.admin_messages');
    }

    public function formAdminLieu(){  //pour affichage de la page pour ajouter un lieu
        $lieux = Lieu::all();

        return view("admin.admin_formlieu",['liste' => $lieux]);
        
    }

    public function ajouterLieu(Request $request){  //controller pour ajouter un lieu à la DB 
        
        $request->validate(['nom' => 'required|string','capacite_max' => 'required|integer']);
        $test = Lieu::where('nom', $request->nom)->first();

        if ($test == []){ //si le lieu n'existe pas
            $lieu = new Lieu();
            $lieu->nom = $request->nom;
            $lieu->capacite_max = $request->capacite_max;
            $lieu->save();

            echo "Le lieu a bien été enregistré";
        }else{
            echo "Le lieu " . '<b>' . $request->nom . '</b>' . " a deja été enregistré <br>";
            echo "Veuillez saisir un nouveau lieu.";
        }
    
    }
    
   
    public function formAdminSport(){  //pour afficher la page pour ajouter un sport
        $sports = Sport::all();

        return view("admin.admin_formsport", ["liste" => $sports]);
    }
    
    
    public function ajouterSport(Request $request){ //controller pour ajouter un sport à la DB

        $request->validate(['nom' => 'required|string']);
        $test = Sport::where('nom', $request->nom)->first();
        if($test ==[]){
            $sport = new Sport();
            $sport->nom = $request->nom;
            $sport->save();
            echo "Le sport a bien été enregistré";
        }else{
            echo "Le sport " . '<b>' . $request->nom . '</b>' . " a deja été enregistré <br>";
            echo "Veuillez saisir un autre sport.";
        }
        
    }

   
    public function formAdminComp(){
        $comps = Competition::all();
        return view("admin.admin_formcomp", ['liste' => $comps]);
    }

    public function ajouterComp(Request $request){

        $request->validate(["nom" => "required|string"]);

        $test = Competition::where('nom', $request->nom)->first();

        if($test){
            echo "La compétition" . '<b> ' . $request->nom . "</b>" . " a deja été enregistré <br>";
            echo "Veuillez saisir une autre compétition.";
        }else{
            $comp = new Competition();
        $comp->nom = $request->nom;
        
        $lieu = Lieu::where('nom',$request->lieu)->first();
        $sport = Sport::where('nom',$request->sport)->first();

        
        $comp->sport()->associate($sport);
        $comp->lieu()->associate($lieu);


        $comp->jour = $request->jour;
        $comp->heure_debut = $request->heure_debut;
        $comp->heure_fin = $request->heure_fin;
        $comp->prix = $request->prix;
        
        
        $comp->save();

        echo "La competition a bien été enregistré"; 
        }

       
    }

    public function formAdminMajComp(){
        $comps = Competition::all();
        return view("admin.admin_majcomp", ['liste' => $comps]);
    }

    public function majComp(Request $request){

        $request->validate(['id' => 'required|integer']);

        $comp = Competition::where("id",$request->id)->first();

        $lieu = Lieu::where('nom',$request->new_lieu)->first();
        $sport = Sport::where('nom',$request->new_sport)->first();

        if($request->new_nom){
            $comp->nom = $request->new_nom;
        }
        if($request->new_sport){
            $sport = Sport::where("nom",$request->new_sport)->first();
            
            if(!$sport){
                echo "Sport non reconnu";
            }else{
                $comp->sport()->associate($sport);
                $comp->sport_id = $sport->id;
            }
            
        }
        if($request->new_lieu){
            $lieu = Lieu::where("nom",$request->new_lieu)->first();

            if(!$lieu){
                echo "Lieu non reconnu";
            }else{
                $comp->lieu()->associate($lieu);
                $comp->lieu_id = $lieu->id;
            }
            
        }
        if($request->new_jour){
            $comp->jour = $request->new_jour;
        }
        if($request->new_heure_d){
            $comp->heure_debut = $request->new_heure_d;
        }
        if($request->new_heure_f){
            $comp->heure_fin = $request->new_heure_f;
        }

        
        $comp->save();
        
        return redirect('admin/admin_majcomp');
        //echo "Fin update";
    }

    public function formDelComp(){
        $comps = Competition::all();
        return view('admin.admin_formdelcomp',['liste' => $comps]);
    }

    public function delComp(Request $request){
        $request->validate(["nom" => 'required|string']);

        $comp = Competition::where('nom',$request->nom)->first();
        if($comp){
            $comp->delete();
            echo "Supprimer OK";
        }else{
            echo "Impossible de supprimer";
        }
        
    }

    


    public function voirReservation(){
       $spec= Spectateur::all();
       
        return view('admin.admin_voirachat', ['liste' =>$spec]);
    }


    public function voirNBSpectateur(){
        $comps = Competition::all();
        return view('admin.admin_voirplace', ['liste' =>$comps]);
    }

    public function voirPlaceRestant(){
        $comps = Competition::all();
        return view('admin.admin_voirplacerestant', ['liste' =>$comps]);
    }

   

}
