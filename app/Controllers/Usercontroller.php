<?php
namespace App\Controllers;
use App\Models\User;
use App\Models\Article;

class Usercontroller extends Controller implements Resource { 

    public function index() {
        if (isset($_SESSION['connexion'])) {
            // echo "Liste des utilisateurs";
            // echo "<h3 style='color:green' > vous etes connecter </h3> ";
            $users=User::all();
            // transforme les chaine representant les nom des variables en un tableau de cles=>valeur
            // dont les cles sont les nom des variable et la valeur est la valeur des cles
            $mes_data=compact("users");
            $this->render("user/index.php",$mes_data);
            //echo "vous etes connecter";
            // print_r($_SESSION["user_connexion"]);
       
        } else {

            echo "vous n'este pas connecter";
            header("Location:/");

        }  
    }


    




    public function createForm() {
       // if (isset($_SESSION['connexion'])) {
          //  echo "Formulaire de creation d'utilisateur";
            $this->render("user/create.php");    
     //   } else {
            // echo "vous n'este pas connecter";
            // header("Location:/");

        // }



        
    }



    public function storeAction() {
        echo "Enregistrement d'un nouvel utilisateur";
        // print_r($_POST);
        $firstname =htmlspecialchars($_POST["firstname"]);
        $lastname =htmlspecialchars($_POST["lastname"]);
        $email =htmlspecialchars($_POST["email"]);
        $contact=htmlspecialchars($_POST["contact"]);
        $sexe=htmlspecialchars($_POST["sexe"]);
        $password =htmlspecialchars($_POST["password"]);
        $password_confirme=htmlspecialchars($_POST["password_confirme"]);
        $birth_day=htmlspecialchars($_POST["birth_day"]);
        $role=htmlspecialchars($_POST["role"]);

        //verification du formulaire

        $user_contact=User::findByContact($contact);
        $user_email=User::findByEmail($email);


        $erros=[];
        //print_r($erros);
        if ( empty($email) || $user_email!=null) $erros["email"]="le email ne doit pas etre vide ou ce email existe deja";

        if ( strlen($firstname)<3 ) $erros["firstname"]="firstname doit avoir au moin 3 caractere";

        if ( empty($contact) || $user_contact!=null )  $erros["contact"]="le contact ne doit pas etre vide ou ce contact existe deja";

        if ( strlen($password)<8 ) $erros["password"]="password doit avoir au moin 8 caractere";

        if ( empty($sexe) || !in_array($sexe,['f','m','M','F']) ) $erros["sexe"]="le sexe ne doit pas etre vide";

        if ( strlen($lastname)<3 ) $erros["lastname"]="lastname doit avoir au moin 3 caractere";

        if ( $password!=$password_confirme ) $erros["password_confirme"]="confirme password ne corespond pas au password";




        // ajouter un user
        echo count($erros);
        if (count($erros)==0) { 

            echo "<br/>";
            print_r($_POST);
            echo "<br/>";
            echo ("le mot de passe :".$_POST['password']);
            echo "<br/>";
            echo("le mot de passe hasher est: ". password_hash($_POST['password'], PASSWORD_DEFAULT));
            $password=password_hash($_POST['password'], PASSWORD_DEFAULT); 

            // Verification
            if (password_verify($_POST['password'], $password)) {
                echo "<br/>";
                echo $_POST['password'] ." = $password <p style='font-size:20px; color:green'> Mot de passe correct </p>"; 
            }

         
            //un objet tableau associatif
            $user_object=compact(["firstname","lastname","email","contact","sexe","password","password_confirme","birth_day","role"]);
            $users=User::create($user_object);
            header("Location:/users");
          
    
        } else {
            $_SESSION["erros"]=$erros;

            if (isset($_SESSION['connexion'])  && $_SESSION['connexion']['role']=='admin') {
                header("Location:/admin/users/form");
            }
            else {
                header("Location:/login/form");
            }
            }

        }






    public function show(int $id) {
        // echo "<h1>Details de l'utilisateur $id </h1>";
        $user=User::find($id);
        //print_r($user);
        // retourne un tableau associatif
        $data=compact('user');
        $this->render("user/detail.php",$data);
        
    }

    public function editForm(int $id) {
        // echo "Formulaire d'edition de l'utilisateur $id";
        // echo "<h1>Details de l'utilisateur $id </h1>";
        $user=User::find($id);
        $data=compact('user');
        $this->render("user/edit.php",$data);
        
    }

    public function updateAction(int $id) {
        print_r($_POST);
       
    }



    public function deleteAction(int $id) {
        echo "Suppression de l'utilisateur $id";  
        if (User::delete($id)) {
          echo "user is delete";
          header("Location:/admin/users");  
        }
        
    }





}



   
