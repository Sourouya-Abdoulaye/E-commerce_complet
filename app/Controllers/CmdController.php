<?php
namespace App\Controllers;
use App\Models\Cmd;

class CmdController extends Controller  { 

    public function index() {
        if (isset($_SESSION['connexion'])) {
            $commandes=Cmd::all();
            $nbre_cmd=count($commandes);
            // echo '<pre>';
            // print_r($commandes);
            // echo '</pre>';

            $contenu="cmd/index.php";
            $mes_data=compact('commandes','contenu','nbre_cmd');
            $this->render("layout/layout.php",$mes_data);


           
            
        } else {

            echo "vous n'este pas connecter";
            header("Location:/");

        }  

    }

   

    public function store() {
        print_r($_POST);

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

        /* Validation */

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

        /* Validation paiement  */

       
        if (!empty($carte) || !empty($mobile) || !empty($auteur_virement)) {
               
             // Si paiement par carte
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


        //die();
        if (count($erreurs)==0) {
            // nous pouvons enregistrer la commande maitenant

           
               
                // print_r($_SESSION);

            

           
            $date_commande = date('Y-m-d');
            $client = $prenom . ' ' . $nom;
            $nombre_produits = count($_SESSION['panier']); // ton panier
            $total = $_POST['total']; // 
            $status = 'Livrer';

            $commande_object = compact('date_commande','client','email','nombre_produits','total','status' );

            echo '<pre>';
                print_r($commande_object);
            echo '</pre>';

            Cmd::create($commande_object);
            // die("enregistrement commande");
            unset($_SESSION['panier']);
            // si il croche le checkbox alors on peut garder ces informations
            //pour un autre achat, mais pour le meme client.
            unset($_SESSION['paiement_erreurs']);
            unset($_SESSION['old_info_paiement']);

            header("Location:/");

            
        } else {
            $_SESSION['paiement_erreurs'] = $erreurs;
            //garder les anciennes valeurs du formulaire
            $_SESSION['old_info_paiement'] = $_POST;
            echo '<pre>';
            print_r($_SESSION['paiement_erreurs']);
            echo '</pre>';
            // unset($_SESSION['paiement_erreurs']);
            // die("fin");
            header("Location:/paiement"); // page du formulaire
            //exit;

        }

       
        







    }

    

    


    public function update($id,$action) {
       
        header("Location:/panier");

    }

   




    public function find()   {
        // Passer le panier en commande
    }





}



?>