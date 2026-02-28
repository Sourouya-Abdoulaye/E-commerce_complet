<?php
namespace App\Controllers;
use App\Models\User;
use App\Models\Article;

class AdminController extends Controller {

    public function users() {
        if (isset($_SESSION['connexion'])  && $_SESSION['connexion']['role']=='admin') {
            $users=User::all();
            $contenu="user/index.php";
            $mes_data=compact("users","contenu");
            //$this->render("user/index.php",$mes_data);
            $this->render("layout/layout.php",$mes_data);
        } else {
            echo "vous n'este pas connecter";
            header("Location:/");
        }  
    }



    public function articles() {
        if (isset($_SESSION['connexion'])  && $_SESSION['connexion']['role']=='admin') {
            // echo "Liste des Articles";
            $products=Article::all();
            $contenu="article/liste.php";
            $mes_data=compact("products","contenu");
            // $this->render("article/liste.php",$mes_data);
             $this->render("layout/layout.php",$mes_data);
        } else {
            echo "vous n'este pas connecter";
            header("Location:/");

        }
       
    }



     public function dashboard() {
        if (isset($_SESSION['connexion'])  && $_SESSION['connexion']['role']=='admin') {
                $products=Article::all();
                $users=User::all();

                $contenu="layout/dashbord.php";
                $mes_data=compact("products","users","contenu");
                //print_r($mes_data);
            
                // $this->render("dashboard/dashbord.php",$mes_data);
                $this->render("layout/layout.php",$mes_data);
        } else {
            echo "vous n'este pas connecter";
            header("Location:/");

        }  
    }

    public function createForm() {
        if (isset($_SESSION['connexion'])  && $_SESSION['connexion']['role']=='admin') {
            $contenu="user/create.php";
            $mes_data=compact("contenu");
            $this->render("layout/layout.php",$mes_data);
        } else {

            echo "vous n'este pas connecter";
            header("Location:/");

        }
    }









public function soldes() {
        if (isset($_SESSION['connexion']) && $_SESSION['connexion']['role']=='admin') {
            $contenu="layout/solde.php";
            $mes_data=compact("contenu");
            $this->render("layout/layout.php",$mes_data);
        } else {

            echo "vous n'este pas connecter";
            header("Location:/");

        }
    }








}