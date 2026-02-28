<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a80ab110e1.js" crossorigin="anonymous"></script>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        <?php  include_once __DIR__."/../../public/asset/css/commun/dashboard.css"  ?>
        <?php  include_once __DIR__."/../../public/asset/css/commun/style.css"  ?>
        <?php include_once __DIR__."/../../public/asset/css/user/index.css"  ?>
        <?php include_once __DIR__."/../../public/asset/css/commun/layout.css"  ?>
    </style>

    <title>layout</title>
</head>
<body >
    <?php require_once __DIR__."/../layout/seidbare.php" ?>

     <div class="main">
            <div class="topbar">
        <div class="topbar-left">
            <button class="burger-btn" onclick="toggleSidebar()"><i class="fa-solid fa-bars"></i></button>
            <div class="topbar-title">
            <h2>Tableau de bord</h2>
            <p>Bienvenue, Admin 👋</p>
            </div>
        </div>
        <div class="topbar-right">
            <div class="date-chip"><i class="fa-regular fa-calendar"></i> 22 Fév 2026</div>
            <div class="topbar-btn" title="Rechercher"><i class="fa-solid fa-magnifying-glass"></i></div>
            <div class="topbar-btn" title="Notifications">
            <i class="fa-solid fa-bell"></i>
            <span class="notif-dot"></span>
            </div>
            <a href="/" class="topbar-btn" title="Voir la boutique"><i class="fa-solid fa-store"></i></a>

            <div class="nav-actions">
            <i class="fa fa-moon" onclick="toggleDark()"></i>
            </div>
        </div>
        </div>

        <!-- <div class="navbar">
            <div class="toggle-btn" onclick="toggleSidebar()">
            <i class="fa fa-bars"></i>
            </div>

            
        </div> -->

        <?php require_once __DIR__."/../$contenu";   ?>

    </div>
    
    <script>
        function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('open');
        document.getElementById('sidebar-overlay').classList.toggle('open');
        }
        function closeSidebar() {
        document.getElementById('sidebar').classList.remove('open');
        document.getElementById('sidebar-overlay').classList.remove('open');
        }

        // Tab btn toggle
        document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const siblings = this.parentElement.querySelectorAll('.tab-btn');
            siblings.forEach(s => s.classList.remove('active'));
            this.classList.add('active');
        });
        });

        // Nav item toggle
        // document.querySelectorAll('.nav-item').forEach(item => {
        // item.addEventListener('click', function () {
        //     document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));
        //     this.classList.add('active');
        //     prevent.default()
        // });
        // });



        // function toggleSidebar() {
        // const sidebar = document.getElementById("sidebar");

        // if (window.innerWidth <= 768) {
        //     sidebar.classList.toggle("active");
        // } else {
        //     sidebar.classList.toggle("collapsed");
        // }
        // }

        function toggleDark() {
        document.body.classList.toggle("dark");

        }

       

     
    </script>
</body>
</html>