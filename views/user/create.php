<?php 
if (isset($_SESSION["erros"])) {
    $erros= $_SESSION["erros"];
    unset($_SESSION["erros"]);
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a80ab110e1.js" crossorigin="anonymous"></script>

    <style>
        <?php  include_once __DIR__."/../../public/asset/css/commun/style.css"  ?>
        <?php include_once __DIR__."/../../public/asset/css/user/create.css"  ?>
    </style>

    <title>enregistrement d'un user</title>
</head>
<body>
   
    <!-- <a href="/users"> <button type="button">Liste des users</button></a> -->
    
<div class="form-wrapper">
  <div class="form-card">

    <div class="form-header">
      <i class="fas fa-user-plus"></i>
      <h2>Créer un utilisateur</h2>
      <p>Ajouter un nouvel utilisateur</p>
    </div>

    <form action="/users" method="POST">

      <!-- Firstname -->
      <?php if (!empty($erros["firstname"])): ?>
        <p class="erro_message"><?= $erros["firstname"] ?></p>
      <?php endif; ?>
      <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" name="firstname" placeholder="Prénom"  >
      </div>

      <!-- Lastname -->
      <?php if (!empty($erros["lastname"])): ?>
        <p class="erro_message"><?= $erros["lastname"] ?></p>
      <?php endif; ?>
      <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" name="lastname" placeholder="Nom"  >
      </div>

      <!-- Email -->
       <?php if (!empty($erros["email"])): ?>
        <p class="erro_message"><?= $erros["email"] ?></p>
      <?php endif; ?>
      <div class="input-group">
        <i class="fas fa-envelope"></i>
        <input type="email" name="email" placeholder="Email"  >
      </div>

      <!-- Contact -->
       <?php if (!empty($erros["contact"])): ?>
        <p class="erro_message"><?= $erros["contact"] ?></p>
      <?php endif; ?>
      <div class="input-group">
        <i class="fas fa-phone"></i>
        <input type="tel" name="contact" placeholder="Contact"  >
      </div>

      <!-- Sexe -->
      <?php if (!empty($erros["sexe"])): ?>
        <p class="erro_message"><?= $erros["sexe"] ?></p>
      <?php endif; ?>
      <div class="radio-group">
        <label><input type="radio" name="sexe" value="F"> Féminin</label>
        <label><input type="radio" name="sexe" value="M"> Masculin</label>
      </div>

      <!-- Password -->
       <?php if (!empty($erros["password"])): ?>
        <p class="erro_message"><?= $erros["password"] ?></p>
      <?php endif; ?>
      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" placeholder="Mot de passe"  >
      </div>

      <!-- Confirm -->
       <?php if (!empty($erros["password_confirme"])): ?>
        <p class="erro_message"><?= $erros["password_confirme"] ?></p>
      <?php endif; ?>
      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" name="password_confirme" placeholder="Confirmer mot de passe"  >
      </div>

      <!-- Date -->
      <div class="input-group">
        <i class="fas fa-calendar"></i>
        <input type="date" name="birth_day"  >
      </div>

      <!-- Role -->
       <?php if (!empty($erros["role"])): ?>
        <p class="erro_message"><?= $erros["role"] ?></p>
      <?php endif; ?>
      <div class="input-group">
        <i class="fas fa-user-shield"></i>
        <input type="text" name="role" placeholder="Rôle"  >
      </div>

      <div class="deja_compte">
            <p>Déjà un compte ? </p>
            
            <a href="/login/form"> Se connecter <i class="fas fa-arrow-right"></i></a>
      </div>

      <button type="submit" class="btn-submit">
        <i class="fas fa-save"></i>
        Enregistrer
      </button>

    </form>
  </div>
</div>



</body>
</html>