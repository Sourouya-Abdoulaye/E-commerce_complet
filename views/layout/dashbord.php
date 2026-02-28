<a href="/?article=<?= $product["id"]?>&#produits"> 
                                            <button type="button" class="add">
                                                <!-- c'est pour verifier si le produit existe deja dans panier -->
                                                <?php  $resultat= (isset($_SESSION['panier']) &&  $_SESSION['panier'][$product["id"]]) ? "déja au panier" : "ajouter au panier" ; ?>
                                                
                                                <!-- ajouter panier -->
                                                <?=$resultat?>
                                            </button> 
                                            
                                    </a>
<!-- Content -->
    <div class="content">

      <!-- KPI Cards -->
      <div class="kpi-grid">
        <div class="kpi-card purple">
          <div class="kpi-top">
            <div class="kpi-icon"><i class="fa-solid fa-money-bill-wave"></i></div>
            <div class="kpi-trend up"><i class="fa-solid fa-arrow-trend-up"></i> +12.5%</div>
          </div>


          <?php
            $solde=0;
            foreach ($products as $product) {
              $solde+=$product['prix'];
            }
          ?>
          <div class="kpi-value">
            <?= $solde ?>
          </div>
          <div class="kpi-label">Revenus ce mois (FCFA)</div>
          <div class="kpi-bar">
            <div class="kpi-bar-fill" style="width:72%"></div>
          </div>
        </div>

        <div class="kpi-card blue">
          <div class="kpi-top">
            <div class="kpi-icon"><i class="fa-solid fa-bag-shopping"></i></div>
            <div class="kpi-trend up"><i class="fa-solid fa-arrow-trend-up"></i> +8.3%</div>
          </div>
          <div class="kpi-value">247</div>
          <div class="kpi-label">Commandes ce mois</div>
          <div class="kpi-bar">
            <div class="kpi-bar-fill" style="width:90%"></div>
          </div>
        </div>

        <div class="kpi-card orange">
          <div class="kpi-top">
            <div class="kpi-icon"><i class="fa-solid fa-users"></i></div>
            <div class="kpi-trend up"><i class="fa-solid fa-arrow-trend-up"></i> +21%</div>
          </div>
          <div class="kpi-value">  <?=count($users)?></div>
          <div class="kpi-label">Clients actifs</div>
          <div class="kpi-bar">
            <div class="kpi-bar-fill" style="width:<?=count($users)?>%"></div>
          </div>
        </div>

        <div class="kpi-card green">
          <div class="kpi-top">
            <div class="kpi-icon"><i class="fa-solid fa-box"></i></div>
            <div class="kpi-trend down"><i class="fa-solid fa-arrow-trend-down"></i> -5</div>
          </div>
          <div class="kpi-value"> <?=count($products)   ?></div>
          <div class="kpi-label">Produits en stock</div>
          <div class="kpi-bar">
            <div class="kpi-bar-fill" style="width:<?=count($products)?>%"></div>
          </div>
        </div>
      </div>

      <!-- Charts Row -->
      <div class="grid-row cols-3-1">
        <!-- Revenue Chart -->
        <div class="chart-card">
          <div class="card-head">
            <div>
              <h3>Évolution des ventes</h3>
              <p>Revenus mensuels en FCFA</p>
            </div>
            <div class="card-actions">
              <button class="tab-btn active">7J</button>
              <button class="tab-btn">30J</button>
              <button class="tab-btn">1A</button>
            </div>
          </div>
          <div class="mini-chart">
            <div class="bar-group">
              <div class="bar" style="height:55%;background:rgba(200,184,255,0.3);" data-val="180K"></div>
              <div class="bar-label">Lun</div>
            </div>
            <div class="bar-group">
              <div class="bar" style="height:72%;background:rgba(200,184,255,0.5);" data-val="235K"></div>
              <div class="bar-label">Mar</div>
            </div>
            <div class="bar-group">
              <div class="bar" style="height:45%;background:rgba(200,184,255,0.3);" data-val="148K"></div>
              <div class="bar-label">Mer</div>
            </div>
            <div class="bar-group">
              <div class="bar" style="height:88%;background:linear-gradient(to top,#c8b8ff,rgba(200,184,255,0.6));"
                data-val="288K"></div>
              <div class="bar-label">Jeu</div>
            </div>
            <div class="bar-group">
              <div class="bar" style="height:65%;background:rgba(200,184,255,0.4);" data-val="212K"></div>
              <div class="bar-label">Ven</div>
            </div>
            <div class="bar-group">
              <div class="bar" style="height:100%;background:linear-gradient(to top,#a88fff,#c8b8ff);" data-val="327K">
              </div>
              <div class="bar-label">Sam</div>
            </div>
            <div class="bar-group">
              <div class="bar" style="height:78%;background:rgba(200,184,255,0.45);" data-val="254K"></div>
              <div class="bar-label">Dim</div>
            </div>
          </div>
        </div>

        <!-- Donut -->
        <div class="chart-card">
          <div class="card-head">
            <div>
              <h3>Par catégorie</h3>
              <p>Répartition des ventes</p>
            </div>
          </div>
          <div class="donut-wrap">
            <div class="donut"></div>
            <div class="donut-legend">
              <div class="legend-item">
                <div class="legend-dot" style="background:#c8b8ff"></div><span>Chaussures</span><strong>38%</strong>
              </div>
              <div class="legend-item">
                <div class="legend-dot" style="background:#8eb8d8"></div><span>Habillé</span><strong>27%</strong>
              </div>
              <div class="legend-item">
                <div class="legend-dot" style="background:var(--accent3)"></div>
                <span>Pantalons</span><strong>15%</strong>
              </div>
              <div class="legend-item">
                <div class="legend-dot" style="background:var(--green)"></div>
                <span>Casquettes</span><strong>20%</strong>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Two columns -->
      <div class="grid-row cols-2">
        <!-- Quick Actions -->
        <div class="chart-card">
          <div class="card-head">
            <h3>Actions rapides</h3>
          </div>
          <div class="quick-actions">
            <a href="/admin/article/form">
              <div class="qa-btn purple"><i class="fa-solid fa-plus"></i><span>Ajouter produit</span></div>
            </a>

            <a href="/admin/users/form">
              <div class="qa-btn purple"><i class="fa-solid fa-plus"></i><span>Ajouter un menbres</span></div>
            </a>

            <a href="#/admin/client">
              <div class="qa-btn purple"><i class="fa-solid fa-eye"></i><span>Voir les client</span></div>
            </a>
            
            <div class="qa-btn blue"><i class="fa-solid fa-tag"></i><span>Nouvelle promo</span></div>
            <div class="qa-btn orange"><i class="fa-solid fa-truck"></i><span>Gérer livraisons</span></div>
            <div class="qa-btn green"><i class="fa-solid fa-file-export"></i><span>Exporter données</span></div>
          </div>
        </div>

        <!-- Top Products -->
        <div class="chart-card">
          <div class="card-head">
            <h3>Top Produits</h3>
            <p>Cette semaine</p>
          </div>

          <div>
            <?php foreach ($products as $num => $product):  ?>
              <div class="top-product">
                <div class="tp-rank gold"> <?=$num ?> </div>
                <img class="tp-img" src="/asset/medias/<?=$product["image"]?>" alt=<?=$product["libelle"]?> >

                <div class="tp-info">
                  <div class="tp-name"><?=$product["libelle"]?></div>
                  <div class="tp-cat">Chaussures</div>
                </div>

                <div class="tp-right">
                  <div class="tp-sales">87 ventes</div>
                  <div class="tp-revenue">3.9M fcfa</div>
                </div>
              </div>
             
              <?php if ($num==3)  break  ?>
            <?php endforeach?>


          </div>
        </div>
      </div>

      <!-- Orders Table -->
      <!-- <div class="table-card" id="orders">
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
      </div> -->

    </div><!-- /content -->

