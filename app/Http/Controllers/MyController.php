<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lieu;
use App\Models\Sport;
use App\Models\Competition;
use App\Models\Spectateur;
use Illuminate\Support\Facades\Hash;

class MyController extends Controller
{
    
    /*public function accueilClient(){
        return view("home_clients");
    }*/

    public function afficheCalendrier(){
        $comps = Competition::all();
        
        return view("calendrier",['liste' => $comps]);
    }

    public function chercherSport(Request $request){

        $request->validate(['nom' => 'required|string']);

        $sport = Competition::with('sport')->whereRelation('sport','nom', "=", $request->nom)->get();

        //echo $sport;
        return view("calendrier",['liste' => $sport]);
        
    }

    public function billetterie(){
        $comps = Competition::all();
        return view("billetterie",['liste' => $comps]);
    }

    public function chercherprix(Request $request){

        $request->validate(['prix_min' => 'required','prix_max' => 'required']);
        $comps = Competition::whereBetween('prix',[$request->prix_min,$request->prix_max])->get();

        return view("billetterie",['liste' => $comps]);
    }

    public function acheter(Request $request){
        
        $request->validate(['nom' => 'required|string','prenom' => 'required|string', 'email' => 'required|email', 'comp' => 'required|string']); //on verifie les champs

        //on cherche les deux competitions
        $comp = Competition::where('nom', $request->comp)->first();
        $comp2 = Competition::where('nom', $request->comp2)->first();

        

        
        if($comp != $comp2){

        
        //test pour voir si la personne qui reserve existe dans la DB
        $testmain = Spectateur::where('nom', $request->nom)->where('prenom',$request->prenom)->where('email',$request->email)->first();  // on regarde si il y a deja cette personne dans la DB
        

        //si il existe pas dans la DB on le cree sinon on lie juste la competition
        if(!$testmain){  //la personne qui reserve est nouveau
            $spec = new Spectateur();
            $spec->nom = $request->nom;
            $spec->prenom = $request->prenom;
            $spec->email = $request->email;
            $spec->tel = $request->tel;

            $spec->save();
            
            //on test si les competitions existent et ne sont pas les mêmes
            if($comp){
                $spec->competition()->attach($comp); 
            }else{
                echo "Compétition 1 non reconnu ou même competition. Veuillez reessayer.";
            }

            if($comp2){
                $spec->competition()->attach($comp2);
            }else{
                "Compétition 2 non reconnu ou même competition. Veuillez reessayer.";
            }
            
        }else if($testmain){ //la personne qui reserve existe deja dans la DB
            
            //test pour verifier si il a deja reservé pour cette compétition
            $testcomp = Spectateur::find($testmain->id)->competition->where('id',$comp->id); 
            $testcomp2 = Spectateur::find($testmain->id)->competition->where('id',$comp2->id);
            
            //il a pas reservé pour les competitions
            if(!$testcomp){
                $testmain->competition()->attach($comp);   
            }
            if(!$testcomp2){
                $testmain->competition()->attach($comp2);   
            }

        }
        
        //on teste la 1ere personne
        $person1 = Spectateur::where('nom', $request->nom1)->where('prenom',$request->prenom1)->where('email',$request->email)->first(); 

        if(!$person1){ //la 1ere personne n'existe pas dans la DB
            if($request->nom1 && $request->prenom1){ //si on veut reserver pour une personne
                $spec1 = new Spectateur();
                $spec1->nom = $request->nom1;
                $spec1->prenom = $request->prenom1;
                $spec1->email = $request->email;
                $spec1->tel = $request->tel;    

                $spec1->save();

                if($comp){  //on verifie si la competition existe
                    $spec1->competition()->attach($comp); 
                } else{
                    echo "Compétition 1 non reconnu. Veuillez reessayer.";
                }

                if($comp2){  
                    $spec1->competition()->attach($comp2); 
                } else{
                    echo "Compétition 2 non reconnu. Veuillez reessayer.";
                }
            
            }else if($person1){ //la personne pour qui on reserve existe deja dans la DB

                //test pour verifier si il a deja reserver pour cette compétition
                $testcomp = Spectateur::find($person1->id)->competition->where('id',$comp->id); 
                $testcomp2 = Spectateur::find($person1->id)->competition->where('id',$comp2->id);
                
                //si il a pas reservé pour ces competitions
                if(!$testcomp){
                    $person1->competition()->attach($comp);   
                }
                if(!$testcomp2){
                    $person1->competition()->attach($comp2);   
                }
            }
            
            
       
        }
        
        //on teste la 2eme personne
        $person2 = Spectateur::where('nom', $request->nom2)->where('prenom',$request->prenom2)->where('email',$request->email)->first(); 

        if(!$person2){ // la seconde personne n'existe pas dans la DB
            if($request->nom2 && $request->prenom2){ //si on veut reserver pour une seconde personne
            $spec2 = new Spectateur();
            $spec2->nom = $request->nom2;
            $spec2->prenom = $request->prenom2;
            $spec2->email = $request->email;
            $spec2->tel = $request->tel;

            $spec2->save();

            //si les competitions existent
            if($comp){
               $spec2->competition()->attach($comp); 
            }else{
                echo "Compétition 1 non reconnu. Veuillez reessayer.";
            }

            if($comp2){
                $spec2->competition()->attach($comp2); 
             }else{
                 echo "Compétition 2 non reconnu. Veuillez reessayer.";
             }
            
  
            }else if($person2){ //la seconde personne existe dans la DB
                
                //test pour verifier si il a deja reservé pour cette compétition
                $testcomp = Spectateur::find($person2->id)->competition->where('id',$comp->id); 
                $testcomp2 = Spectateur::find($person2->id)->competition->where('id',$comp2->id);
                
                if(!$testcomp){
                $person2->competition()->attach($comp);   
                }
                if(!$testcomp2){
                    $person2->competition()->attach($comp2);   
                }
            
            }
        }
        if($testmain){
            return view("recap", ['liste' => $testmain]);
           }else{
            return view("recap", ['liste' => $spec]);
           }
    }else{
        echo "Les deux compétitions que vous voulez reserver sont identiques. Veuillez ressayer";
    }
       
        

    }

    
}
