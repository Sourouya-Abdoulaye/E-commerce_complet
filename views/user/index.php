

<div class="content">
<div  class="table-card" id="orders" >

    <div class="table-header-group" class="card-head" style="padding:1.5rem 1.5rem 0;">
        <h3>Utilisateurs</3>
        <div class="toolbar">
            <div class="search-wrapper">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Rechercher un membre..." onkeyup="filterTable(this)">
            </div>
            <a href="/admin/users/form" class="add-link">
                <button class="tab-btn"><i class="fa-solid fa-plus"></i>Ajouter</button>
            </a>
        </div>
    </div>

    <div class="table-wrap">
    <table>
        <thead>
            <tr>
                <th>Utilisateur</th>
                <th>Email & Contact</th>
                <th>Sexe</th>
                <th>Naissance</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td>
                    <div class="td-client">
                        <div class="td-avatar">
                            <?= strtoupper(substr($user["firstname"],0,1) . substr($user["lastname"],0,1)) ?>
                        </div>
                        <div>
                            <div class="td-name">
                                <?= $user["firstname"] ?> <?= $user["lastname"] ?>
                            </div>
                        </div>
                    </div>
                </td>

                <td>
                    <div class="td-email"><?= $user["email"] ?></div>
                    <div class="td-contact"><?= $user["contact"] ?></div>
                </td>

                <td>
                    <span class="badge-status">
                        <?= $user["sexe"] ?>
                    </span>
                </td>

                <td class="td-date">
                    <?= $user["birth_day"] ?>
                </td>

                <td>
                    <div class="td-actions">
                        <a href="/users/<?= $user["id"] ?>" class="action-btn">
                            <i class="fa-solid fa-eye"></i>
                        </a>

                        <a href="/users/<?= $user["id"] ?>/edit" class="action-btn">
                            <i class="fa-solid fa-pen"></i>
                        </a>

                        <form action="/users/<?= $user["id"] ?>/delete" method="post" style="display:inline;">
                            <button type="submit" class="action-btn danger">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
</div>
</div>
