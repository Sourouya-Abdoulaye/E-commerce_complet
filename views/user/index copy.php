<div class="main-content">
    <div class="table-header-group">
        <h1>Utilisateurs</h1>
        <div class="toolbar">
            <div class="search-wrapper">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Rechercher un membre..." onkeyup="filterTable(this)">
            </div>
            <a href="/admin/users/form" class="add-link">Ajouter</a>
        </div>
    </div>

    <div class="table-wrap">
          <table>
            <thead>
              <tr>
                <th>N° Commande</th>
                <th>Client</th>
                <th>Produits</th>
                <th>Montant</th>
                <th>Date</th>
                <th>Statut</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><span class="td-order">#CMD-2024</span></td>
                <td>
                  <div class="td-client">
                    <div class="td-avatar">KD</div>
                    <div>
                      <div class="td-name">Kodjo Dossou</div>
                      <div class="td-email">kodjo@email.com</div>
                    </div>
                  </div>
                </td>
                <td>2 articles</td>
                <td class="td-amount">48 500 fcfa</td>
                <td class="td-date">22 Fév 2026</td>
                <td><span class="badge-status livree">Livrée</span></td>
                <td>
                  <div class="td-actions">
                    <div class="action-btn"><i class="fa-solid fa-eye"></i></div>
                    <div class="action-btn danger"><i class="fa-solid fa-trash"></i></div>
                  </div>
                </td>
              </tr>
              </tbody>
            <table>
        </div>

    <div class="table-responsive">
        <table class="user-table">
            <thead>
                <tr>
                    <th>Utilisateur</th>
                    <th>Email & Contact</th>
                    <th>Sexe</th>
                    <th>Naissance</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td>
                        <span class="user-name"><?= $user["firstname"] ?> <?= $user["lastname"] ?></span>
                    </td>
                    <td>
                        <div class="contact-info">
                            <span class="email"><?= $user["email"] ?></span>
                            <span class="phone"><?= $user["contact"] ?></span>
                        </div>
                    </td>
                    <td>
                        <span class="gender-badge"><?= $user["sexe"] ?></span>
                    </td>
                    <td><?= $user["birth_day"] ?></td>
                    <td class="actions-cell">
                        <a href="/users/<?=$user["id"]?>" class="icon-view"><i class="fa-solid fa-eye"></i></a>
                        <a href="/users/<?= $user["id"]?>/edit" class="icon-edit"><i class="fa-solid fa-pen"></i></a>
                        <form action="/users/<?=$user["id"]?>/delete" method="post" style="display:inline;">
                            <button type="submit" class="icon-delete"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
