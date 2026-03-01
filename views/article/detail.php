<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a80ab110e1.js" crossorigin="anonymous"></script>
     <style>
        <?php include_once __DIR__."/../../public/asset/css/commun/style.css"  ?>
        <?php include_once __DIR__."/../../public/asset/css/commun/header.css" ?>
        <?php  include_once __DIR__."/../../public/asset/css/article/detail.css"  ?>
    </style>
    <title>Document</title>
</head>
<body>
  
         <!-- HEADER -->
  <header>
    <div class="hrow">
      <a href="/" class="logo"><i class="fa-solid fa-shop"></i><span>Ecommerce</span></a>
      <nav class="hnav">
        <a href="/">Accueil</a>
        <a href="/#categorie">Catégorie</a>
        <a href="/propo">À propos</a>
        <a href="#/contact">Contact</a>
      </nav>
      <div class="hactions">
        <a href="/panier" class="cart-btn">
          <i class="fa-solid fa-cart-arrow-down"></i> Panier 
          <span
            style="background:#f4a261;color:#08080e;font-size:0.65rem;font-weight:700;border-radius:50px;padding:1px 6px;min-width:18px;text-align:center;">
            <?=$nbre_prod?>
          </span>
        </a>

        <div class="nav-droit">
            <?php if (isset($_SESSION['connexion'])): ?> 
               <a href='/deconexion'> <li   class="login-btn">Deconexion</li> </a>
            <?php else : ?>
                <li class="login-btn" class="login"> <a href='/login/form'>Conexion</a> </li>
            <?php endif ?>
        </div>

      </div>
    </div>
    <div class="mobile-nav" id="mobileNav">
      <a href="/">🏠 Accueil</a>
      <a href="/#categorie">📂 Catégorie</a>
      <a href="/contact">📬 Contact</a>
      <a href="/panier">🛒 Panier</a>
    </div>
  </header>
  

  <!-- BREADCRUMB -->
  <div class="breadcrumb">
    <a href="/panier">Accueil</a>
    <i class="fa-solid fa-chevron-right"></i>
    <a href="/?categorie=<?=$article["categorie"]?>#categorie"><?=$article["categorie"]?></a>
    <i class="fa-solid fa-chevron-right"></i>
    <span style="color:#f0eeff;"><?=$article["libelle"]?></span>
  </div>

  <!-- MAIN -->
  <div class="main-wrap">

    <!-- PRODUCT GRID -->
    <div class="product-grid">

      <!-- GALLERY -->
      <div class="gallery">
        <div class="main-img-wrap" id="mainImgWrap">
          <span class="img-badge">−22%</span>
          <img id="mainImg" src="/asset/medias/<?=$article["image"]?>" 
            alt=<?=$article["libelle"]?>>
        </div>


        <div class="thumbs">
          <div class="thumb">
            <a href="/article/<?= $article["id"]?>" >
              <div class="img-overlay">
                  <button style='color:white' class="rc-overlay"><i class="fa-solid fa-eye" style='color:white'></i> Voir détails</button>
              </div>
            </a>
            <img src="/asset/medias/<?=$article["image"]?>" alt=<?=$article["libelle"]?>>
          </div>

          <?php if (isset($article['categorie'])): ?>
          <?php foreach ($products as $product): ?>
              <?php if (
                  $product['categorie'] == $article['categorie'] &&
                  $product['id'] !== $article['id']
              ): ?>

            <div class="thumb">
                <a href="/article/<?= $product["id"] ?>">
                    <div class="img-overlay">
                        <button style="color:white" class="rc-overlay">
                            <i class="fa-solid fa-eye"></i> Voir détails
                        </button>
                    </div>
                </a>

                <img 
                    src="/asset/medias/<?= htmlspecialchars($product["image"]) ?>" 
                    alt="<?= htmlspecialchars($product["libelle"]) ?>">
            </div>

              <?php endif; ?>
            <?php endforeach; ?>
          <?php endif; ?>

        </div>
      </div>

      <!-- PRODUCT INFO -->
      <div class="product-info">
        <div class="pi-category"> <?=$article["categorie"]?> · <?=$article["libelle"]?></div>
        <h1 class="pi-title"><?=$article["libelle"]?><br><span style="color:#c8b8ff;">Édition Blanche</span></h1>

        <div class="pi-rating">
          <div class="stars">
            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star-half-stroke"></i>
          </div>
          <span class="rating-num">4.8</span>
          <span class="rating-count">· <span onclick="document.querySelector('[data-tab=avis]').click()">127
              avis</span></span>
        </div>

        <div class="pi-price">
          <div class="price-main">  <?= number_format($article["prix"], 0, ',', ' ') ?> FCFA </div>
          <div class="price-old">58 000 fcfa</div>
          <div class="price-discount">−22%</div>
        </div>

        <p class="pi-desc">Des sneakers premium alliant confort exceptionnel et design urbain intemporel. Semelle en
          mousse à mémoire de forme, upper en mesh respirant — idéales pour le quotidien comme pour le sport.</p>

        <hr class="pi-divider">

        <!-- Color -->
        <div>
          <div class="pi-option-label">Couleur : <span id="color-label">Blanc</span></div>
          <div class="color-swatches">
            <div class="color-swatch active" style="background:#f0ede8;" onclick="selectColor(this,'Blanc')"
              title="Blanc"></div>
            <div class="color-swatch" style="background:#1a1a2e;" onclick="selectColor(this,'Noir')" title="Noir"></div>
            <div class="color-swatch" style="background:#c8b8ff;" onclick="selectColor(this,'Violet')" title="Violet">
            </div>
            <div class="color-swatch" style="background:#8eb8d8;" onclick="selectColor(this,'Bleu')" title="Bleu"></div>
          </div>
        </div>

        <!-- Size -->
        <div>
          <div class="pi-option-label" style="display:flex;justify-content:space-between;">
            <span>Taille : <span id="size-label">Sélectionner</span></span>
            <a href="#" style="color:#c8b8ff;font-size:0.72rem;font-weight:600;">Guide des tailles →</a>
          </div>
          <div class="size-grid">
            <div class="size-btn out">39</div>
            <div class="size-btn" onclick="selectSize(this,'40')">40</div>
            <div class="size-btn" onclick="selectSize(this,'41')">41</div>
            <div class="size-btn active" onclick="selectSize(this,'42')">42</div>
            <div class="size-btn" onclick="selectSize(this,'43')">43</div>
            <div class="size-btn" onclick="selectSize(this,'44')">44</div>
            <div class="size-btn out">45</div>
          </div>
        </div>

        <!-- Quantity -->
        <div>
          <div class="pi-option-label">Quantité</div>
          <div class="qty-row">
            <div class="qty-control">
                  <span class="qty-val"><?php echo $_SESSION['panier'][$article["id"]]['qte'] ?? 0; ?></span>
            </div>

            <div class="stock-info ok"><i class="fa-solid fa-circle" style="font-size:0.5rem;"></i> En stock (<?=$article["quantite"]?>
              restants)</div>
          </div>
        </div>
        <form action="/article/<?= $article["id"]?>/<?= $article["categorie"]?>/add" method="post" id='formulaire'>
                                            
        </form>

        <!-- CTA -->
        <div class="cta-row">
          <button type="submit" class="btn-cart" form='formulaire'>
             <?php  $resultat= (isset($_SESSION['panier']) && isset($_SESSION['panier'][$article["id"]])) ? "déja au panier" : "ajouter au panier" ; ?>
             <!-- ajouter panier -->
             <?=$resultat?>
          </button>

          <button class="btn-wishlist" id="wishlist-btn" onclick="toggleWishlist(this)">
            <i class="fa-regular fa-heart"></i>
          </button>

        </div>

         <a href="/paiement">
        <button class="btn-buy-now">
          <i class="fa-solid fa-bolt"></i> Acheter maintenant
        </button>
        </a>

        <!-- Features -->
        <div class="features-row">
          <div class="feat-item"><i class="fa-solid fa-truck"></i>
            <p>Livraison<br>gratuite</p>
          </div>
          <div class="feat-item"><i class="fa-solid fa-rotate-left"></i>
            <p>Retour sous<br>30 jours</p>
          </div>
          <div class="feat-item"><i class="fa-solid fa-shield-halved"></i>
            <p>Garantie<br>1 an</p>
          </div>
        </div>

      </div><!-- /product-info -->
    </div><!-- /product-grid -->

    <!-- TABS -->
    <div class="tabs-section">
      <div class="tabs-nav">
        <button class="tab-nav-btn active" data-tab="desc" onclick="switchTab('desc',this)">Description</button>
        <button class="tab-nav-btn" data-tab="specs" onclick="switchTab('specs',this)">Caractéristiques</button>
        <button class="tab-nav-btn" data-tab="avis" onclick="switchTab('avis',this)">Avis (127)</button>
        <button class="tab-nav-btn" data-tab="livraison" onclick="switchTab('livraison',this)">Livraison &
          Retours</button>
      </div>

      <!-- Description -->
      <div class="tab-panel active" id="tab-desc">
        <div class="desc-content">
          <div class="desc-text">
            <h4>Un confort hors du commun</h4>
            <p>Les Sneakers Air Ultra représentent l'apogée de l'innovation en matière de chaussures urbaines. Conçues
              pour ceux qui refusent de choisir entre style et performance, ces sneakers intègrent les dernières
              technologies de confort avec une esthétique minimaliste et raffinée.</p>
            <p>La semelle intercalaire en mousse EVA ultra-légère absorbe les chocs à chaque foulée, tandis que l'upper
              en mesh 3D favorise une circulation optimale de l'air, gardant vos pieds frais toute la journée.</p>
            <div class="desc-features">
              <div class="desc-feat"><i class="fa-solid fa-check"></i> Semelle en mousse EVA haute performance</div>
              <div class="desc-feat"><i class="fa-solid fa-check"></i> Upper en mesh 3D respirant</div>
              <div class="desc-feat"><i class="fa-solid fa-check"></i> Doublure intérieure en coton bio</div>
              <div class="desc-feat"><i class="fa-solid fa-check"></i> Semelle extérieure en caoutchouc antidérapant
              </div>
              <div class="desc-feat"><i class="fa-solid fa-check"></i> Système de laçage Speed-Lock breveté</div>
              <div class="desc-feat"><i class="fa-solid fa-check"></i> Compatible avec semelles orthopédiques</div>
            </div>
          </div>
          <div>
            <img src="/asset/medias/<?=$article["image"]?>" alt=<?=$article["libelle"]?>
              style="width:80%;height:500px;border-radius:16px;border:1px solid rgba(200,184,255,0.1);">
          </div>
        </div>
      </div>

      <!-- catracteristique -->
      <div class="tab-panel" id="tab-specs">
        <div class="specs-table">
          <div class="spec-row"><span class="spec-key">Marque</span><span class="spec-val">Air Ultra™</span></div>
          <div class="spec-row"><span class="spec-key">Référence</span><span class="spec-val">AU-2024-WHT-42</span>
          </div>
          <div class="spec-row"><span class="spec-key">Matière upper</span><span class="spec-val">Mesh 3D + cuir
              synthétique</span></div>
          <div class="spec-row"><span class="spec-key">Semelle int.</span><span class="spec-val">Mousse EVA mémoire de
              forme</span></div>
          <div class="spec-row"><span class="spec-key">Semelle ext.</span><span class="spec-val">Caoutchouc
              vulcanisé</span></div>
          <div class="spec-row"><span class="spec-key">Pointures dispo</span><span class="spec-val">40 · 41 · 42 · 43 ·
              44</span></div>
          <div class="spec-row"><span class="spec-key">Couleurs</span><span class="spec-val">Blanc, Noir, Violet,
              Bleu</span></div>
          <div class="spec-row"><span class="spec-key">Poids (42)</span><span class="spec-val">280 g / chaussure</span>
          </div>
          <div class="spec-row"><span class="spec-key">Fermeture</span><span class="spec-val">Lacets Speed-Lock</span>
          </div>
          <div class="spec-row"><span class="spec-key">Usage</span><span class="spec-val">Urbain, Running léger,
              Lifestyle</span></div>
          <div class="spec-row"><span class="spec-key">Entretien</span><span class="spec-val">Brosse douce + spray
              imperméabilisant</span></div>
          <div class="spec-row"><span class="spec-key">Garantie</span><span class="spec-val">12 mois fabricant</span>
          </div>
        </div>
      </div>

      <!-- Reviews -->
      <div class="tab-panel" id="tab-avis">
        <div class="reviews-overview">
          <div class="rating-big">
            <div class="rating-big-num">4.8</div>
            <div class="rating-big-stars">
              <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star-half-stroke"></i>
            </div>
            <div class="rating-big-count">127 avis vérifiés</div>
          </div>
          <div class="rating-bars">
            <div class="rbar-row"><span class="rbar-label">5★</span>
              <div class="rbar-track">
                <div class="rbar-fill" style="width:72%"></div>
              </div><span class="rbar-count">91</span>
            </div>
            <div class="rbar-row"><span class="rbar-label">4★</span>
              <div class="rbar-track">
                <div class="rbar-fill" style="width:18%"></div>
              </div><span class="rbar-count">23</span>
            </div>
            <div class="rbar-row"><span class="rbar-label">3★</span>
              <div class="rbar-track">
                <div class="rbar-fill" style="width:6%"></div>
              </div><span class="rbar-count">8</span>
            </div>
            <div class="rbar-row"><span class="rbar-label">2★</span>
              <div class="rbar-track">
                <div class="rbar-fill" style="width:2%"></div>
              </div><span class="rbar-count">3</span>
            </div>
            <div class="rbar-row"><span class="rbar-label">1★</span>
              <div class="rbar-track">
                <div class="rbar-fill" style="width:2%"></div>
              </div><span class="rbar-count">2</span>
            </div>
          </div>
        </div>
        <div class="reviews-list">
          <div class="review-card">
            <div class="review-top">
              <div class="review-user">
                <div class="review-avatar">KD</div>
                <div>
                  <div class="review-name">Kodjo Dossou</div>
                  <div class="review-date">18 Fév 2026</div>
                </div>
              </div>
              <div style="display:flex;align-items:center;gap:8px;">
                <div class="review-stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                <div class="review-verified"><i class="fa-solid fa-circle-check"></i>Vérifié</div>
              </div>
            </div>
            <p class="review-text">Excellentes sneakers ! Le confort est incroyable dès le premier jour, aucune période
              de rodage. La qualité des matériaux est vraiment au rendez-vous pour ce prix. Je les porte tous les jours
              depuis 3 semaines sans aucun problème.</p>
            <div class="review-helpful">Utile ? <button class="helpful-btn">👍 Oui (12)</button><button
                class="helpful-btn">👎 Non (1)</button></div>
          </div>
          <div class="review-card">
            <div class="review-top">
              <div class="review-user">
                <div class="review-avatar" style="background:linear-gradient(135deg,#8eb8d8,#4ade80);">AF</div>
                <div>
                  <div class="review-name">Afi Koudjo</div>
                  <div class="review-date">10 Fév 2026</div>
                </div>
              </div>
              <div style="display:flex;align-items:center;gap:8px;">
                <div class="review-stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>
                </div>
                <div class="review-verified"><i class="fa-solid fa-circle-check"></i>Vérifié</div>
              </div>
            </div>
            <p class="review-text">Très beau design, livraison rapide en 2 jours seulement. Je retire une étoile parce
              que la taille est légèrement grande, je conseille de prendre une demi-pointure en dessous. Sinon la
              qualité est parfaite !</p>
            <div class="review-helpful">Utile ? <button class="helpful-btn">👍 Oui (8)</button><button
                class="helpful-btn">👎 Non (0)</button></div>
          </div>
          <div class="review-card">
            <div class="review-top">
              <div class="review-user">
                <div class="review-avatar" style="background:linear-gradient(135deg,#f4a261,#e08244);">ML</div>
                <div>
                  <div class="review-name">Marc Lomé</div>
                  <div class="review-date">2 Fév 2026</div>
                </div>
              </div>
              <div style="display:flex;align-items:center;gap:8px;">
                <div class="review-stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                <div class="review-verified"><i class="fa-solid fa-circle-check"></i>Vérifié</div>
              </div>
            </div>
            <p class="review-text">Je suis fan ! Mon troisième achat sur cette boutique et encore une fois je suis
              satisfait. Les Sneakers Air Ultra sont mes préférées, je les ai déjà recommandées à 4 personnes dans mon
              entourage.</p>
            <div class="review-helpful">Utile ? <button class="helpful-btn">👍 Oui (5)</button><button
                class="helpful-btn">👎 Non (0)</button></div>
          </div>
        </div>
      </div>

      <!-- Livraison -->
      <div class="tab-panel" id="tab-livraison">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;">
          <div style="background:#13131e;border:1px solid rgba(200,184,255,0.08);border-radius:14px;padding:1.5rem;">
            <h4
              style="font-family:'Playfair Display',serif;font-size:1.05rem;margin-bottom:1rem;display:flex;align-items:center;gap:8px;">
              <i class="fa-solid fa-truck" style="color:#c8b8ff;"></i> Livraison</h4>
            <div style="display:flex;flex-direction:column;gap:0.8rem;font-size:0.85rem;color:#a09ab8;">
              <div style="display:flex;justify-content:space-between;"><span>Standard (3–5 jours)</span><span
                  style="color:#4ade80;font-weight:700;">Gratuite</span></div>
              <div style="display:flex;justify-content:space-between;"><span>Express (24h)</span><span
                  style="color:#f0eeff;font-weight:600;">2 000 fcfa</span></div>
              <div style="display:flex;justify-content:space-between;"><span>Retrait boutique</span><span
                  style="color:#4ade80;font-weight:700;">Gratuit</span></div>
            </div>
            <p style="font-size:0.78rem;color:#a09ab8;margin-top:1rem;line-height:1.6;">Toutes les commandes passées
              avant 15h sont expédiées le jour même. Vous recevrez un SMS de suivi dès l'expédition.</p>
          </div>
          <div style="background:#13131e;border:1px solid rgba(200,184,255,0.08);border-radius:14px;padding:1.5rem;">
            <h4
              style="font-family:'Playfair Display',serif;font-size:1.05rem;margin-bottom:1rem;display:flex;align-items:center;gap:8px;">
              <i class="fa-solid fa-rotate-left" style="color:#8eb8d8;"></i> Retours</h4>
            <div style="display:flex;flex-direction:column;gap:0.6rem;font-size:0.85rem;color:#a09ab8;">
              <div style="display:flex;align-items:center;gap:6px;"><i class="fa-solid fa-check"
                  style="color:#4ade80;"></i> 30 jours pour changer d'avis</div>
              <div style="display:flex;align-items:center;gap:6px;"><i class="fa-solid fa-check"
                  style="color:#4ade80;"></i> Article neuf, non porté</div>
              <div style="display:flex;align-items:center;gap:6px;"><i class="fa-solid fa-check"
                  style="color:#4ade80;"></i> Remboursement sous 5 jours</div>
              <div style="display:flex;align-items:center;gap:6px;"><i class="fa-solid fa-check"
                  style="color:#4ade80;"></i> Frais de retour offerts</div>
            </div>
            <a href="/contact.html"
              style="display:inline-flex;align-items:center;gap:6px;margin-top:1rem;font-size:0.8rem;color:#c8b8ff;font-weight:600;">Contacter
              le support <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>
      </div>

    </div><!-- /tabs -->

    <!-- RELATED PRODUCTS -->
    <div class="related-section">
      <div class="section-head">
        <h2>Vous aimerez aussi</h2>
        <a href="/#produits" class="see-all">Voir tout <i class="fa-solid fa-arrow-right"></i></a>
      </div>

      <div class="related-grid">
      <?php if (isset($article['categorie'])):   ?>
        <?php 
// Filtrer uniquement les produits qui NE SONT PAS de la même catégorie que l'article courant
        $otherProducts = array_filter($products, function($p) use ($article) {
            return $p['categorie'] !== $article['categorie'];
        });

          // Récupérer jusqu'à 5 produits aléatoires
          $randomKeys = array_rand($otherProducts, min(5, count($otherProducts)));
          if (!is_array($randomKeys)) {
              $randomKeys = [$randomKeys]; // Si seulement 1 élément
          }

          foreach ($randomKeys as $key):
              $product = $otherProducts[$key];
          ?>

        <div class="related-card">
            <div class="rc-img">
                <img 
                    src="/asset/medias/<?= htmlspecialchars($product["image"]) ?>" 
                    alt="<?= htmlspecialchars($product["libelle"]) ?>"
                >

                <a href="/article/<?= $product["id"] ?>">
                    <div class="img-overlay">
                        <button style="color:white" class="rc-overlay">
                            <i class="fa-solid fa-eye"></i> Voir détails
                        </button>
                    </div>
                </a>
            </div>

            <div class="rc-body">
                <div class="rc-name">
                    <?= htmlspecialchars($product["libelle"]) ?>
                </div>

                <div class="rc-stars">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>

                <div class="rc-price">
                    <?= number_format($product["prix"], 0, ',', ' ') ?> FCFA
                </div>
            </div>
        </div>

    <?php endforeach; ?>

        

      </div>
    </div>

  </div>


  <script>
    let qty = 1;
    let currentColor = 'Blanc';
    let currentSize = '42';
    let wishlistActive = false;

    function switchImg(thumb, url) {
      document.querySelectorAll('.thumb').forEach(t => t.classList.remove('active'));
      thumb.classList.add('active');
      const img = document.getElementById('mainImg');
      img.style.opacity = '0';
      img.style.transform = 'scale(0.96)';
      setTimeout(() => {
        img.src = url;
        img.style.transition = 'opacity 0.35s ease, transform 0.35s ease';
        img.style.opacity = '1';
        img.style.transform = 'scale(1)';
      }, 200);
    }

    function selectColor(el, name) {
      document.querySelectorAll('.color-swatch').forEach(s => s.classList.remove('active'));
      el.classList.add('active');
      currentColor = name;
      document.getElementById('color-label').textContent = name;
    }

    function selectSize(el, size) {
      document.querySelectorAll('.size-btn:not(.out)').forEach(s => s.classList.remove('active'));
      el.classList.add('active');
      currentSize = size;
      document.getElementById('size-label').textContent = size;
    }

    function changeQty(delta) {
      qty = Math.max(1, Math.min(14, qty + delta));
      document.getElementById('qty-val').textContent = qty;
      document.getElementById('qty-minus').disabled = qty <= 1;
    }

    function addToCart() {
      const btn = document.querySelector('.btn-cart');
      btn.innerHTML = '<i class="fa-solid fa-check"></i> Ajouté !';
      btn.style.background = 'linear-gradient(135deg, #4ade80, #22c55e)';
      showToast('Sneakers Air Ultra ajoutées au panier !');
      setTimeout(() => {
        btn.innerHTML = '<i class="fa-solid fa-bag-shopping"></i> Ajouter au panier';
        btn.style.background = '';
      }, 2000);
    }

    function toggleWishlist(btn) {
      wishlistActive = !wishlistActive;
      btn.classList.toggle('liked', wishlistActive);
      btn.innerHTML = wishlistActive ? '<i class="fa-solid fa-heart"></i>' : '<i class="fa-regular fa-heart"></i>';
      showToast(wishlistActive ? 'Ajouté à vos favoris ❤️' : 'Retiré des favoris');
    }

    function switchTab(tab, btn) {
      document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
      document.querySelectorAll('.tab-nav-btn').forEach(b => b.classList.remove('active'));
      document.getElementById('tab-' + tab).classList.add('active');
      btn.classList.add('active');
    }

    function showToast(msg) {
      document.getElementById('toast-msg').textContent = msg;
      const t = document.getElementById('toast');
      t.classList.add('show');
      setTimeout(() => t.classList.remove('show'), 2800);
    }

    // init
    document.getElementById('size-label').textContent = currentSize;
  </script>

    <?php else:?>
        <h3>article not found</h3>
    <?php endif?>  

    
    
</body>
</html>
