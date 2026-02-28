
    <!-- Barre latérale -->
    <div class="sidebar" id="sidebar">
    <div class="logo"> 
        <i class="fa-solid fa-shop"></i>
        <span>E-commerce</span>

    </div>

  <ul>
    <li> <a href="/">  <button><i class="fa fa-home"> </i> <span>HOME </span> </button></a>  </li>

     <!-- analyse -->
    <li><button><i class="fa fa-chart-line"></i><span>Analytics</span><i class="fa-solid fa-caret-down"></i></button></li>
    <li> <a href="/admin/dashboard"><button> <i class="fa fa-home"> </i> <span> Dashboard</span></button>  </a> </li>
    <li> <a href="/admin/soldes"><button><i class="fa-solid fa-euro-sign"></i> <span> Soldes</span></button>  </a> </li>


    



    <!-- utilisateur -->
    <li></i><button>  <i class="fa fa-user"></i><span> Utilisateurs</span> <i class="fa-solid fa-caret-down"></i></button></li>
    <li> <a href="/admin/users"><button> <i class="fa-solid fa-users"></i> <span> Liste des users</span></button> </a>  </li>
    <li> <a href="/admin/users/form"><button> <i class="fa-solid fa-user-plus"></i> <span>Ajouter un user </span> </button> </a>  </li>

     <!-- article -->
    <li><button> <i class="fa-solid fa-box"></i> <span> Articles</span><i class="fa-solid fa-caret-down"></i></button></li>
    <li> <a href="/admin/articles"> <button><i class="fa-solid fa-shirt"></i> <span>Liste des article </span> </button> </a>  </li>
    <li>  <a href="/admin/article/form"> <button><i class="fa fa-plus"></i>  <span> Ajouter un article</span></button> </a>  </li>

    <!-- notification -->
    <li>
      <button>
        <i class="fa fa-bell"></i>
        <span>Notifications</span>
        <span class="badge">3</span>
      </button>
    </li>
    <!-- parametre -->
    <li><button><i class="fa fa-cog"></i><span>Settings</span></button></li>


     
            <span>
                <?php if (isset($_SESSION['connexion'])): ?> 
                        <li class="logout"><a href='/deconexion'> <button type="button"><i class="fa-solid fa-arrow-right-from-bracket"></i> <span>Deconexion</span></button></a></li>
                    <?php else : ?>
                        <li class="login"> <a href='/login/form'> <button type="button"><i class="fa-solid fa-arrow-right-from-bracket"></i> <span>Conexion</span></button></a> </li>
                    <?php endif ?>
            </span>
        

  </ul>

  <div class="profile">
    <img src="https://i.pravatar.cc/100" alt="profile">
    <span>John Doe</span>
  </div>
</div>

