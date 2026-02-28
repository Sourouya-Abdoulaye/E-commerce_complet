<?php
namespace App\Models;
// car les nom dossier par defaut ,on l'utilise pour creer des namespace
require_once __DIR__ . '/../../vendor/autoload.php';
use Config\Commande_base\Commandes;
use PDO;

class Cmd extends Model  {

    public static function all():array{

        $base=Commandes::getInstance();
        $pdo=$base->getPdo();
        $prepare=$pdo->prepare("select * from commande");
        $statement=$prepare->execute();
        $commandes=$prepare->fetchAll(PDO::FETCH_ASSOC);

        
        return $commandes;
    }

   /*
    // Creer un enregistrement
    public static function create(array $object):bool{
        $base=commande::getInstance();
        $pdo=$base->getPdo();
        $prepare=$pdo->prepare("insert into commandes(libelle,prix,quantite,categorie,date,image)
                    values(:libelle,:prix,:quantite,:categorie,:date,:image)");

        // un objet exp: $user['firstname']
        $statement=$prepare->execute($object);
        return $statement;
        
    }

    
    // Mettre a jour
    public static function update(int $id, array $object):bool {

   
         return false;
    }

    // Trouver par ID
    public static function find(int $id):array | null {
        $base=commande::getInstance();
        $pdo=$base->getPdo();
        $prepare=$pdo->prepare("select * from commandes where id=? ");
        $prepare->execute([$id]);
        $article=$prepare->fetch(PDO::FETCH_ASSOC);

        if ($article==false) {
           $article=null;
        }
        return $article;
        
    }

    // Trouver par ID
    public static function findByEmail(string $email):array | null {
        
        // $base=commande::getInstance();
        // $pdo=$base->getPdo();
        // $prepare=$pdo->prepare("select * from users where email=? ");
        // $prepare->execute([$email]);
        // $user=$prepare->fetch(PDO::FETCH_ASSOC);

        // if ($user==false) {
        //    $user=null;
        // }
        // return $user;
         return [];
    }

    // Trouver par ID
    public static function findByContact(string $contact):array | null {
        
        // $base=commande::getInstance();
        // $pdo=$base->getPdo();
        // $prepare=$pdo->prepare("select * from users where contact=? ");
        // $prepare->execute([$contact]);
        // $user=$prepare->fetch(PDO::FETCH_ASSOC);

        // if ($user==false) {
        //    $user=null;
        // }
        // return $user;
    }

    // Supprimer
    public static function delete(int $id):bool{
        
        $base=commande::getInstance();
        $pdo=$base->getPdo();
        $article_delete= Article::find($id);

        if ($article_delete!==null) {
            $prepare=$pdo->prepare("delete from commandes where id=?");
            // prepare retourne un boolean
            return $statement=$prepare->execute([$article_delete['id']]);
        } 
        return false;
    }

*/
}



