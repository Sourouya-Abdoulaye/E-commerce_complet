<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php  include_once __DIR__."/../../public/asset/css/commun/dashboard.css"  ?>
    </style>
</head>
<body>
    <h1>je la liste des commande</h1>

     <div class="table-card" id="orders">
        <div class="card-head" style="padding:1.5rem 1.5rem 0;">
          <div>
            <h3>Commandes récentes</h3>
            <p>12 commandes en attente de traitement</p>
          </div>
          <div class="card-actions">
            <button class="tab-btn active">Toutes</button>
            <button class="tab-btn">En cours</button>
            <button class="tab-btn">Livrées</button>
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
              <tr>
                <td><span class="td-order">#CMD-2023</span></td>
                <td>
                  <div class="td-client">
                    <div class="td-avatar">AK</div>
                    <div>
                      <div class="td-name">Afi Koudjo</div>
                      <div class="td-email">afi@email.com</div>
                    </div>
                  </div>
                </td>
                <td>1 article</td>
                <td class="td-amount">12 000 fcfa</td>
                <td class="td-date">21 Fév 2026</td>
                <td><span class="badge-status encours">En cours</span></td>
                <td>
                  <div class="td-actions">
                    <div class="action-btn"><i class="fa-solid fa-eye"></i></div>
                    <div class="action-btn"><i class="fa-solid fa-pen"></i></div>
                  </div>
                </td>
              </tr>
              <tr>
                <td><span class="td-order">#CMD-2022</span></td>
                <td>
                  <div class="td-client">
                    <div class="td-avatar">ML</div>
                    <div>
                      <div class="td-name">Marc Lomé</div>
                      <div class="td-email">marc@email.com</div>
                    </div>
                  </div>
                </td>
                <td>3 articles</td>
                <td class="td-amount">95 000 fcfa</td>
                <td class="td-date">20 Fév 2026</td>
                <td><span class="badge-status attente">En attente</span></td>
                <td>
                  <div class="td-actions">
                    <div class="action-btn"><i class="fa-solid fa-eye"></i></div>
                    <div class="action-btn"><i class="fa-solid fa-pen"></i></div>
                  </div>
                </td>
              </tr>
              <tr>
                <td><span class="td-order">#CMD-2021</span></td>
                <td>
                  <div class="td-client">
                    <div class="td-avatar">FS</div>
                    <div>
                      <div class="td-name">Fatou Sow</div>
                      <div class="td-email">fatou@email.com</div>
                    </div>
                  </div>
                </td>
                <td>1 article</td>
                <td class="td-amount">4 200 fcfa</td>
                <td class="td-date">19 Fév 2026</td>
                <td><span class="badge-status annulee">Annulée</span></td>
                <td>
                  <div class="td-actions">
                    <div class="action-btn"><i class="fa-solid fa-eye"></i></div>
                    <div class="action-btn danger"><i class="fa-solid fa-trash"></i></div>
                  </div>
                </td>
              </tr>
              <tr>
                <td><span class="td-order">#CMD-2020</span></td>
                <td>
                  <div class="td-client">
                    <div class="td-avatar">JA</div>
                    <div>
                      <div class="td-name">Jean Akpovi</div>
                      <div class="td-email">jean@email.com</div>
                    </div>
                  </div>
                </td>
                <td>2 articles</td>
                <td class="td-amount">73 500 fcfa</td>
                <td class="td-date">18 Fév 2026</td>
                <td><span class="badge-status livree">Livrée</span></td>
                <td>
                  <div class="td-actions">
                    <div class="action-btn"><i class="fa-solid fa-eye"></i></div>
                    <div class="action-btn danger"><i class="fa-solid fa-trash"></i></div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
</body>
</html>