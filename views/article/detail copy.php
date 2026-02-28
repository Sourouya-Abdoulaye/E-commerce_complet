<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a80ab110e1.js" crossorigin="anonymous"></script>
     <style>
        <?php include_once __DIR__."/../../public/asset/css/commun/style.css"  ?>
        <?php // include_once __DIR__."/../../public/asset/css/article/detail.css"  ?>
    </style>
    <title>Document</title>
</head>
<body>
    <a href="/admin/article/form"><button>Ajouter</button></a>
    <a href="/admin/article"><button>Liste des articles</button></a>

   
    <br>
    <!-- <?php print_r($article)?>  -->

    <?php if($article!==null): ?>

        <div class="row_detail">
            <strong>Libelle:</strong>  <span class="name"> <?=$article["libelle" ]?> </span> 
        </div>

        <div class="row_detail">
            <strong>Prix:</strong>  <span class="name"> <?=$article["prix" ]?> </span> 
        </div>

        <div class="row_detail">
            <strong>Quantité:</strong>    <span class="name"> <?=$article["quantite"]?>  </span> 
        </div>

        <div class="row_detail">
            <strong>Date:</strong>  <span class="name"> <?=$article["date"  ]?>  </span> 
        </div>

    <?php else:?>
        <h3>article not found</h3>
    <?php endif?>  

    
    
</body>
</html>