<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Paiement Sécurisé — Ecommerce</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
 
 <style>
     <?php  include_once __DIR__."/../../public/asset/css/auth/paiement.css"  ?>
 </style>
</head>

<body>

  <!-- SUCCESS OVERLAY -->
  <div class="success-overlay" id="suc">
    <div class="suc-icon">✅</div>
    <div class="suc-title">Paiement réussi !</div>
    <p class="suc-sub">Votre commande a bien été reçue. Vous recevrez une confirmation par SMS et email sous peu.</p>
    <div class="suc-ref"><span>Référence de commande</span><strong id="order-ref">—</strong></div>
    <div class="suc-btns">
      <a href="/"><button class="btn-suc1"><i class="fa-solid fa-bag-shopping"></i> Continuer les achats</button></a>
      <button class="btn-suc2"><i class="fa-solid fa-truck"></i> Suivre ma commande</button>
    </div>
  </div>

  <!-- HEADER -->
  <header>
    <div class="header-inner">
      <a href="/" class="logo"><i class="fa-solid fa-shop"></i><span>Ecommerce</span></a>
      <div class="secure-badge"><i class="fa-solid fa-lock"></i> Paiement 100% sécurisé</div>
      <a href="/panier" class="back-link"><i class="fa-solid fa-arrow-left"></i> Panier</a>
    </div>
  </header>

  <!-- STEPS -->
  <div class="steps-bar">
    <div class="steps-inner">
      <div class="step done">
        <div class="step-circle"><i class="fa-solid fa-check"></i></div>
        <div class="step-label">Panier</div>
      </div>
      <div class="step-line done"></div>
      <div class="step done">
        <div class="step-circle"><i class="fa-solid fa-check"></i></div>
        <div class="step-label">Livraison</div>
      </div>
      <div class="step-line done"></div>
      <div class="step active">
        <div class="step-circle"><i class="fa-solid fa-credit-card"></i></div>
        <div class="step-label">Paiement</div>
      </div>
      <div class="step-line"></div>
      <div class="step">
        <div class="step-circle">4</div>
        <div class="step-label">Confirmation</div>
      </div>
    </div>
  </div>

  <!-- MAIN -->
  <div class="page-wrap">

    <!-- LEFT -->
    <div class="left-panel">

      <!-- Section 1: Livraison -->
      <div class="section-card">
        <form action="/commande" method="post" id='information_paiement'>
          <div class="section-header">
            <div class="section-num">1</div>
            <div>
              <h2>Informations de livraison</h2>
              <p>Où souhaitez-vous recevoir votre commande ?</p>
            </div>
          </div>
          <div class="section-body">
           
            <div class="form-row cols-2">
              <div class="form-group">
                <label class="form-label">Prénom <span class="req">*</span></label>
                <div class="input-wrap"><i class="input-icon fa-solid fa-user"></i>
                <input type="text"  
                  name='prenom' class="form-input has-icon" 
                  value="<?= htmlspecialchars($_SESSION['old_info_paiement']['prenom'] ?? '') ?>"
                  placeholder="Kodjo" id="fname">
                   
                </div>
                <?php if (isset($_SESSION['paiement_erreurs']['prenom'])): ?>
                      <div class="error-message">
                        <?= $_SESSION['paiement_erreurs']['prenom'] ?>
                      </div>
                  <?php endif; ?>

              </div>
               
              
              <div class="form-group">
               
                <label class="form-label">Nom <span class="req">*  </span></label>
                <div class="input-wrap"><i class="input-icon fa-solid fa-user"></i>
                 
                <input type="text" name='nom'  class="form-input has-icon" 
                value="<?= htmlspecialchars($_SESSION['old_info_paiement']['nom'] ?? '') ?>"
                placeholder="Dossou" id="lname"></div>
                <?php if (isset($_SESSION['paiement_erreurs']['nom'])): ?>
                      <div class="error-message">
                        <?=   $_SESSION['paiement_erreurs']['nom'] ?>
                </div>
                  <?php endif; ?>
              </div>
              
            </div>

            
            <div class="form-row">
              <div class="form-group">
                
                <label class="form-label">Email <span class="req">*</span></label>
                <div class="input-wrap"><i class="input-icon fa-solid fa-envelope">
                </i><input type="email" name='email' class="form-input has-icon" 
                value="<?= htmlspecialchars($_SESSION['old_info_paiement']['email'] ?? '') ?>"
                placeholder="kodjo@email.com" id="email"></div>
                 <?php if (isset($_SESSION['paiement_erreurs']['email'])): ?>
                      <div class="error-message">
                        <?= $_SESSION['paiement_erreurs']['email'] ?>
                      </div>
                  <?php endif; ?>
              </div>
             
            </div>

            
            <div class="form-row cols-2">
              <div class="form-group">
                <label class="form-label">Téléphone <span class="req">*</span></label>
                <div class="input-wrap"><i class="input-icon fa-solid fa-phone"></i>
                <input type="text" name='tel' class="form-input has-icon" 
                  value="<?= htmlspecialchars($_SESSION['old_info_paiement']['tel'] ?? '') ?>"
                  placeholder="+228 90 00 00 00" id="phone"></div>
                  <?php if (isset($_SESSION['paiement_erreurs']['tel'])): ?>
                      <div class="error-message">
                        <?= $_SESSION['paiement_erreurs']['tel'] ?>
                      </div>
                  <?php endif; ?>
              </div>
              <div class="form-group">

                 

                 <label class="form-label">Ville <span class="req">*</span></label>
                 <select class="form-select  ?>" 
                      id="city" 
                      name="ville">

                    <option value="">Choisir une ville</option>
                    <option value="lome" <?= ($_SESSION['old_info_paiement']['ville'] ?? '') === 'lome' ? 'selected' : '' ?>>Lomé</option>
                    <option value="sokode" <?= ($_SESSION['old_info_paiement']['ville'] ?? '') === 'sokode' ? 'selected' : '' ?>>Sokodé</option>
                    <option value="kara" <?= ($_SESSION['old_info_paiement']['ville'] ?? '') === 'kara' ? 'selected' : '' ?>>Kara</option>
                    <option value="atakpame" <?= ($_SESSION['old_info_paiement']['ville'] ?? '') === 'atakpame' ? 'selected' : '' ?>>Atakpamé</option>
                    <option value="dapaong" <?= ($_SESSION['old_info_paiement']['ville'] ?? '') === 'dapaong' ? 'selected' : '' ?>>Dapaong</option>
                </select>
                    <?php if (isset($_SESSION['paiement_erreurs']['ville'])): ?>
                      <div class="error-message">
                      <?= $_SESSION['paiement_erreurs']['ville'] ?>
                      </div>
                   <?php endif; ?>
              </div>
               
            </div>
            <div class="form-row">
              <div class="form-group">
                 
                <label class="form-label">Adresse complète <span class="req">*</span></label>
                <div class="input-wrap"><i class="input-icon fa-solid fa-location-dot">

                </i><input type="text"  name='adresse' class="form-input has-icon" 
                value="<?= htmlspecialchars($_SESSION['old_info_paiement']['adresse'] ?? '') ?>"
                placeholder="Quartier, rue, numéro..." id="address"></div>
                 <?php if (isset($_SESSION['paiement_erreurs']['adresse'])): ?>
                      <div class="error-message">
                      <?= $_SESSION['paiement_erreurs']['adresse'] ?>
                      </div>
                   <?php endif; ?>
              </div>
            </div>
            <div class="form-group">
              <label class="form-label">Instructions (optionnel)</label>
              <textarea  name='instruction' class="form-input" placeholder="Ex: Appeler à l'arrivée, sonner 2 fois... "> </textarea>
            </div>
          </div>
       
      </div>
      


      <!-- Section 2: Paiement -->
      <div class="section-card">
        <div class="section-header">
          <div class="section-num">2</div>
          <div>
            <h2>Mode de paiement</h2>
            <p>Choisissez votre méthode préférée</p>
             <?php if (isset($_SESSION['paiement_erreurs']['mode'])): ?>
                      <div class="error-message">
                        <?= $_SESSION['paiement_erreurs']['mode'] ?>
                      </div>
                  <?php endif; ?>
          </div>
        </div>
        
        <div class="section-body">
                 
          <div class="pay-methods">
            <div class="method-btn selected" onclick="selectMethod('card',this)">
              <div class="method-check"></div>
              <div class="method-icon">💳</div>
              <div class="method-name">Carte bancaire</div>
            </div>
            <div class="method-btn" onclick="selectMethod('momo',this)">
              <div class="method-check"></div>
              <div class="method-icon">📱</div>
              <div class="method-name">Mobile Money</div>
            </div>
            <div class="method-btn" onclick="selectMethod('virement',this)">
              <div class="method-check"></div>
              <div class="method-icon">🏦</div>
              <div class="method-name">Virement</div>
            </div>
          </div>

          <!-- CARTE -->
          <div class="pay-panel active" id="panel-card">
            <div class="card-visual-wrap">
              <div class="card-visual" id="cv">
                <div class="card-chip"></div>
                <div class="card-number" id="cv-num">•••• •••• •••• ••••</div>
                <div class="card-bottom">
                  <div>
                    <div class="card-label">Titulaire</div>
                    <div class="card-val" id="cv-name">VOTRE NOM</div>
                  </div>
                  <div>
                    <div class="card-label">Expire</div>
                    <div class="card-val" id="cv-exp">MM/AA</div>
                  </div>
                  <div class="card-circles">
                    <div class="cc cc1"></div>
                    <div class="cc cc2"></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label class="form-label">Numéro de carte <span class="req">*</span></label>
                <div class="input-wrap">
                  <i class="input-icon fa-solid fa-credit-card"></i>
                  <input type="text" name='carte' class="form-input has-icon" placeholder="0000 0000 0000 0000" id="cnum"
                    maxlength="19" oninput="fmtCard(this)" style="padding-right:5.5rem">
                  <div class="card-suffix">
                    <div class="mini-badge visa" id="vi">VISA</div>
                    <div class="mini-badge mc" id="mc">MC</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label class="form-label">Nom sur la carte <span class="req">*</span></label>
                <div class="input-wrap"><i class="input-icon fa-solid fa-user"></i><input type="text"
                  name='nom_carte'  class="form-input has-icon" placeholder="KODJO DOSSOU" id="cname" oninput="cv_name(this)"
                    style="text-transform:uppercase"></div>
              </div>
            </div>
            <div class="form-row cols-2">
              <div class="form-group">
                <label class="form-label">Expiration <span class="req">*</span></label>
                <div class="input-wrap"><i class="input-icon fa-regular fa-calendar"></i><input type="text"
                  name='carte_expir'  class="form-input has-icon" placeholder="MM / AA" id="cexp" maxlength="7" oninput="fmtExp(this)">
                </div>
              </div>
              <div class="form-group">
                <label class="form-label">CVV <span class="req">*</span></label>
                <div class="input-wrap">
                  <i class="input-icon fa-solid fa-lock"></i>
                  <?php if (isset($_SESSION['paiement_erreurs']['mobile'])): ?>
                      <div class="error-message">
                        <?= $_SESSION['paiement_erreurs']['ccv'] ?>
                      </div>
                  <?php endif; ?>
                 
                  <input type="text" class="form-input has-icon" placeholder="•••" id="ccvc" maxlength="4"
                    name='ccv' oninput="this.value=this.value.replace(/\D/g,'')">
                  <div class="cvc-tip" title="3 chiffres au dos de votre carte"><i
                      class="fa-solid fa-circle-question"></i></div>
                </div>
              </div>
            </div>
            <label class="check-row">
              
              <input name='savegarder_carte' type="checkbox" id="save-card">
              <div class="check-box"></div>
              <span class="check-label">Sauvegarder cette carte pour mes prochains achats</span>
            </label>
          </div>

          <!-- MOBILE MONEY -->
          <div class="pay-panel" id="panel-momo">
            <p style="font-size:0.83rem;color:var(--text2);margin-bottom:1.1rem">Sélectionnez votre opérateur :</p>
            <div class="operator-grid">
              <div class="op-card selected" onclick="selOp(this)">
                <div class="op-logo tmoney">T</div>
                <div class="op-name">T-Money</div>
              </div>
              <div class="op-card" onclick="selOp(this)">
                <div class="op-logo flooz">F</div>
                <div class="op-name">Flooz</div>
              </div>
              <div class="op-card" onclick="selOp(this)">
                <div class="op-logo wave">W</div>
                <div class="op-name">Wave</div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label class="form-label">Numéro Mobile Money <span class="req">*</span></label>
                <div class="input-wrap"><i class="input-icon fa-solid fa-mobile-screen"></i>
               
                  <input type="tel"
                      name="mobile"
                      class="form-input has-icon "
                      placeholder="+228 90 00 00 00"
                      id="momo-num"
                      value="<?= htmlspecialchars($_SESSION['old_info_paiement']['mobile'] ?? '') ?>">

                </div>
                 <?php if (isset($_SESSION['paiement_erreurs']['mobile'])): ?>
                      <div class="error-message">
                        <?= $_SESSION['paiement_erreurs']['mobile'] ?>
                      </div>
                  <?php endif; ?>
              </div>
            </div>
            <div class="info-box"><i class="fa-solid fa-circle-info"
                style="color:var(--accent2);margin-top:2px;flex-shrink:0"></i><span>Après avoir cliqué sur "Payer", vous
                recevrez une notification de confirmation sur votre téléphone. Validez avec votre code secret Mobile
                Money.</span></div>
          </div>

          <!-- VIREMENT -->
          <div class="pay-panel" id="panel-virement">
            <p style="font-size:0.83rem;color:var(--text2);margin-bottom:1.1rem">Effectuez un virement vers le compte
              suivant :</p>
            <div class="bank-box">
              <div class="bank-row"><span class="bk">Banque</span><span class="bv">ECOBANK Togo</span><button
                  class="copy-btn" onclick="copyT('ECOBANK Togo')">Copier</button></div>
              <div class="bank-row"><span class="bk">Titulaire</span><span class="bv">ECOMMERCE SARL</span><button
                  class="copy-btn" onclick="copyT('ECOMMERCE SARL')">Copier</button></div>
              <div class="bank-row"><span class="bk">IBAN</span><span class="bv">TG53 ECOB 0001 0123 4567</span><button
                  class="copy-btn" onclick="copyT('TG53ECOB00010123456789')">Copier</button></div>
              <div class="bank-row"><span class="bk">SWIFT</span><span class="bv">ECOCBFTG</span><button
                  class="copy-btn" onclick="copyT('ECOCBFTG')">Copier</button></div>
              <div class="bank-row"><span class="bk">Montant</span><span class="bv" style="color:var(--accent)">65 250
                  FCFA</span><button class="copy-btn" onclick="copyT('65250')">Copier</button></div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label class="form-label">Référence du virement</label>
                <div class="input-wrap"><i class="input-icon fa-solid fa-hashtag"></i>
                  <input type="text"
                      name="auteur_virement"
                      class="form-input has-icon "
                      placeholder="Votre nom + date"
                      id="vir-ref"
                      value="<?= htmlspecialchars($_SESSION['old_info_paiement']['auteur_virement'] ?? '') ?>">
                </div>
                  <?php if (isset($_SESSION['paiement_erreurs']['auteur_virement'])): ?>
                      <div class="error-message">
                        <?= $_SESSION['paiement_erreurs']['auteur_virement'] ?>
                      </div>
                  <?php endif; ?>
              </div>
            </div>
            <div class="warn-box"><i class="fa-solid fa-triangle-exclamation"
                style="margin-top:2px;flex-shrink:0"></i><span>La commande sera traitée après réception du virement (1 à
                3 jours ouvrés). Mentionnez votre nom complet en référence.</span></div>
          </div>

        </div>
      </div>
    </form>
      <!-- Section 3: Confirmation -->
      <div class="section-card">
        <div class="section-header">
          <div class="section-num">3</div>
          <div>
            <h2>Confirmation</h2>
            <p>Vérifiez et validez votre commande</p>
          </div>
        </div>
        <div class="section-body">
          <label class="check-row" onclick="toggle('terms')">
            <input type="checkbox" id="terms">
            <div class="check-box"></div>
            <span class="check-label">J'accepte les <a href="#">conditions générales de vente</a> et la <a
                href="#">politique de confidentialité</a>. <span class="req">*</span></span>
          </label>
          <label class="check-row" onclick="toggle('news')">
            <input type="checkbox" id="news">
            <div class="check-box"></div>
            <span class="check-label">Je souhaite recevoir les offres et nouveautés par email (optionnel).</span>
          </label>
          
        </div>
        
      </div>

    </div>

    <!-- RIGHT -->
    <div class="right-panel">
      <div class="summary-card">
        <div class="sum-head">Votre commande <a href="/panier" class="edit-link">Modifier</a></div>
        <?php $sous_total=0; ?>
        <?php foreach ($paniers as $panier): ?>
          <?php $sous_total+= $panier["qte"]*$panier["prix"]     ?>
          <div class="order-item">
            <div class="oi-img">
              <div class="item-img"> <img src="/asset/medias/<?= $panier["image"]?>" alt=<?=$panier["libelle"]?>> </div>
              
            <div class="oi-badge"><?=$panier["qte"]?></div>
            </div>
            <div class="oi-info">
              <div class="oi-name"><?=$panier["libelle"]?></div>
              <div class="oi-var">Taille 42 • Blanc</div>
            </div>
            <div class="oi-price"><?=$panier["prix"]?></div>
          </div>
        <?php endforeach ?>



        <hr class="sd">
        <div class="sum-line"><span class="sl">Sous-total</span><span class="sv"><?=$sous_total?> fcfa</span></div>
        <div class="sum-line"><span class="sl">Livraison</span> Ville sokodé<span class="sv"
            style="color:var(--green)">Gratuite</span></div>
        <div class="sum-line"><span class="sl">Réduction (LIVGRAT)</span><span class="disc">− <?=$reduction=(($sous_total*10)/100) ?> fcfa</span></div>
        <div class="sum-line"><span class="sl">Taxes incluses</span><span class="sv">0 fcfa</span></div>
        <hr class="sd">

        <div class="sum-total">
          <span class="tl">Total TTC</span>
          <span class="tv"><?= $total=($sous_total-$reduction)?> fcfa</span>
        </div>

        <button type="submit" form="information_paiement" class="pay-btn" id="pay-btn" onclick="handlePay()" >
          <span class="bt"><i class="fa-solid fa-lock"></i> Payer — <?=$total?> fcfa</span>
          <span class="bl">
            <div class="sp"></div> Traitement en cours...
          </span>
        </button>

        <p class="terms">Paiement 100% sécurisé via SSL 256-bit.<br>Vos données ne sont jamais stockées.</p>

        <div class="sec-row">
          <div class="sec-it"><i class="fa-solid fa-shield-halved"></i><span>SSL<br>256-bit</span></div>
          <div class="sec-it"><i class="fa-solid fa-rotate-left"></i><span>Retour<br>30j</span></div>
          <div class="sec-it"><i class="fa-solid fa-truck"></i><span>Livraison<br>48h</span></div>
          <div class="sec-it"><i class="fa-solid fa-headset"></i><span>Support<br>24/7</span></div>
        </div>
      </div>
    </div>

  </div>

  <div class="toast" id="toast"><i class="fa-solid fa-circle-info" style="color:var(--accent)"></i><span
      id="tmsg"></span></div>

  <script>
    // Method switch
    function selectMethod(m, el) {
      document.querySelectorAll('.method-btn').forEach(b => b.classList.remove('selected'));
      el.classList.add('selected');
      ['card', 'momo', 'virement'].forEach(p => {
        const panel = document.getElementById('panel-' + p);
        panel.classList.remove('active');
        panel.style.display = 'none';
      });
      const active = document.getElementById('panel-' + m);
      active.style.display = 'block';
      requestAnimationFrame(() => active.classList.add('active'));
    }
    // Init
    ['momo', 'virement'].forEach(p => document.getElementById('panel-' + p).style.display = 'none');

    // Operator
    function selOp(el) { document.querySelectorAll('.op-card').forEach(c => c.classList.remove('selected')); el.classList.add('selected'); }

    // Card format
    function fmtCard(input) {
      let v = input.value.replace(/\D/g, '').slice(0, 16);
      v = v.replace(/(.{4})/g, '$1 ').trim();
      input.value = v;
      const parts = v.split(' ');
      let disp = '';
      for (let i = 0; i < 4; i++) disp += (parts[i] || '••••').padEnd(4, '•') + (i < 3 ? ' ' : '');
      document.getElementById('cv-num').textContent = disp;
      const r = v.replace(/\s/g, '');
      document.getElementById('vi').style.opacity = r.startsWith('4') ? 1 : 0.3;
      document.getElementById('mc').style.opacity = (r.startsWith('5') || r.startsWith('2')) ? 1 : 0.3;
    }

    function fmtExp(input) {
      let v = input.value.replace(/\D/g, '').slice(0, 4);
      if (v.length >= 3) v = v.slice(0, 2) + ' / ' + v.slice(2);
      input.value = v;
      const r = v.replace(/\s\/\s/g, '');
      document.getElementById('cv-exp').textContent = (r.slice(0, 2) || 'MM') + '/' + (r.slice(2, 4) || 'AA');
    }

    function cv_name(input) {
      document.getElementById('cv-name').textContent = input.value.toUpperCase() || 'VOTRE NOM';
    }

    // CVC flip
    document.addEventListener('DOMContentLoaded', () => {
      const cvc = document.getElementById('ccvc');
      const cvEl = document.getElementById('cv');
      if (cvc) {
        cvc.addEventListener('focus', () => cvEl.style.transform = 'rotateY(180deg)');
        cvc.addEventListener('blur', () => cvEl.style.transform = 'rotateY(0deg)');
      }
    });

    // Checkbox toggle
    function toggle(id) {
      const input = document.getElementById(id);
      if (input) input.checked = !input.checked;
    }
    document.querySelectorAll('.check-row').forEach(row => {
      row.addEventListener('click', e => {
        if (e.target.tagName === 'A') return;
        const input = row.querySelector('input');
        if (input) input.checked = !input.checked;
      });
    });

    // Copy
    function copyT(v) {
      navigator.clipboard.writeText(v).then(() => showToast('Copié : ' + v));
    }

    // Validate
    function validate() {
      const fields = [
        { id: 'fname', label: 'Prénom' },
        { id: 'lname', label: 'Nom' },
        { id: 'email', label: 'Email' },
        { id: 'phone', label: 'Téléphone' },
        { id: 'address', label: 'Adresse' },
      ];
      for (const f of fields) {
        const el = document.getElementById(f.id);
        if (!el || !el.value.trim()) {
          if (el) { el.classList.add('error'); el.focus(); el.addEventListener('input', () => el.classList.remove('error'), { once: true }) }
          showToast('⚠️ Champ requis : ' + f.label); return false;
        }
      }
      const city = document.getElementById('city');
      if (!city.value) { showToast('⚠️ Veuillez choisir une ville'); return false; }

      const isCard = document.getElementById('panel-card').classList.contains('active');
      const isMomo = document.getElementById('panel-momo').classList.contains('active');

      if (isCard) {
        const cn = document.getElementById('cnum').value.replace(/\s/g, '');
        if (cn.length < 16) { showToast('⚠️ Numéro de carte invalide'); return false; }
        const exp = document.getElementById('cexp').value;
        if (!exp || exp.length < 7) { showToast('⚠️ Date d\'expiration invalide'); return false; }
        const cvc = document.getElementById('ccvc').value;
        if (cvc.length < 3) { showToast('⚠️ CVV invalide'); return false; }
        const name = document.getElementById('cname').value;
        if (!name.trim()) { showToast('⚠️ Nom sur la carte requis'); return false; }
      }
      if (isMomo) {
        const mn = document.getElementById('momo-num').value;
        if (!mn.trim()) { showToast('⚠️ Numéro Mobile Money requis'); return false; }
      }
      if (!document.getElementById('terms').checked) { showToast('⚠️ Veuillez accepter les conditions générales'); return false; }
      return true;
    }

    // Pay
    function handlePay() {
      if (!validate()) return;
      const btn = document.getElementById('pay-btn');
      btn.classList.add('loading');
      setTimeout(() => {
        btn.classList.remove('loading');
         showSuccess();
      }, 2500);
    
      

    }


          //afficher message mercii
    function showSuccess() {
      const ref = 'CMD-2026-' + Math.floor(Math.random() * 9000 + 1000);
      document.getElementById('order-ref').textContent = ref;
      document.getElementById('suc').classList.add('show');
      launchConfetti();
    }

    function launchConfetti() {
      const colors = ['#c8b8ff', '#8eb8d8', '#f4a261', '#4ade80', '#f87171', '#ffffff'];
      for (let i = 0; i < 55; i++) {
        const p = document.createElement('div');
        p.className = 'confetti-p';
        p.style.cssText = `left:${Math.random() * 100}vw;background:${colors[Math.floor(Math.random() * colors.length)]};animation-duration:${1.5 + Math.random() * 2}s;animation-delay:${Math.random() * 0.8}s;width:${Math.random() > 0.5 ? 8 : 5}px;height:${Math.random() > 0.5 ? 13 : 8}px;`;
        document.body.appendChild(p);
        setTimeout(() => p.remove(), 4000);
      }
    }

    // Toast
    function showToast(msg) {
      document.getElementById('tmsg').textContent = msg;
      const t = document.getElementById('toast');
      t.classList.add('show');
      clearTimeout(t._t);
      t._t = setTimeout(() => t.classList.remove('show'), 3200);
    }
  </script>
</body>

</html>