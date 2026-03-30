<?php
namespace App\Controllers;
use App\Models\Article;

class ArticleController extends Controller implements Resource { 

    public function index($id=null) {
            // echo "Liste des Articles";
            // die($id);
            $products=Article::all();
            $produit_panier=(isset($_SESSION['panier'][$id]) ? $_SESSION['panier'][$id] : null  );
            $mon_panier=(isset($_SESSION['panier']) ? count($_SESSION['panier']) : null  );
            // var_dump($produit_panier);
            // die($produit_panier);
            $mes_data=compact("products","produit_panier");
            $this->render("article/index.php",$mes_data);
        
    }

    



    public function createForm() {
        if (isset($_SESSION['connexion'])) {
            // echo "Formulaire de creation d'un produit";

            //$this->render("article/create.php");
            $contenu="article/create.php";
            $mes_data=compact("contenu");
            $this->render("layout/layout.php",$mes_data);
        } else {
            echo "vous n'este pas connecter";
            header("Location:/");

        }



        
    }



    public function storeAction() {
        echo "Enregistrement d'un article";
        print_r($_POST);
        
        $libelle =htmlspecialchars($_POST["libelle"]);
        $prix =htmlspecialchars($_POST["prix"]);
        $quantite =htmlspecialchars($_POST["quantite"]);
        $date=Date("Y-m-d");


 
        echo "<br>"."Nom du fichier : " . $_FILES['image']['name'] . "<br>";
        echo "Chemin temporaire : " . $_FILES['image']['tmp_name'] . "<br>";
        echo "Taille : " . $_FILES['image']['size'] . " octets<br>";
        echo "Type : " . $_FILES['image']['type'] . "<br>";
        echo "Code erreur : " . $_FILES['image']['error'] . "<br>";




       
        //verification du formulaire

        //apres je vais verifier si le nom du existe deja je vais augmenter la quantiter

        //$article_libelle=article::findByLibelle($libelle);
      


        $article_erros=[];
        echo "<br>";
        print_r($article_erros);

        if ( strlen($libelle)<3 ) $article_erros["libelle"]="libelle doit avoir au moin 3 caractere";

        if ( (int) $prix==0 || $prix<0 )  $article_erros["prix"]="le prix doit etre nombre superieur a Zero";

        if ( (int) $quantite==0 || $quantite<0 )  $article_erros["quantite"]="la quantite doit etre nombre superieur a Zero";

        if (isset($_POST["categorie"])) {
            $categorie =htmlspecialchars($_POST["categorie"]);
        }else {
            $article_erros["categorie"]="le categorie ne doit pas etre vide";
           
        }

            


        if(isset($_FILES['image'])){

            // Vérifier s'il y a une erreur
            if($_FILES['image']['error'] === 0){
                //le chemin de mon dossier media
                $dossier = __DIR__."/../../public/asset/medias/";
                // Verification de type qu'on accepte 
                $typeAutorise = ["image/jpeg", "image/png", "image/gif"];

                $valide=in_array($_FILES['image']['type'], $typeAutorise);
                var_dump($a);
                //die($a);
                //$_FILES['image']['size']<1000000 ;
                if($valide) {

                    //je vais creer le un nom unique pour l'image
                    $image = uniqid().".jpg";

                    $chemin_image = $dossier . $image;
                    // pousser le ficiher dans mon dossier medias

                    echo "Image uploadée avec succès !<br> /asset/$chemin_image";
                    echo "<img src='/asset/medias/$image' width='200'>";
                    echo "<img src='/asset/medias/Abdoulaye (2).png' width='200'>";
                    

                } else {
                    $article_erros["image"]="Type de fichier non autorisé ou l'image est lourd.";
                    echo "Type de fichier non autorisé ou l'image est lourd .";
                }

            } else {
                $article_erros["image"]="Erreur lors de l'envoi d'image.";
                echo "Erreur lors de l'envoi.";
            }

        }


        //ajouter un article
        echo "<br>";
        print_r($article_erros);
        echo "<br>eeeeeeeeeeee";
        echo count($article_erros);
        echo "<br/> ".$image;
        
        if (count($article_erros)==0) { 

            print_r($_POST);
            echo "<br/> ".$image;

         
            //un objet tableau associatif
            move_uploaded_file($_FILES['image']['tmp_name'], $chemin_image);

            $article_object=compact(["libelle","prix","quantite","categorie","date","image"]);
            $article=Article::create($article_object);
            header("Location:/admin/articles");
          
    
        } else {
            $_SESSION["article_erros"]=$article_erros;

            // print_r($_SESSION);
            // print_r($article_erros);
            // die("eeeeeeeeeee");
            header("Location:/admin/article/form");

           

            }
        
        }






    public function show(int $id) {
        // a ameliorer cette fonction
        //echo "<h1>Details de l'article $id </h1>";
        $article=article::find($id);
        $products=Article::all();

        //print_r($article);
        // retourne un tableau associatif

        $nbre_prod=0;
        if ( isset($_SESSION['panier'])) {
            $nbre_prod=count($_SESSION['panier']);

            } 

        $data=compact('article','nbre_prod','products');
        $this->render("article/detail.php",$data);
        
    }

    public function editForm(int $id) {
        // echo "Formulaire d'edition de l'utilisateur $id";
        // echo "<h1>Details de l'utilisateur $id </h1>";
        // $user=User::find($id);
        // $data=compact('user');
        // $this->render("user/edit.php",$data);
        
    }

    public function updateAction(int $id) {
       // print_r($_POST);
       
    }



    public function deleteAction(int $id) {
        // echo "Suppression de l'utilisateur $id";  
        if (Article::delete($id)) {
          echo "user is delete";
          header("Location:/admin/articles");  
        }
        
    }










}

