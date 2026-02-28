<?php
namespace App\Controllers;
use App\Models\User;
use App\Models\Article;

class AuthController extends Controller {

    public function loginForm() {
        // echo 'Login form';
        $this->render("auth/loginForm.php");
    }


    public function deconecter() {
        echo 'deconecter';
        session_destroy();
        header("Location:/");
       
        //$this->render("auth/conect.php");
    }



    public function loginAction() {
        echo 'Login Action <br>';
        echo '<br>';
        print_r($_POST);
        echo '<br>';
        $email =htmlspecialchars($_POST["email"]);
        $password =htmlspecialchars($_POST["password"]);
        echo "email est; $email  et password: $password   <br>";

        echo '<br>';
        $user_ByEmail=User::findByEmail($email);
         echo '<br>';
        print_r($user_ByEmail);

        $password_hasher=$user_ByEmail["password"];
        echo '<br>'.$password_hasher. ' password:'.$password;
       
        if (password_verify($password,$password_hasher)) {
            
            if ($user_ByEmail["role"]=='admin') {
                $_SESSION['connexion']=['etat'=>'oui','role'=>'admin'];
                header("Location:/admin/dashboard");
                echo "<br>Vous etes Connecter en tant que admin";
                # code...
            } else {
                $_SESSION['connexion']=['etat'=>'oui','role'=>'client'];
                header("Location:/");
                echo "<br>Vous etes Connecter en tant que admin";
            }
            
        }
        else {
            $_SESSION['login_erros']="Identifiant invalide" ;
            echo "<br>Vous n'etes pas Connecter";
            header("Location:/login/form");
            
        }



    }


    public function propo() {
        // echo 'Login form';
        $this->render("auth/propo.php");
    }

    // public function panier() {
    //     // echo 'Login form';
    //     $nbr_produit=0;
    //     $mon_panier=[];
    //     //comme ces operation necessite un panier donc on verifie si il existe
    //     if (isset($_SESSION['panier']) && count($_SESSION['panier'])!==0) {

    //         if (isset($_GET['article']) && isset($_GET['action'])  ) {
    //         //ajout | dimunition de quantiter
    //         die("article numero {$_GET['article']} c'est ".$_GET['action']);
            
    //         }

    //         // echo "<pre style='color:white' >";
    //         //     print_r($_SESSION['panier']);
    //         //     echo '-----panier haut-----------------------------------------';
    //         // echo "<pre>";
            
    //         $mon_panier=$_SESSION['panier'];
    //         $nbr_produit=count($mon_panier);
    //     }

        
        





    //     $data=compact("nbr_produit","mon_panier");
    //     $this->render("auth/panier.php",$data);
    // }







    




}

