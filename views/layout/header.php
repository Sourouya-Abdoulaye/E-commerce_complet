    <header>
    <div class="header_row">
      
        <nav>
      <div id="logo">
        <a href="/">
          <i class="icone fa-solid fa-shop"></i>
          <span id="nom-entreprise">Sourouya-Shop</span>
        </a>
      </div>
      <ul class="nav_link bare_tache" style="margin-left:2rem;">
        <li><a href="/">Accueil</a></li>
        <li class="mes_categorie">
          <a href="#categorie">Catégorie <i class="fa-solid fa-chevron-down" style="font-size:0.65rem;margin-left:3px;"></i></a>
          <ul class="categorie_element">
            <a href="/?categorie=Casquette#categorie"><li>🧢 Casquette</li></a>
            <a href="/?categorie=Habit#categorie"><li>👔 Habillé</li></a>
            <a href="/?categorie=Pantalon#categorie"><li>👖 Pantalon</li></a>
            <a href="/?categorie=Chaussure#categorie"><li>👟 Chaussure</li></a>
          </ul>
        </li>
        <li><a href="/propo">À propos</a></li>
        <li><a href="#contact">Contact</a></li>
        <?php if (isset($_SESSION['connexion']) && $_SESSION['connexion']['role']=='admin'): ?> 
            <li > <a href='/admin/dashboard'>Dashboard</a> </li>
        <?php endif ?>
      </ul>
    </nav>

    <!-- id="open-cart" -->
    <ul class="nav_link actions bare_tache">
      <li>
        <a href="/panier" class="panier" >
          <i class="fa-solid fa-cart-arrow-down"></i>
          Panier 
          <span class="badge" id="cart-count">
            
            <?= (isset($_SESSION["panier"]))? count($_SESSION["panier"])  :0     ?> 
          </span>
        </a>
      </li>
      <div class="nav-droit">
            <?php if (isset($_SESSION['connexion'])): ?> 
                <li class="logout"><a href='/deconexion'>Deconexion</a></li>
            <?php else : ?>
                <li class="login"> <a href='/login/form'>Conexion</a> </li>
            <?php endif ?>
        </div>
    </ul>

    <div id="taches" onclick="toggleMobileNav()">
      <!-- les 3 barre -->
      <i class="fa-solid fa-bars"></i>
    </div>
  </div>
              
  


  <!-- Mobile Nav -->
  <div class="mobile-nav" id="mobile-nav">
    <a href="/">🏠 Accueil</a>
    <a href="#categorie">📂 Catégorie</a>
    <a href="#propos">ℹ️ À propos</a>
    <a href="#contact">📬 Contact</a>
    <a href="/panier" id="open-cart-mobile">🛒 Panier (<?= (isset($_SESSION["panier"]))? count($_SESSION["panier"]) :0   ?> )</a>
    <a href="/login/form" style="color: var(--accent); font-weight:700;">Connexion</a>
  </div>
</header>



