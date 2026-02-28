<?php
namespace App\Models;

class Model {

    // Recuperer tous les enregistrements
    public static function all() : array {}

    // Creer un enregistrement
    public static function create(array $object): bool{}

    // Mettre a jour
    public static function update(int $id, array $object): bool{
        //user
         /*
        $user_update= User::find($id);
        if ($user_update!==null) {
            $base=Database::getInstance();
            $pdo=$base->getPdo();
            $prepare=$pdo->prepare("update users set firsname=:firsname ,lastname=:lastname , email=:email , contact=:contact , sexe=:sexe , birth_day=:birth_day  where id=:id ");

            // un objet exp: $user['firstname']
            $statement=$prepare->execute($object);
             // prepare retourne un boolean
            return $statement;
            
        } 
        return false;

        */  


        //usercontroller
         /*
        $user_object=compact(["firsname","lastname","email","contact","sexe","birth_day","id"]);
        User::update($id,$user_object);
        */

        // updateaction
        /*
        echo "Mise à jour de l'utilisateur $id";
        echo "<br>";
        print_r($_POST);

        $firsname =htmlspecialchars($_POST["firsname"]);
        $lastname =htmlspecialchars($_POST["lastname"]);
        $email =htmlspecialchars($_POST["email"]);
        $contact=htmlspecialchars($_POST["contact"]);
        $sexe =htmlspecialchars($_POST["sexe"]);
        $birth_day=htmlspecialchars($_POST["birth_day"]);


        $erros=[];
   
        if ( empty($email) ) $erros["email"]="le email ne doit pas etre vide ou ce email existe deja";

        if ( strlen($firsname)<3 ) $erros["firsname"]="firsname doit avoir au moin 3 caractere";

        if ( empty($contact)  )  $erros["contact"]="le contact ne doit pas etre vide ou ce contact existe deja";

        if ( empty($sexe) || !in_array($sexe,['f','m','M','F']) ) $erros["sexe"]="le sexe ne doit pas etre vide";

        if ( strlen($lastname)<3 ) $erros["lastname"]="lastname doit avoir au moin 3 caractere";

   

        // modifier un user
        echo count($erros);
        if (count($erros)==0) { 
            print_r($_POST);
    
        } else {
            $id=$_POST['id'];
            $_SESSION["erros"]=$erros;
            header("Location:http://localhost:8000/users/$id/edit");
        }
    

        */
    }

    // Trouver par ID
    public static function find(int $id): ?array{}

    // Supprimer
    public static function delete(int $id): bool{}
}

