<?php 

if (isset($_SESSION["article_erros"])) {
    $article_erros= $_SESSION["article_erros"];
    unset($_SESSION["article_erros"]);
}

?>
<!-- <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a80ab110e1.js" crossorigin="anonymous"></script> -->
    <style>
        <?php include_once __DIR__."/../../public/asset/css/commun/style.css"  ?>
        <?php include_once __DIR__."/../../public/asset/css/article/create.css"  ?>
    </style>
<!-- 
    <title>enregistrement d'un Article</title>
</head>
<body> -->

   
        <!-- <a href="/admin/article"> <button type="button">Liste des Articles</button></a> -->
   


<main>
  <div class="form-wrapper">
    <div class="form-card">
      <div class="form-header">
        <h2>Nouvel Article</h2>
        <p>Ajouter un article au stock</p>
      </div>

      <form action="/article" method="POST" enctype="multipart/form-data">

        <?php if (!empty($article_erros["libelle"])): ?>
          <p class="erro_message"><?= $article_erros["libelle"] ?></p>
        <?php endif; ?>

        <div class="input-group">
          <input type="text" name="libelle" placeholder="Libellé (ex: Sac)" required>
        </div>

        <?php if (!empty($article_erros["prix"])): ?>
          <p class="erro_message"><?= $article_erros["prix"] ?></p>
        <?php endif; ?>

        <div class="input-group">
          <input type="text" name="prix" placeholder="Prix (ex: 1000)" required>
        </div>

        <?php if (!empty($article_erros["quantite"])): ?>
          <p class="erro_message"><?= $article_erros["quantite"] ?></p>
        <?php endif; ?>

        <div class="input-group">
          <input type="text" name="quantite" placeholder="Quantité (ex: 32)" required>
        </div>

        <!-- categorie -->
        <?php if (!empty($article_erros["categorie"])): ?>
          <p class="erro_message"><?= $article_erros["categorie"] ?></p>
        <?php endif; ?>
        
        <div class="radio-group">
          
          <label> <input type="radio" name="categorie" value="Habit"> Habit  </label>
          <label> <input type="radio" name="categorie" value="Pantalon"> Pantalon  </label>
          <label> <input type="radio" name="categorie" value="Chaussure"> Chaussure  </label>
          <label> <input type="radio" name="categorie" value="Casquette"> Casquette  </label>        
        </div>

        <?php if (!empty($article_erros["image"])): ?>
          <p class="erro_message"><?= $article_erros["image"] ?></p>
        <?php endif; ?>

        <div class="file-input-container">
          <input type="file" name="image" required>
        </div>

        <button type="submit" class="btn-submit">
          Enregistrer l'article
        </button>

      </form>
    </div>
  </div>
</main>



</body>
</html>