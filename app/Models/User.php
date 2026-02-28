<?php
namespace App\Models;
// car les nom dossier par defaut ,on l'utilise pour creer des namespace
require_once __DIR__ . '/../../vendor/autoload.php';
use Config\User_base\Database;
use PDO;

class User extends Model  {

    public static function all():array{

        $base=Database::getInstance();
        $pdo=$base->getPdo();
        $prepare=$pdo->prepare("select * from users");
        $statement=$prepare->execute();
        $users=$prepare->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }

    // Creer un enregistrement
    public static function create(array $object):bool{
        $base=Database::getInstance();
        $pdo=$base->getPdo();
        $prepare=$pdo->prepare("insert into users(firstname,lastname,email,contact,sexe,password,password_confirme,birth_day,role)
                    values(:firstname,:lastname,:email,:contact,:sexe,:password,:password_confirme,:birth_day,:role)");

        // un objet exp: $user['firstname']
        $statement=$prepare->execute($object);
        return $statement;
    }

    
    // Mettre a jour
    public static function update(int $id, array $object):bool {

   

    }

    // Trouver par ID
    public static function find(int $id):array | null {
        $base=Database::getInstance();
        $pdo=$base->getPdo();
        $prepare=$pdo->prepare("select * from users where id=? ");
        $prepare->execute([$id]);
        $user=$prepare->fetch(PDO::FETCH_ASSOC);

        if ($user==false) {
           $user=null;
        }
        return $user;
    }

    // Trouver par ID
    public static function findByEmail(string $email):array | null {
        
        $base=Database::getInstance();
        $pdo=$base->getPdo();
        $prepare=$pdo->prepare("select * from users where email=? ");
        $prepare->execute([$email]);
        $user=$prepare->fetch(PDO::FETCH_ASSOC);

        if ($user==false) {
           $user=null;
        }
        return $user;
    }

    // Trouver par ID
    public static function findByContact(string $contact):array | null {
        
        $base=Database::getInstance();
        $pdo=$base->getPdo();
        $prepare=$pdo->prepare("select * from users where contact=? ");
        $prepare->execute([$contact]);
        $user=$prepare->fetch(PDO::FETCH_ASSOC);

        if ($user==false) {
           $user=null;
        }
        return $user;
    }

    // Supprimer
    public static function delete(int $id):bool{
        
        $base=Database::getInstance();
        $pdo=$base->getPdo();
        $user_delete= User::find($id);

        if ($user_delete!==null) {
            $prepare=$pdo->prepare("delete from users where id=?");
            // prepare retourne un boolean
            return $statement=$prepare->execute([$user_delete['id']]);
        } 
        return false;
    }


}



