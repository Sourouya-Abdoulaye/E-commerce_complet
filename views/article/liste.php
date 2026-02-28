<div class="content">
    <div  class="table-card" id="orders" >

    <div class="table-header-group" class="card-head" style="padding:1.5rem 1.5rem 0;">
        <h3>Articles Disponibles</3>
        <div class="toolbar">
            <div class="search-wrapper">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Rechercher un article..." onkeyup="filterTable(this)">
            </div>
            <a href="/admin/article/form" class="add-link">
                <button class="tab-btn"><i class="fa-solid fa-plus"></i>Ajouter un article</button>
            </a>
        </div>
    </div>


    <div class="table-wrap">
    <table>
        <thead>
            <tr>
                <th>Libellé</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $article): ?>
                <tr>
                    <td>
                        <div class="td-name">
                            <?= htmlspecialchars($article["libelle"]) ?>
                        </div>
                    </td>

                    <td class="td-amount">
                        <span class="badge-status">
                            <?= number_format($article["prix"], 2, ',', ' ') ?> €
                        </span>
                    </td>

                    <td>
                        <?= (int)$article["quantite"] ?>
                    </td>

                    <td class="td-date">
                        <?= htmlspecialchars($article["date"]) ?>
                    </td>

                    <td>
                        <div class="td-actions">

                            <!-- Voir -->
                            <a href="/article/<?= $article["id"] ?>" class="action-btn">
                                <i class="fa-solid fa-eye"></i>
                            </a>

                            <!-- Modifier -->
                            <a href="/article/<?= $article["id"] ?>/edit" class="action-btn">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>

                            <!-- Supprimer -->
                            <form action="/article/<?= $article["id"] ?>/delete" 
                                  method="POST" 
                                  onsubmit="return confirm('Supprimer ?');" 
                                  style="display:inline;">
                                <button type="submit" class="action-btn danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    </div>
</div>

