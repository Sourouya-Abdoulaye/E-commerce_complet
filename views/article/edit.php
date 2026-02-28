<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a80ab110e1.js" crossorigin="anonymous"></script>
     <style>
        <?php include_once __DIR__."/../../public/asset/css/commun/style.css"  ?>
        <?php include_once __DIR__."/../../public/asset/css/user/edit.css"  ?>
    </style>
    <!-- permet d'utliser les biblioteque icone animation etc.. -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com">



    <title>Document</title>
</head>
<body>
    <br>
    <br>
    <a href="/admin/users"> <button type="button">Liste des users</button></a>

    <?php 
        // print_r($user) ;

        if (isset($user) && in_array($user['sexe'],['m','M'])) {
           $m="checked";
           $f="unchecked";
        }
        elseif (isset($user) && in_array($user['sexe'],['f','F'])) {
            $m="unchecked";
            $f="checked";
    
        } else {
            $m="";
            $f="";
        }

    
    ?>
    <?php if (isset($user)): ?>

        <form action="/users/3/update" method="POST">


            <br>
            <label for="firsname">Firsname :</label>
            <input type="text" name="firsname" id="firsname"  value= <?=$user['firsname']?> >

            <label for="lastname">Lastname :</label>
            <input type="text" name="lastname" id="lastname"  value= <?=$user['lastname']?>>

            <label for="email">Email :</label>
            <input type="text" name="email" id="email"  value= <?=$user['email']?>>

            <label for="contact">contact :</label>
            <input type="text" name="contact" id="contact"   value= <?=$user['contact']?>>
             <label for="f">Sexe</label>
            <div>
                <label for="m">F</label>
                <input type="radio" name="sexe" id="m" value="M" <?=$f?> > <br>

                <label for="f">M</label>
                <input type="radio" name="sexe" id="f" value="F" <?=$m?>  > 
            </div>

            <label for="birth_day">Birth day:</label>
            <input type="date" name="birth_day" id="birth_day"   >


            <button type="submit" >
                Enregistrer le livre
            </button>
        </form>
    <?php else :?>
        <h3>le User n'existe pas</h3>
    <?php endif ?>

</body>
</html>