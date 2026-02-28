<?php
namespace App\Controllers;
use App\Models\Cmd;

class CmdController extends Controller  { 

    public function index() {
        if (isset($_SESSION['connexion'])) {
            $comandes=Cmd::all();
            $mes_data=compact("comandes");
            echo '<pre>';
            print_r($comandes);
            echo '</pre>';
            $this->render("cmd/index.php",$mes_data);
            
        } else {

            echo "vous n'este pas connecter";
            header("Location:/");

        }  





    }



   

    public function store() {
        print_r($_POST);

        /* ========= Nettoyage ========= */

        $prenom = trim($_POST['prenom'] ?? '');
        $nom = trim($_POST['nom'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $tel = preg_replace('/[^0-9]/', '', $_POST['tel'] ?? '');
        $adresse = trim($_POST['adresse'] ?? '');
        $ville = trim($_POST['ville'] ?? '');
        $instruction = trim($_POST['instruction'] ?? '');

        $carte = preg_replace('/[^0-9]/', '', $_POST['carte'] ?? '');
        $nom_carte = trim($_POST['nom_carte'] ?? '');
        $carte_expir = trim($_POST['carte_expir'] ?? '');
        $ccv = preg_replace('/[^0-9]/', '', $_POST['ccv'] ?? '');

        $mobile = preg_replace('/[^0-9]/', '', $_POST['mobile'] ?? '');
        $auteur_virement = trim($_POST['auteur_virement'] ?? '');

        /* ========= Validation ========= */

        $erreurs = [];

        // Prénom
        if (!preg_match("/^[a-zA-ZÀ-ÿ\- ]{3,}$/u", $prenom)) {
            $erreurs['prenom'] = "Prénom invalide (minimum 3 lettres).";
        }

        // Nom
        if (!preg_match("/^[a-zA-ZÀ-ÿ\- ]{3,}$/u", $nom)) {
            $erreurs['nom'] = "Nom invalide (minimum 3 lettres).";
        }

        // Email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erreurs['email'] = "Email invalide.";
        }

        // Téléphone (minimum 8 chiffres)
        if (strlen($tel) < 8) {
            $erreurs['tel'] = "Téléphone invalide.";
        }

        if (strlen($adresse) < 3) {
            $erreurs['adresse'] = "adresse invalide.";
        }

        // Ville
        if (strlen($ville) <3 ) {
            $erreurs['ville'] = "Ville invalide.";
            echo $ville;
            // die($ville);
        }

        /* ========= Validation paiement (exemple logique simple) ========= */

        // Si paiement par carte
    if (!empty($carte) || !empty($mobile) || !empty($auteur_virement)) {
            # code...
      
        if (!empty($carte)) {
            if (strlen($carte) < 13 || strlen($carte) > 19) {
                $erreurs['carte'] = "Numéro de carte invalide.";
                 $erreurs['mode'] = "verifier bien les information sur votre carte";
            }

            if (strlen($ccv) < 3 || strlen($ccv) > 4) {
                $erreurs['ccv'] = "CCV invalide.";
                 $erreurs['mode'] = "verifier bien les information sur votre carte";
            }

            if (empty($nom_carte)) {
                $erreurs['nom_carte'] = "Nom sur la carte obligatoire.";
                $erreurs['mode'] = "verifier bien les information sur votre carte";
            }
            
        }

        // Si paiement mobile
        elseif (!empty($mobile) && strlen($mobile) < 8) {
            $erreurs['mobile'] = "Numéro mobile invalide 8 chiffre.";
            $erreurs['mode'] = "verifier bien le numero Mobile money";
            
        }

        // Si virement
        elseif (!empty($auteur_virement) && strlen($auteur_virement) < 3) {
            $erreurs['auteur_virement'] = "Nom de l’auteur du virement invalide. (au moin 3 caractere)";
            $erreurs['mode'] = "verifier bien le nom de l'auteur qui va faire le virement ";

        }

      } else {
        $erreurs['mode'] = "choisisez votre mode de paiement";
      
      }

        /* ========= Gestion erreurs ========= */

        //die();
        if (count($erreurs)==0) {
            die("jesuuuuuuuuuuu");
            // header("Location: /merci");

            
        }

       
        $_SESSION['paiement_erreurs'] = $erreurs;

        // optionnel : garder les anciennes valeurs du formulaire
        $_SESSION['old_info_paiement'] = $_POST;
        echo '<pre>';
        print_r($_SESSION['paiement_erreurs']);
        echo '</pre>';
        // unset($_SESSION['paiement_erreurs']);
        // die("fin");
        header("Location: /paiement"); // page du formulaire
        //exit;







    }

    

    public function ajouter($id,$categorie="produits")   {
       


    
        
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
            // else {
            //     die("action de $id est introuvable ");
            // }
                header("Location:/panier");

        }
         else {
            die("produit introuvable ");
            
        }





        // Modifier la quantité d’un produit
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

    public function validerCommande()   {
        // Passer le panier en commande
    }



    public function paiement() {
        if ( isset($_SESSION['panier'])  && count($_SESSION['panier'])>0) {
            $paniers=$_SESSION['panier'];
            $this->render("auth/paiement.php",compact('paniers'));

        } else {
            header("Location:/panier");

        }


}



}



?>