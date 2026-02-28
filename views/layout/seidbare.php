<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
      <!-- Sidebar overlay -->
  <div class="sidebar-overlay" id="sidebar-overlay" onclick="closeSidebar()"></div>

  <!-- ===== SIDEBAR ===== -->
  <aside class="sidebar" id="sidebar">
    <div class="sidebar-logo">
      <i class="fa-solid fa-shop"></i>
      <div>
        <span>Ecommerce</span>
        <small>Admin Panel</small>
      </div>
    </div>

    <?php $currentPage = $_SERVER['REQUEST_URI']; ?>

<nav>

  <a href="/">
    <div class="nav-item <?= $currentPage === '/' ? 'active' : '' ?>">
      <i class="fa-solid fa-home"></i> Home
    </div>
  </a>

  <div class="sidebar-section-label">Principal</div>

  <a href="/admin/dashboard">
    <div class="nav-item <?= str_contains($currentPage, '/admin/dashboard') ? 'active' : '' ?>">
      <i class="fa-solid fa-gauge-high"></i> Tableau de bord
    </div>
  </a>

  <a href="/admin/cmd">
    <div class="nav-item <?= str_contains($currentPage, '/admin/cmd') ? 'active' : '' ?>">
      <i class="fa-solid fa-bag-shopping"></i> Commandes 
      <span class="nav-badge"><?=$nbre_cmd?></span>
    </div>
  </a>

  <a href="/admin/articles">
    <div class="nav-item <?= str_contains($currentPage, '/admin/articles') ? 'active' : '' ?>">
      <i class="fa-solid fa-box"></i> Produits
    </div>
  </a>

  <a href="/admin/users/admin">
    <div class="nav-item <?= str_contains($currentPage, '/admin/users/admin') ? 'active' : '' ?>">
      <i class="fa-solid fa-users"></i> Admins
    </div>
  </a>

  <a href="/admin/users/client">
    <div class="nav-item <?= str_contains($currentPage, '/admin/users/client') ? 'active' : '' ?>">
      <i class="fa-solid fa-users"></i> Clients
    </div>
  </a>

  <div class="sidebar-section-label">Commerce</div>

  <a href="#/admin/categories">
    <div class="nav-item <?= str_contains($currentPage, '/admin/categories') ? 'active' : '' ?>">
      <i class="fa-solid fa-tag"></i> Catégories
    </div>
  </a>

  <a href="#/admin/livraisons">
    <div class="nav-item <?= str_contains($currentPage, '/admin/livraisons') ? 'active' : '' ?>">
      <i class="fa-solid fa-truck"></i> Livraisons
    </div>
  </a>

  <a href="#/admin/promotions">
    <div class="nav-item <?= str_contains($currentPage, '/admin/promotions') ? 'active' : '' ?>">
      <i class="fa-solid fa-percent"></i> Promotions 
      <span class="nav-badge">3</span>
    </div>
  </a>

  <a href="#/admin/avis">
    <div class="nav-item <?= str_contains($currentPage, '/admin/avis') ? 'active' : '' ?>">
      <i class="fa-solid fa-star"></i> Avis
    </div>
  </a>

  <div class="sidebar-section-label">Paramètres</div>

  <a href="#/admin/rapports">
    <div class="nav-item <?= str_contains($currentPage, '/admin/rapports') ? 'active' : '' ?>">
      <i class="fa-solid fa-chart-line"></i> Rapports
    </div>
  </a>

  <a href="#/admin/settings">
    <div class="nav-item <?= str_contains($currentPage, '/admin/settings') ? 'active' : '' ?>">
      <i class="fa-solid fa-gear"></i> Paramètres
    </div>
  </a>

</nav>
    <div class="sidebar-bottom">
      <div class="user-card">
        <div class="user-avatar">A</div>
        <div class="user-info">
          <div class="user-name">Admin</div>
          <div class="user-role">● En ligne</div>
        </div>
        <a href="/deconexion" style="color:var(--text2);font-size:0.85rem;" title="Déconnexion">
          <i class="fa-solid fa-right-from-bracket"></i>
        </a>
      </div>
    </div>
  </aside>

   
</body>
</html>