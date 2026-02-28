<?php
use App\Controllers\Usercontroller;
use App\Controllers\AuthController;
use App\Controllers\ArticleController;
use App\Controllers\PanierController;
use App\Controllers\CmdController;
use App\Controllers\AdminController;

$router = new AltoRouter();
$router->setBasePath('');

$userController= new Usercontroller();
$AuthController= new AuthController();
$ArticleController= new ArticleController();
$PanierController= new PanierController();
$CmdController= new CmdController();
$AdminController= new AdminController();


//index qui affiche les articles
$router->map('GET', '/', [$ArticleController, 'index']);
$router->map('GET', '/[i:id]', [$ArticleController, 'index']);


//users
// Routes GET
$router->map('GET', '/users', [$userController, 'index']);
$router->map('GET', '/users/form', [$userController, 'createForm']);
$router->map('GET', '/users/[i:id]', [$userController, 'show']);
$router->map('GET', '/users/[i:id]/edit', [$userController, 'editForm']);
// Routes POST

$router->map('POST', '/users',[$userController, 'storeAction']);
$router->map('POST', '/users/[i:id]/update', [$userController, 'updateAction']);
$router->map('POST', '/users/[i:id]/delete',[$userController, 'deleteAction']);



// Authentification
// Routes GET
$router->map('GET', '/login/form', [$AuthController, 'loginForm']);
$router->map('GET', '/deconexion', [$AuthController, 'deconecter']);

$router->map('POST', '/login/action', [$AuthController, 'loginAction']);



//Article
// $router->map('GET', '/article', [$ArticleController, 'article']);
$router->map('GET', '/article/form', [$ArticleController, 'createForm']);
$router->map('GET', '/article/[i:id]', [$ArticleController, 'show']);
$router->map('GET', '/article/[i:id]/edit', [$ArticleController, 'editForm']);

$router->map('POST', '/article',[$ArticleController, 'storeAction']);
$router->map('POST', '/article/[i:id]/update', [$ArticleController, 'updateAction']);
$router->map('POST', '/article/[i:id]/delete',[$ArticleController, 'deleteAction']);


// Mon panier
// Routes GET
$router->map('GET', '/panier', [$PanierController, 'index']);
$router->map('GET', '/panier/[i:id]/[a:action]', [$PanierController, 'update']);


// Routes POST
$router->map('POST', '/article/[i:id]/[a:categorie]/add', [$PanierController, 'ajouter']);
$router->map('POST', '/article/[i:id]/add', [$PanierController, 'ajouter']);
$router->map('POST', '/panier/[i:id]/delete', [$PanierController, 'delete']);
$router->map('POST', '/panier', [$PanierController, 'vider']);


// Routes POST
$router->map('GET', '/cmd', [$CmdController, 'index']);
$router->map('POST', '/commande', [$CmdController, 'store']);




//paiement et propos arevoir son controller
$router->map('GET', '/paiement', [$PanierController, 'paiement']);
$router->map('GET', '/propo', [$AuthController, 'propo']);








//Administration
$router->map('GET', '/admin/users/form', [$AdminController, 'createForm']);
$router->map('GET', '/admin/users', [$AdminController, 'users']);

$router->map('GET', '/admin/dashboard', [$AdminController, 'dashboard']);
$router->map('GET', '/admin/soldes', [$AdminController, 'soldes']);

$router->map('GET', '/admin/articles', [$AdminController, 'articles']);
$router->map('GET', '/admin/article/form', [$ArticleController, 'createForm']);









        
// je vais matcher pour voi les correspondante
$match = $router->match();
//print_r($match);

if($match && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    //header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    echo "Page Not Found";
}

