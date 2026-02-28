<?php
namespace Config\Product_base;
use PDO;

class Product {
    //pour pouvoir l'unitialiser a null(?)
    //la variable $instance est de type l'objet de cette class
    private static ?Product $instance=null;
    //une proprieter qui va contenir l'objet(type pdo)
    private PDO $pdo;

    // Constructeur prive = empêche new Product()
    // nous avons creer un contructeur priver pour empecher d'instacier 
    // cette class.
    private function __construct()  {
        // c'est notre chemin vers le dossier de qui contient notre base de donner
        $dbPath = __DIR__ . '/../../products/products.db';
        //creation de 'lobjet pdo dans le contructeur
        $this->pdo = new PDO("sqlite:$dbPath");  
    }

     // Point d’acces au singleton( qui va retourner l'objet de cette classe)
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Product();
        }
        return self::$instance;
    }

// Accès à PDO
    public function getPdo(): PDO {
        return $this->pdo;
    }

//     migrate_and_seed qui doit
// executer le contenu des fichiers ddl.sql et dml.sql.


    public static function migrate_and_seed() {
        //  recupereration de l'instance de cette class (methode static )
        $pdo = self::getInstance();

        //  recuperer le PDO de l'instance de cette class (methode d'instance)
        $pdo_objet = $pdo->getPdo();

        $table= file_get_contents(__DIR__ . "/../../products/ddl.sql");
        $insertion= file_get_contents(__DIR__ ."/../../products/dml.sql");

        //$pdo_objet=$this->pdo;
        $pdo_objet->exec($table);
        $pdo_objet->exec($insertion);

    }









}