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


    // Creer un enregistrement d'une commande
    public static function create(array $object):bool{

    echo '<pre>';
        print_r($object);
        echo'------------';
        print_r($_SESSION['panier']);

    echo '</pre>';



        
        $base=commandes::getInstance();
        $pdo=$base->getPdo();


        $prepare = $pdo->prepare("INSERT INTO commande (date_commande, client, email, nombre_produits, total, status)
            VALUES (:date_commande, :client, :email, :nombre_produits, :total, :status)");

        $statement=$prepare->execute($object);

        if ($statement && $_SESSION['panier']) {
            // Recuperer l'ID de la commande insérée
            $commande_id = $pdo->lastInsertId();

            // Insérer les lignes de commande (produits)
            $prepareLigne = $pdo->prepare("
                INSERT INTO ligne_commande (commande_id, produit_id, quantite, prix_unitaire)
                VALUES (:commande_id, :produit_id, :quantite, :prix_unitaire)
            ");

            
            // Boucle sur le tableau de produits
            foreach ($_SESSION['panier'] as $produit) {
                $prepareLigne->execute([
                    ':commande_id' => $commande_id,
                    ':produit_id' => $produit['id'],
                    ':quantite' => $produit['quantite'],
                    ':prix_unitaire' => $produit['prix']
                ]);
            }

            //die('isertion');

        }
        
        return $statement;
        
    }

    
    /*
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



