<?php
$sous_total=0;
if ( isset($_SESSION['panier'])   ) {
  $paniers=$_SESSION['panier'];

  foreach ($paniers as $panier) {
    $sous_total+=$panier['qte']*$panier['prix']; 
  }
           
  }

?>



<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mon Panier — Ecommerce</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
         <?php  include_once __DIR__."/../../public/asset/css/auth/panier.css"  ?>
    </style>
</head>

<body>

  <!-- ===== HEADER ===== -->
  <header>
    <div class="header_row">
      <a href="/" class="logo">
        <i class="fa-solid fa-shop"></i>
        <span>Ecommerce</span>
      </a>
      <a href="/#categorie" class="back-btn">
        <i class="fa-solid fa-arrow-left"></i> Continuer mes achats
      </a>
    </div>
  </header>

  <!-- ===== CONTENT ===== -->
  <div class="page-wrap">

    <!-- Steps -->
    <div class="checkout-steps">
      <div class="step active">
        <div class="step-circle"><i class="fa-solid fa-cart-shopping"></i></div>
        <div class="step-label">Panier</div>
      </div>
      <div class="step-line"></div>
      <div class="step">
        <div class="step-circle">2</div>
        <div class="step-label">Livraison</div>
      </div>
      <div class="step-line"></div>
      <div class="step">
        <div class="step-circle">3</div>
        <div class="step-label">Paiement</div>
      </div>
      <div class="step-line"></div>
      <div class="step">
        <div class="step-circle">4</div>
        <div class="step-label">Confirmation</div>
      </div>
    </div>

    <div class="page-title">Mon Panier</div>
    <div class="page-subtitle" id="cart-subtitle"><?=$nbr_produit?> articles dans votre panier</div>

    <!-- Main layout -->
    <div class="cart-layout" id="cart-has-items">
      <!-- LEFT: Cart Items -->
      <div class="cart-left">
        <div class="cart-header-bar">
          <span id="items-count"><?=$nbr_produit?> articles</span>
          <form action="" method="post">
            <button name='vider' value='panier' class="clear-btn" ><i class="fa-solid fa-trash"></i> Vider le panier</button>
          </form>
          
         
        </div>

      <!-- Items   onclick="clearAll()" -->
      
      <div id="cart-items-list">
        <?php //print_r($mon_panier) ?>
        <?php  if (count($mon_panier)!==0)  : ?>
          <?php  foreach ($mon_panier as  $produit)  : ?>
            <span id='<?= $produit["libelle"]?>' ></span>
            <div class='cart-item-card' >
            <div class="item-img"> <img src="/asset/medias/<?= $produit["image"]?>" alt=<?= $produit["libelle"]?>></div>
            <div class="item-body">
              <div class="item-category"><?= $produit["categorie"]?></div>
              <div class="item-name"><?= $produit["libelle"]?></div>
              <!-- taille et couleur (update apres plus tard)  -->
              <div class="item-variant">
                  <span class="variant-chip">Taille 45</span>
                  <span class="variant-chip">Rouge</span>
              </div>
            
              <div class="item-controls" >
                <div class="qty-control">
                  <a href="/panier/<?= $produit["id"]?>/moin#cart-items-list">
                    <button class="qty-btn" title="dimunier" >
                    <!-- si en desou diseable  (dimunier) -->
                      <i class="fa-solid fa-minus"></i>
                    </button>
                  </a>
                  
                  <span class="qty-num"><?= $produit["qte"]?></span>

                  <a href="/panier/<?= $produit["id"]?>/plus#cart-items-list">
                    <button class="qty-btn" title="augmenter">
                    <!--  (augmenter) -->
                    <i class="fa-solid fa-plus"></i> 
                  </button>
                  </a>
                  
                </div>
              </div>  
            </div>

            <div class="item-price"><?= $produit["prix"]?> fcfa</div>

            <form action="/panier/<?= $produit["id"]?>/delete#cart-items-list" method="post">
              <button class="item-del" title="Supprimer">
                <i class="fa-solid fa-trash"></i>
              </button>
            </form>
            
            </div>
          <?php  endforeach ?>

        <?php  else : ?>
          <div class='cart-item-card'>
              <div class="item-img"> Vide</div>
              <div class="item-body">
              <div class="item-category">Votre panier est vide </div>
                <div class="item-controls"> </div>
              </div>
          </div>
         <?php  endif ?>

      </div>
      <!--  -->

     
    
 

        <!-- Promo code -->
        <div class="promo-bar">
          <i class="fa-solid fa-tag promo-icon"></i>
          <div style="flex:1;min-width:0;">
            <div class="promo-label">Code promo</div>
            <div class="promo-sub">Entrez votre code de réduction</div>
          </div>

          <div class="promo-input-wrap">
            <form action="" method="post">
              <input type="text" class="promo-input" id="promo-input" placeholder="Ex: LIVGRAT" maxlength="12">
              <button class="promo-apply" onclick="applyPromo()">Appliquer</button>
            </form>
          </div>

          <div class="promo-success" id="promo-success">
            <i class="fa-solid fa-circle-check"></i> -10% appliqué !
          </div>
      </div>

      </div>

      <!-- RIGHT: Summary -->
      <div class="order-summary">
        <div class="summary-title">Récapitulatif de la commande</div>

        <div class="summary-row">
          <span class="label">Sous-total</span>
          <span class="value" id="subtotal"> <?=$sous_total?> fcfa</span>
        </div>
        <div class="summary-row">
          <span class="label">Livraison</span>
          <span class="value" style="color:var(--green);">Gratuite</span>
        </div>
        <div class="summary-row" id="discount-row">
          <span class="label">Réduction (10%)</span>
          <span class="discount" id="discount-val"> <?=$reduction=($sous_total*10/100)?> fcfa</span>
        </div>
        <hr class="summary-divider">
        <div class="summary-total">
          <span class="total-label">Total à payer</span>
          <span class="total-value" id="total-val"><?=$sous_total-$reduction ?>fcfa</span>
        </div>

         <a href="/paiement">
        <button class="btn-order">
          <i class="fa-solid fa-lock"></i> Commander maintenant
        </button>
        </a>
        <a href="/#categorie">
          <button class="btn-continue">
            <i class="fa-solid fa-arrow-left"></i> Continuer mes achats
          </button>
        </a>

        <div class="security-badges">
          <div class="sec-badge"><i class="fa-solid fa-shield-halved"></i><span>Paiement<br>sécurisé</span></div>
          <div class="sec-badge"><i class="fa-solid fa-truck"></i><span>Livraison<br>gratuite</span></div>
          <div class="sec-badge"><i class="fa-solid fa-rotate-left"></i><span>Retour<br>facile</span></div>
        </div>

        <div class="payment-methods">
          <div class="pay-chip">💳 Carte</div>
          <div class="pay-chip">📱 Mobile Money</div>
          <div class="pay-chip">🏦 Virement</div>
        </div>
      </div>
    </div>

    <!-- Empty State (hidden by default) -->
    <div class="cart-empty-state" id="cart-empty-state" style="display:none;">
      <div class="empty-icon"><i class="fa-solid fa-bag-shopping"></i></div>
      <h3>Votre panier est vide</h3>
      <p>Vous n'avez pas encore ajouté d'articles à votre panier.</p>
      <a href="/">
        <button class="btn-shop">
          <i class="fa-solid fa-bag-shopping"></i> Découvrir nos produits
        </button>
      </a>
    </div>

    <!-- Suggestions -->
    <div class="suggestions" id="suggestions">
      <h3>Vous pourriez aussi aimer</h3>
      <div class="suggestions-grid">
        <div class="sug-card">
          <div class="sug-img"><img src="https://images.unsplash.com/photo-1588850561407-ed78c282e89b?w=300&q=80"
              alt=""></div>
          <div class="sug-body">
            <div class="sug-name">Casquette Urban Camo</div>
            <div class="sug-price">5 500 fcfa</div>
            <button class="sug-add" onclick="suggestAdd('Casquette Urban Camo','5 500')">+ Ajouter</button>
          </div>
        </div>
        <div class="sug-card">
          <div class="sug-img"><img src="https://images.unsplash.com/photo-1620012253295-c15cc3e65df4?w=300&q=80"
              alt=""></div>
          <div class="sug-body">
            <div class="sug-name">Polo Col Rond Beige</div>
            <div class="sug-price">8 900 fcfa</div>
            <button class="sug-add" onclick="suggestAdd('Polo Col Rond Beige','8 900')">+ Ajouter</button>
          </div>
        </div>
        <div class="sug-card">
          <div class="sug-img"><img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=300&q=80" alt="">
          </div>
          <div class="sug-body">
            <div class="sug-name">Nike Air Force 1 Blanc</div>
            <div class="sug-price">52 000 fcfa</div>
            <button class="sug-add" onclick="suggestAdd('Nike Air Force 1 Blanc','52 000')">+ Ajouter</button>
          </div>
        </div>
        <div class="sug-card">
          <div class="sug-img"><img src="https://images.unsplash.com/photo-1503341504253-dff4815485f1?w=300&q=80"
              alt=""></div>
          <div class="sug-body">
            <div class="sug-name">Cardigan Oversize Noir</div>
            <div class="sug-price">18 500 fcfa</div>
            <button class="sug-add" onclick="suggestAdd('Cardigan Oversize Noir','18 500')">+ Ajouter</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Toast -->
  <div class="toast" id="toast"><i class="fa-solid fa-circle-check" style="color:var(--green)"></i> <span
      id="toast-msg"></span></div>

  <!-- <script>
    // ===== State =====
    let cart = [
      { id: 1, name: 'Sneakers Air Ultra', category: 'Chaussures', price: 45000, qty: 1, emoji: '👟', variant: 'Taille 42 • Blanc' },
      { id: 2, name: 'Chemise Premium Blanche', category: 'Habillé', price: 12000, qty: 2, emoji: '👔', variant: 'Taille M • Blanc' },
      { id: 3, name: 'Casquette Tendance Noire', category: 'Casquettes', price: 3500, qty: 1, emoji: '🧢', variant: 'Taille unique • Noir' }
    ];

    let promoApplied = false;

    // ===== Render =====
    function render() {
      const list = document.getElementById('cart-items-list');
      const hasItems = document.getElementById('cart-has-items');
      const emptyState = document.getElementById('cart-empty-state');

      if (cart.length === 0) {
        hasItems.style.display = 'none';
        emptyState.style.display = 'flex';
        document.getElementById('cart-subtitle').textContent = 'Votre panier est vide';
        document.getElementById('suggestions').style.display = 'block';
        return;
      }

      hasItems.style.display = 'grid';
      emptyState.style.display = 'none';

      const total = cart.reduce((s, i) => s + i.price * i.qty, 0);
      const count = cart.reduce((s, i) => s + i.qty, 0);

      document.getElementById('cart-subtitle').textContent = `${count} article${count > 1 ? 's' : ''} dans votre panier`;
      document.getElementById('items-count').textContent = `${count} article${count > 1 ? 's' : ''}`;
      document.getElementById('subtotal').textContent = total.toLocaleString('fr-FR') + ' fcfa';

      const discount = promoApplied ? Math.round(total * 0.1) : 0;
      const finalTotal = total - discount;

      document.getElementById('discount-row').style.display = promoApplied ? 'flex' : 'none';
      document.getElementById('discount-val').textContent = '-' + discount.toLocaleString('fr-FR') + ' fcfa';
      document.getElementById('total-val').textContent = finalTotal.toLocaleString('fr-FR') + ' fcfa';

      list.innerHTML = '';
      cart.forEach((item, idx) => {
        const card = document.createElement('div');
        card.className = 'cart-item-card';
        card.innerHTML = `
      <div class="item-img">${item.emoji}</div>
      <div class="item-body">
        <div class="item-category">${item.category}</div>
        <div class="item-name">${item.name}</div>
        <div class="item-variant">
          ${item.variant.split(' • ').map(v => `<span class="variant-chip">${v}</span>`).join('')}
        </div>
        <div class="item-controls">
          <div class="qty-control">
            <button class="qty-btn" onclick="changeQty(${idx},-1)" ${item.qty <= 1 ? 'disabled' : ''}>
              <i class="fa-solid fa-minus"></i>
            </button>
            <span class="qty-num">${item.qty}</span>
            <button class="qty-btn" onclick="changeQty(${idx},1)">
              <i class="fa-solid fa-plus"></i>
            </button>
          </div>
          <div class="item-price">${(item.price * item.qty).toLocaleString('fr-FR')} fcfa</div>
          <button class="item-del" onclick="removeItem(${idx})" title="Supprimer">
            <i class="fa-solid fa-trash"></i>
          </button>
        </div>
      </div>
    `;
        list.appendChild(card);
      });
    }

    function changeQty(idx, delta) {
      cart[idx].qty += delta;
      if (cart[idx].qty <= 0) { removeItem(idx); return; }
      render();
    }

    function removeItem(idx) {
      const name = cart[idx].name;
      cart.splice(idx, 1);
      render();
      showToast(`"${name}" retiré du panier`);
    }

    function clearAll() {
      if (confirm('Vider tout le panier ?')) {
        cart = [];
        render();
        showToast('Panier vidé');
      }
    }

    function applyPromo() {
      const val = document.getElementById('promo-input').value.toUpperCase().trim();
      if (val === 'LIVGRAT' || val === 'PROMO10') {
        promoApplied = true;
        document.getElementById('promo-success').style.display = 'flex';
        document.getElementById('promo-input').disabled = true;
        showToast('Code promo appliqué ! -10% 🎉');
        render();
      } else {
        document.getElementById('promo-input').style.borderColor = '#f87171';
        document.getElementById('promo-input').style.boxShadow = '0 0 0 3px rgba(248,113,113,0.1)';
        setTimeout(() => {
          document.getElementById('promo-input').style.borderColor = '';
          document.getElementById('promo-input').style.boxShadow = '';
        }, 1500);
        showToast('Code promo invalide');
      }
    }

    function suggestAdd(name, price) {
      const existing = cart.find(i => i.name === name);
      if (existing) { existing.qty++; }
      else {
        cart.push({ id: Date.now(), name, category: 'Suggestion', price: parseInt(price.replace(/\s/g, '')), qty: 1, emoji: '🛍', variant: 'Taille unique' });
      }
      render();
      showToast(`"${name}" ajouté au panier !`);
    }

    function showToast(msg) {
      document.getElementById('toast-msg').textContent = msg;
      const toast = document.getElementById('toast');
      toast.classList.add('show');
      setTimeout(() => toast.classList.remove('show'), 2800);
    }

    // Initial render
    render();
  </script> -->
</body>

</html>