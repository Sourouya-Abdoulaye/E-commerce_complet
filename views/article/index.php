<?php

    
    // print_r($_GET)  ;
           







?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a80ab110e1.js" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <style>
       
        <?php //include_once __DIR__."/../../public/asset/css/user/index.css"  ?>
        <?php include_once __DIR__."/../../public/asset/css/commun/header.css"  ?>
        <?php include_once __DIR__."/../../public/asset/css/commun/footer.css"  ?>
        <?php include_once __DIR__."/../../public/asset/css/article/index.css"  ?>
        <?php //include_once __DIR__."/../../public/asset/css/commun/style.css"  ?>
    </style>
     
    <title>Liste des Article Disponible</title>
    
</head>
<body>
    <?php require_once  __DIR__."/../layout/header.php" ?>



        <!-- <main> -->
            <!-- ===== HERO ===== -->
            <section id="section-bienvenu">
                <span class="hero-badge"><i class="fa-solid fa-bolt"></i> Nouveautés 2026</span>
                <h1>
                    <span class="h1-line1">Bienvenue sur</span>
                    <span class="h1-line2">Notre Boutique</span>
                </h1>
                <p>Trouvez des produits de qualité à des prix imbattables. Mode, style & tendances — livrés chez vous.</p>
                <div class="hero-btns">
                    <a href="#produits" class="btn-primary">
                    <i class="fa-solid fa-bag-shopping"></i> Découvrir
                    </a>
                    <a href="#categorie" class="btn-secondary">
                    Voir les catégories
                    </a>
                </div>
                <div class="hero-stats">
                    <div class="stat"><div class="stat-num">500+</div><div class="stat-label">Produits</div></div>
                    <div class="stat"><div class="stat-num">12K+</div><div class="stat-label">Clients satisfaits</div></div>
                    <div class="stat"><div class="stat-num">4.9★</div><div class="stat-label">Note moyenne</div></div>
                    <div class="stat"><div class="stat-num">48h</div><div class="stat-label">Livraison</div></div>
                </div>
                <div class="scroll-indicator">
                    <div class="scroll-line"></div>
                    <span>Défiler</span>
                </div>
            </section>

            <!-- ===== CATEGORIES ===== -->
             
           
           


            <section class="categories-strip" id="categorie">
                <h2>Explorer par catégorie</h2>
                <div class="cats-grid">

                  
                    <div class="cat-card" onclick="location.href='/?categorie=Casquette#categorie'">
                        <div class="cat-icon">🧢</div>
                        <div class="cat-name">Casquettes</div>
                        <div class="cat-count">24 articles</div>
                    </div>

                    <div class="cat-card" onclick="location.href='?categorie=Habit#categorie'">
                        <div class="cat-icon">👔</div>
                        <div class="cat-name">Habillé</div>
                        <div class="cat-count">58 articles</div>
                    </div>

                    <div class="cat-card" onclick="location.href='?categorie=Pantalon#categorie'">
                        <div class="cat-icon">👖</div>
                        <div class="cat-name">Pantalons</div>
                        <div class="cat-count">36 articles</div>
                    </div>

                    <div class="cat-card" onclick="location.href='?categorie=Chaussure#categorie'">
                        <div class="cat-icon">👟</div>
                        <div class="cat-name">Chaussures</div>
                        <div class="cat-count">42 articles</div>
                    </div>
                </div>
            </section>

            <!-- ===== PRODUCTS ===== -->
            <section class="products-section">
               

                <div class="section-header">
                    <h2 id="titre">Nos Produits</h2>
                    <div class="filter-pills">

                    <span class="pill <?= !isset($_GET['categorie']) ? 'active' : '' ?>" onclick="location.href='/#categorie'">Tout</span>
                    <span class="pill <?= isset($_GET['categorie']) && $_GET['categorie']=='Casquette' ? 'active' : '' ?>" onclick="location.href='?categorie=Casquette#categorie'">Casquettes</span>
                    <span class="pill <?= isset($_GET['categorie']) && $_GET['categorie']=='Habit' ? 'active' : '' ?>" onclick="location.href='?categorie=Habit#categorie'">Habilles</span>
                    <span class="pill <?= isset($_GET['categorie']) && $_GET['categorie']=='Chaussure' ? 'active' : '' ?>" onclick="location.href='?categorie=Chaussure#categorie'">Chaussures</span>
                    <span class="pill <?= isset($_GET['categorie']) && $_GET['categorie']=='Pantalon' ? 'active' : '' ?>"  onclick="location.href='?categorie=Pantalon#categorie'">Pantalons</span>
                   
                    </div>
                </div>
                <div id="produits">
                    <?php if (isset($_GET['categorie'])):   ?>
                        <?php foreach ($products as $product): ?>
                            <?php if ($product['categorie']==$_GET['categorie'] ): ?>
                                <div  class="produit" data-cat=<?= $product["libelle"]?> >
                                    <div class="img-wrapper">
                                        <img src="/asset/medias/<?= $product["image"]?>" alt=<?= $product["libelle"]?>>
                                        <a href="/article/<?= $product["id"]?>" >
                                            <div class="img-overlay">
                                                <button class="overlay-btn"><i class="fa-solid fa-eye"></i> Voir détails</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="info_produc">
                                        <div class="stars">★★★★★</div>
                                        <label><?= $product["libelle"]?></label>
                                        <div class="prix-wrapper">
                                            <span>Prix: <span class="prix-val"><?= $product["prix"]?> fcfa</span></span>
                                        </div>
                                    </div>
                                    <div class="consulter">
                                        <a href="/article/<?= $product["id"]?>" class="btn-view"><i class="fa-solid fa-eye"></i></a>
                                        
                                        <!-- <a href="/?article=<?= $product["id"]?>&categorie=<?= $product["categorie"]?>#categorie"> 
                                             
                                        </a> -->
                                        <form action="/article/<?= $product["id"]?>/<?= $product["categorie"]?>/add" method="post">
                                            <button type="submit" class="add">
                                                <?php  $resultat= (isset($_SESSION['panier']) && isset($_SESSION['panier'][$product["id"]])) ? "déja au panier" : "ajouter au panier" ; ?>
                                                
                                                <!-- ajouter panier -->
                                                <?=$resultat?>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            <?php endif  ?>
                        <?php endforeach ?>

                    <?php else:  ?>

                        <?php foreach ($products as $product): ?>
                            <div  class="produit" data-cat=<?= $product["libelle"]?> >
                                <div class="img-wrapper">
                                    <img src="/asset/medias/<?= $product["image"]?>" alt=<?= $product["libelle"]?>>
                                    <a href="/article/<?= $product["id"]?>" >
                                        <div class="img-overlay">
                                            <button class="overlay-btn"><i class="fa-solid fa-eye"></i> Voir détails</button>
                                        </div>
                                    </a>
                                </div>
                                <div class="info_produc">
                                    <div class="stars">★★★★★</div>
                                    <label><?= $product["libelle"]?></label>
                                    <div class="prix-wrapper">
                                        <span>Prix: <span class="prix-val"><?= $product["prix"]?> fcfa</span></span>
                                    </div>
                                </div>
                                <div class="consulter">
                                    <a href="/article/<?= $product["id"]?>" class="btn-view"><i class="fa-solid fa-eye"></i></a>


                                    
                                    <form action="/article/<?= $product["id"]?>/add" method="post">
                                        <button type="submit" class="add">
                                            <?php  $resultat= (isset($_SESSION['panier']) && isset($_SESSION['panier'][$product["id"]])) ? "déja au panier" : "ajouter au panier" ; ?>
                                                
                                                <!-- ajouter panier -->
                                             <?=$resultat?>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach ?>   
               
                    <?php endif   ?>
                </div>
            </section>

        <!-- ===== PROMO BANNER ===== -->
        <div class="promo-banner">
        <div class="promo-inner">
            <div class="promo-text">
              <h3>🎁 Offre Spéciale — Livraison Gratuite</h3>
              <p>Pour toute commande supérieure à 20 000 FCFA. Utilisez le code ci-dessous.</p>
            </div>
            <div class="promo-code">
              <span>Code promo</span>
              <strong>LIVGRAT</strong>
            </div>
          </div>
        </div>
        <!-- </main> -->

    <?php require_once  __DIR__."/../layout/footer.php" ?>
    

    <!-- ===== CART SIDEBAR ===== -->
   <!-- <div class="cart-overlay" id="cart-overlay" onclick="closeCart()"></div> -->

   <!-- gestion de mon panier -->
    <?php //if ($produit_panier==null): ?>
        <!-- <div id="toast" class="toast error">
            ❌ Produit introuvable
        </div> -->
    <?php if ($produit_panier==!null): ?>

        <div id="toast" class="toast success">
            ✅ Produit ajouté avec succès
        </div>
    <?php endif; ?>

    <?php
        
        // if (isset($_SESSION['panier'])) {

        //         echo "<pre style='color:black' >";
        //             print_r($_SESSION['panier']);
        //             echo '-----panier haut-----------------------------------------';
        //             print_r($products);
        //         echo "<pre>";
            
        //     // unset($_SESSION['panier']);
        //     # code...
        // } else {
        //     $_SESSION['panier']=[];
        // }

    ?>



    <!-- <aside id="panier-sidebar">
        <div class="cart-header">
            <h3><i class="fa-solid fa-bag-shopping" style="color:var(--accent);margin-right:8px;"></i>Mon Panier</h3>
            <div class="cart-close" onclick="closeCart()"><i class="fa-solid fa-xmark"></i></div>
        </div>
        <div class="cart-items" id="cart-items">
            <div class="cart-empty" id="cart-empty">
            <i class="fa-solid fa-bag-shopping"></i>
            <p>Votre panier est vide</p>
            <button class="btn-secondary" style="font-size:0.85rem;padding:0.6rem 1.4rem;" onclick="closeCart()">Découvrir nos produits</button>
            </div>
        </div>
        <div class="cart-footer" id="cart-footer" style="display:none;">
            <div class="cart-total">
            <span>Total</span>
            <strong id="cart-total">0 fcfa</strong>
            </div>
            <button class="btn-checkout">
            <i class="fa-solid fa-lock"></i> Commander maintenant
            </button>
        </div>
    </aside> -->

<!-- ===== TOAST ===== -->
    <!-- <div class="toast" id="toast"><i class="fa-solid fa-circle-check"></i> <span id="toast-msg">Produit ajouté !</span></div> -->
    <script src="/asset/js/commun/index.js"></script>
</body>
</html>

