console.log("abdouldddddddddaye");
// ===== Mobile nav =====
function toggleMobileNav() {
  document.getElementById('mobile-nav').classList.toggle('open');
}

window.onload = function() {
    const toast = document.getElementById("toast");
    if (toast) {
        toast.classList.add("show"); // affiche la notification
        setTimeout(() => {
            toast.style.opacity = "0";
            toast.style.transform = "translateY(-20px)";
            setTimeout(() => toast.remove(), 1000);
        }, 2000); // disparaît après 3 secondes
    }
};

// alerte message
// setTimeout(function() {
//     var notif = document.getElementById("notification");
//     if (notif) {
//         notif.style.display = "none";
//     }
// }, 3000); // disparaît après 3 secondes

// setTimeout(function() {
//     const toast = document.getElementById("toast");
//     if (toast) {
//         toast.style.transition = "all 0.4s ease";
//         toast.style.opacity = "0";
//         toast.style.transform = "translateX(-50%) translateY(-20px)";
//         setTimeout(() => toast.remove(), 400);
//     }
// }, 3500);








/*
<?php foreach ($products as $num => $product):  ?>
              <div class="top-product">
                <div class="tp-rank gold"> <?=$num ?> </div>
                <img class="tp-img" src="/asset/medias/<?=$product["image"]?>" alt=<?=$product["libelle"]?> >

                <div class="tp-info">
                  <div class="tp-name">Sneakers Air Ultra</div>
                  <div class="tp-cat">Chaussures</div>
                </div>

                <div class="tp-right">
                  <div class="tp-sales">87 ventes</div>
                  <div class="tp-revenue">3.9M fcfa</div>
                </div>
              </div>
             
              <?php if ($num==4)  break  ?>
            <?php endforeach?>

*/


/*
// ===== Cart state =====
let cart = [];

function openCart() {
  document.getElementById('panier-sidebar').classList.add('open');
  document.getElementById('cart-overlay').classList.add('open');
  document.body.style.overflow = 'hidden';
}

function closeCart() {
  document.getElementById('panier-sidebar').classList.remove('open');
  document.getElementById('cart-overlay').classList.remove('open');
  document.body.style.overflow = '';
}

document.getElementById('open-cart').addEventListener('click', e => { e.preventDefault(); openCart(); });
const mobileCartBtn = document.getElementById('open-cart-mobile');
if (mobileCartBtn) mobileCartBtn.addEventListener('click', e => { e.preventDefault(); openCart(); });

function addToCart(name, price, btn) {
  const existing = cart.find(i => i.name === name);
  if (existing) {
    existing.qty++;
  } else {
    cart.push({ name, price, qty: 1 });
  }
  updateCartUI();
  showToast(`"${name}" ajouté au panier !`);
  // Animate btn
  btn.textContent = '✓ Ajouté !';
  btn.style.background = 'linear-gradient(135deg, #4ade80, #22c55e)';
  setTimeout(() => {
    btn.textContent = '+ Ajouter au panier';
    btn.style.background = '';
  }, 1500);
}

function updateCartUI() {
  const total = cart.reduce((s, i) => s + parseInt(i.price.replace(/\s/g,'')) * i.qty, 0);
  const count = cart.reduce((s, i) => s + i.qty, 0);
  
  document.getElementById('cart-count').textContent = count;
  document.querySelectorAll('#open-cart-mobile').forEach(el => {
    el.textContent = `🛒 Panier (${count})`;
  });
  document.getElementById('cart-total').textContent = total.toLocaleString('fr-FR') + ' fcfa';
  
  const empty = document.getElementById('cart-empty');
  const footer = document.getElementById('cart-footer');
  
  if (cart.length === 0) {
    empty.style.display = 'flex';
    footer.style.display = 'none';
    document.getElementById('cart-items').innerHTML = '';
    document.getElementById('cart-items').appendChild(empty);
    return;
  }
  
  empty.style.display = 'none';
  footer.style.display = 'block';
  
  const itemsContainer = document.getElementById('cart-items');
  const existingItems = itemsContainer.querySelectorAll('.cart-item');
  existingItems.forEach(el => el.remove());
  
  cart.forEach((item, idx) => {
    const el = document.createElement('div');
    el.className = 'cart-item';
    el.innerHTML = `
      <div class="cart-item-img" style="background:var(--card2);display:flex;align-items:center;justify-content:center;font-size:2rem;">🛍</div>
      <div class="cart-item-info">
        <div class="cart-item-name">${item.name}</div>
        <div class="cart-item-price">${item.price} fcfa</div>
        <div class="cart-item-qty">
          <div class="qty-btn" onclick="changeQty(${idx},-1)"><i class="fa-solid fa-minus" style="font-size:0.65rem;"></i></div>
          <span class="qty-num">${item.qty}</span>
          <div class="qty-btn" onclick="changeQty(${idx},1)"><i class="fa-solid fa-plus" style="font-size:0.65rem;"></i></div>
        </div>
      </div>
      <div class="cart-item-del" onclick="removeItem(${idx})"><i class="fa-solid fa-trash"></i></div>
    `;
    itemsContainer.appendChild(el);
  });
}

function changeQty(idx, delta) {
  cart[idx].qty += delta;
  if (cart[idx].qty <= 0) cart.splice(idx, 1);
  updateCartUI();
}

function removeItem(idx) {
  cart.splice(idx, 1);
  updateCartUI();
}

// ===== Toast =====
function showToast(msg) {
  const toast = document.getElementById('toast');
  document.getElementById('toast-msg').textContent = msg;
  toast.classList.add('show');
  setTimeout(() => toast.classList.remove('show'), 2800);
}

// ===== Filter pills =====
function filterPill(el, cat) {
  document.querySelectorAll('.pill').forEach(p => p.classList.remove('active'));
  el.classList.add('active');
  document.querySelectorAll('.produit').forEach(p => {
    if (cat === 'all' || p.dataset.cat === cat) {
      p.style.display = '';
    } else {
      p.style.display = 'none';
    }
  });
}

// ===== Header scroll effect =====
window.addEventListener('scroll', () => {
  const header = document.querySelector('header');
  if (window.scrollY > 50) {
    header.style.boxShadow = '0 4px 30px rgba(0,0,0,0.4)';
  } else {
    header.style.boxShadow = 'none';
  }
});

*/