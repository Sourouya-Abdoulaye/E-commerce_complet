<?php
namespace App\Controllers;
use App\Models\Cmd;

class CmdController extends Controller  { 

    public function index() {
        if (isset($_SESSION['connexion'])) {
            $commandes=Cmd::all();

            $contenu="cmd/index.php";
            $nbre_cmd=count($commandes);
            $mes_data=compact("contenu",'commandes','nbre_cmd');
            $this->render("layout/layout.php",$mes_data);
            
        } else {

            echo "vous n'este pas connecter";
            header("Location:/");

        }  





    }



   

    public function store() {
        echo "enregistrer commande";
       


            
       






    }

    

    public function ajouter($id,$categorie="produits")   {
       


    
        
    }


    public function update($id,$action) {
       
        header("Location:/panier");

    }

    public function vider() {
        // Vider le panier
        
       

    }

    public function validerCommande()   {
        // Passer le panier en commande
    }




}



?>