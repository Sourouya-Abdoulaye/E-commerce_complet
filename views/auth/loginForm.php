 <?php 
    if (isset($_SESSION['login_erros'])) {
        $erros ='⚠ '.$_SESSION['login_erros'] ;
        unset( $_SESSION['login_erros']);
      
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formulaire.css">
    <title>editer</title>
    <style>
        <?php include_once __DIR__."/../../public/asset/css/commun/style.css"  ?>
        <?php include_once __DIR__."/../../public/asset/css/auth/login.css"  ?>
    </style>

    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>

<main>
    
    <div class="login-wrapper">
        <div class="login-card">
            <div class="form-header">
                <i class="fas fa-user-circle"></i>
                <h2>Connexion</h2>
                <p>Heureux de vous revoir !</p>
                <p style='color:red; font-size:18px'><?=$erros?></p>
                
            </div>

            <form action="/login/action" method="post">
                <div class="input-group">
                    <i class="fas fa-envelope"  style="color: rgb(76, 76, 110);"></i>
                    <input type="email" name="email" id="email" placeholder="Votre Email" required>
                </div>

                <div class="input-group">
                    <i class="fas fa-lock" style="color: rgb(76, 76, 110);"></i>
                    <input name="password" type="password" id="password" placeholder="Votre mot de passe" required>
                    <span class="toggle-password" onclick="togglePassword()">
                        <i class="fas fa-eye" id="eyeIcon" style="color: rgb(76, 76, 110);"></i>
                    </span>
                </div>

                <div class="form-options">
                    <label><input type="checkbox" checked> Se souvenir de moi</label>
                    <a href="#" class="forgot-link">Mot de passe oublié ?</a>
                </div>

                <button type="submit" class="btn-submit">
                    <span>Se connecter</span>
                    <i class="fas fa-arrow-right"></i>
                </button>

                <div class="pas_compte">

                    <p>Pas de compte ?</p>
                    <?php
                        if (isset($_SESSION['connexion'])  && $_SESSION['connexion']['role']=='admin') {
                            $alien="/admin/users/form";
                        } else {
                            $alien="/users/form";
                        
                        }
                    ?>
                    <a href=<?=$alien?> >S'inscrire <i class="fas fa-user-plus"></i></a>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    }
</script>

   
   


   
    
</body>
</html>