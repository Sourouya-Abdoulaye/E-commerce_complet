<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails Utilisateur</title>
    <script src="https://kit.fontawesome.com/a80ab110e1.js" crossorigin="anonymous"></script>
    <style>
        <?php // include_once __DIR__."/../../public/asset/css/commun/style.css"  ?>
        <?php include_once __DIR__."/../../public/asset/css/user/detail.css"  ?>
    </style>
</head>
<body>

<div class="container">
    <header class="header">
        <h1>Détails de l'utilisateur</h1>
        <div class="nav-actions">
            <a href="/admin/users" class="btn-nav"><i class="fas fa-list"></i> Liste</a>
            <a href="/users/form" class="btn-nav btn-primary"><i class="fas fa-plus"></i> Ajouter</a>
            <a href="/admin/dashboard" class="btn-nav"><i class="fas fa-chart-line"></i> Dashboard</a>
        </div>
    </header>

    <div class="profile-card">
        <?php if($user !== null): ?>
            <!-- En-tête du profil avec Avatar -->
            <div class="profile-header">
                <div class="avatar-big">
                    <?= strtoupper(substr($user["firsname"], 0, 1) . substr($user["lastname"], 0, 1)) ?>
                </div>
                <div class="profile-title">
                    <h2><?= htmlspecialchars($user["firsname"] . " " . $user["lastname"]) ?></h2>
                    <span class="status-badge">Utilisateur Actif</span>
                </div>
            </div>

            <!-- Grille d'informations -->
            <div class="detail-grid">
                <div class="detail-item">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <label>Email</label>
                        <p><?= htmlspecialchars($user["email"]) ?></p>
                    </div>
                </div>

                <div class="detail-item">
                    <i class="fas fa-phone"></i>
                    <div>
                        <label>Contact</label>
                        <p><?= htmlspecialchars($user["contact"]) ?></p>
                    </div>
                </div>

                <div class="detail-item">
                    <i class="fas fa-venus-mars"></i>
                    <div>
                        <label>Sexe</label>
                        <p><?= ($user["sexe"] == 'M' || $user["sexe"] == 'm') ? 'Masculin' : 'Féminin' ?></p>
                    </div>
                </div>

                <div class="detail-item">
                    <i class="fas fa-birthday-cake"></i>
                    <div>
                        <label>Date de naissance</label>
                        <p><?= htmlspecialchars($user["birth_day"]) ?></p>
                    </div>
                </div>

                <div class="detail-item">
                    <i class="fas fa-shield-alt"></i>
                    <div>
                        <label>Mot de passe</label>
                        <p>•••••••• (Masqué)</p>
                    </div>
                </div>
            </div>

            <div class="footer-actions">
                <a href="/users/<?= $user['id'] ?>/edit" class="btn-edit">
                    <i class="fas fa-user-edit"></i> Modifier le profil
                </a>
            </div>

        <?php else: ?>
            <div class="error-msg">
                <i class="fas fa-search"></i>
                <h3>Utilisateur introuvable</h3>
                <p>Le profil que vous recherchez n'existe plus ou a été déplacé.</p>
                <a href="/users" class="btn-nav">Retour à la liste</a>
            </div>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
