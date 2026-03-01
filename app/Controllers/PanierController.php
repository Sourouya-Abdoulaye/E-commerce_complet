<?php
namespace App\Controllers;
use App\Models\Article;

class PanierController extends Controller  { 

   

    public function index() {
        $nbr_produit=0;
        $mon_panier=[];
        $products=Article::all();
        //on verifie si le panier existe e
        if (isset($_SESSION['panier']) && count($_SESSION['panier'])!==0) {
            $mon_panier=$_SESSION['panier'];
            $nbr_produit=count($mon_panier);
        }
            
        // Afficher le panier
        $data=compact("nbr_produit","mon_panier","products");
        $this->render("auth/panier.php",$data);

    }

    public function ajouter($id,$categorie="produits")   {
        echo "ajout $id $categorie";
        $produit_panier=Article::find($id);

        //"Si produit existe et n’est pas null, alors retourne produit, sinon retourne null."
        $produit=($produit_panier) ?? null ;
        $produit['qte']=1;
        $_SESSION['panier'][$produit['id']]=$produit;

        if ($categorie=='produits') {
            header("Location:/$id?#$categorie");
        } else {
            header("Location:/$id?categorie=$categorie#categorie");
        }
        
    }


    public function update($id,$action) {
        //comme ces operation necessite un panier donc on verifie si il existe
        // et que le produit existe aussi et que action est entre + | -
        
        if ( isset($_SESSION['panier'])  && isset($_SESSION['panier'][$id])  ) {
            $produit=$_SESSION['panier'][$id];
            if ($action==='plus' ) {
                $produit['qte']+=1;
                $_SESSION['panier'][$id]=$produit;
                //ajout de quantiter  
                print_r($produit);
                //die("augm de article ".$id);
            
            } else if ($action==='moin' && $produit['qte']>1 ) {
                $produit['qte']-=1;
                $_SESSION['panier'][$id]=$produit;
                //dimunition de quantiter
                print_r($produit);
               // die("dim de article ".$id);
            }
        
            header("Location:/panier");

        }
         else {
            die("produit introuvable ");
            
        }

    }

    public function delete($id) {
        // Supprimer un produit
        echo "sup de $id";
        if ( isset($_SESSION['panier'])  && isset($_SESSION['panier'][$id])  ) {
            unset($_SESSION['panier'][$id]);
        }
        
        header("Location:/panier");

    }

    public function vider() {
        // Vider le panier
        
        if (isset($_POST['vider']) && $_POST['vider']==='panier') {
            $_SESSION['panier']=[];
            $mon_panier=[];
            $nbr_produit=0;
            $this->render("auth/panier.php",compact("nbr_produit","mon_panier"));
        }

    }


    public function paiement() {

        if (isset($_SESSION['connexion'])) {
            if ( isset($_SESSION['panier'])  && count($_SESSION['panier'])>0) {
            $paniers=$_SESSION['panier'];
            $this->render("auth/paiement.php",compact('paniers'));

            } else {
                header("Location:/panier");

            }

        } else {
            header("Location:/login/form");
           
        }

       
}



}



?>