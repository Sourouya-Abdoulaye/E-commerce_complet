<?php 
// Logique de sélection du sexe (en tenant compte des majuscules/minuscules)
$m = (isset($user) && in_array(strtolower($user['sexe']), ['m'])) ? "checked" : "";
$f = (isset($user) && in_array(strtolower($user['sexe']), ['f'])) ? "checked" : "";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'utilisateur</title>
    <script src="https://kit.fontawesome.com" crossorigin="anonymous"></script>
    <style>
    <?php include_once __DIR__."/../../public/asset/css/user/edit.css"  ?>
        
    </style>
    </head>
<body>

<div class="form-wrapper">
    <div class="form-card">
        
        <?php if (isset($user)): ?>
            <div class="form-header">
                <i class="fas fa-user-pen"></i>
                <h2>Modifier le profil</h2>
                <p>Mise à jour de <strong><?= htmlspecialchars($user['firstname'] ?? $user['firsname']) ?></strong></p>
            </div>

            <a href="/admin/users" class="back-link">
                <i class="fas fa-arrow-left"></i> Retour à la liste
            </a>

            <form action="/users/<?= $user['id'] ?>/update" method="POST">

                <div class="input-group">
                    <label for="firstname">Prénom</label>
                    <div class="input-wrapper">
                        <i class="fas fa-user"></i>
                        <input type="text" name="firstname" id="firstname" value="<?= htmlspecialchars($user['firstname'] ?? $user['firsname']) ?>">
                    </div>
                </div>

                <div class="input-group">
                    <label for="lastname">Nom</label>
                    <div class="input-wrapper">
                        <i class="fas fa-user-tag"></i>
                        <input type="text" name="lastname" id="lastname" value="<?= htmlspecialchars($user['lastname']) ?>">
                    </div>
                </div>

                <div class="input-group">
                    <label for="email">Email</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" id="email" value="<?= htmlspecialchars($user['email']) ?>">
                    </div>
                </div>

                <div class="input-group">
                    <label for="contact">Contact</label>
                    <div class="input-wrapper">
                        <i class="fas fa-phone"></i>
                        <input type="text" name="contact" id="contact" value="<?= htmlspecialchars($user['contact']) ?>">
                    </div>
                </div>

                <div class="input-group">
                    <label>Sexe</label>
                    <div class="radio-container">
                        <label class="radio-option">
                            <input type="radio" name="sexe" value="F" <?= $f ?>> Féminin
                        </label>
                        <label class="radio-option">
                            <input type="radio" name="sexe" value="M" <?= $m ?>> Masculin
                        </label>
                    </div>
                </div>

                <div class="input-group">
                    <label for="birth_day">Date de naissance</label>
                    <div class="input-wrapper">
                        <i class="fas fa-calendar-alt"></i>
                        <input type="date" name="birth_day" id="birth_day" value="<?= $user['birth_day'] ?>">
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i> Enregistrer les modifications
                </button>
            </form>

        <?php else : ?>
            <div class="not-found">
                <i class="fas fa-exclamation-triangle fa-3x"></i>
                <p>Cet utilisateur n'existe pas.</p>
                <a href="/users" class="btn-submit" style="text-decoration:none; margin-top:20px;">Retour</a>
            </div>
        <?php endif ?>

    </div>
</div>

</body>
</html>
