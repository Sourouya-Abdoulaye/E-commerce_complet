<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contactez-nous — Ecommerce</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
     <?php  include_once __DIR__."/../../public/asset/css/auth/propo.css"  ?>
  </style>
   
</head>

<body>

  <div class="ambient"></div>

  <!-- HEADER -->
  <header>
    <div class="hrow">
      <a href="/" class="logo"><i class="fa-solid fa-shop"></i><span>Ecommerce</span></a>
      <nav class="hnav">
        <a href="/">Accueil</a>
        <a href="/#categorie">Catégorie</a>
        <a href="#">À propos</a>
        <a href="contact.html" class="active">Contact</a>
      </nav>
      <div class="hright">
        <a href="panier.html" class="cart-pill"><i class="fa-solid fa-cart-arrow-down"></i> Panier <span
            style="background:#f4a261;color:#07070d;font-size:0.63rem;font-weight:700;border-radius:50px;padding:1px 6px;">3</span></a>
        <a href="/login/form" class="login-pill">Connexion</a>
        <button id="burger" onclick="document.getElementById('mobileNav').classList.toggle('open')"><i
            class="fa-solid fa-bars"></i></button>
      </div>
    </div>
    <div class="mobile-nav" id="mobileNav">
      <a href="/">🏠 Accueil</a>
      <a href="/#categorie">📂 Catégorie</a>
      <a href="contact.html">📬 Contact</a>
      <a href="panier.html">🛒 Panier</a>
    </div>
  </header>

  <!-- PAGE HERO -->
  <div class="page-hero">
    <div class="hero-eyebrow"><i class="fa-solid fa-headset"></i> Support disponible 7j/7</div>
    <h1>Je suis Abdoul Hak Sourouya , Parlons-de-Moi,<br><em>je suis est là pour vous</em></h1>
    <p>Une question, une réclamation, un partenariat ? Mon équipe vous répond en moins de <strong
        style="color:#c8b8ff;">2 heures</strong> en semaine. Envoyez-nous un message !</p>
  </div>

  <!-- MAIN -->
  <div class="main-wrap">
    <div class="contact-grid">

      <!-- FORM CARD -->
      <div class="form-card">
        <!-- Normal form -->
        <div id="form-view">
          <div class="form-card-head">
            <h2><i class="fa-solid fa-paper-plane" style="color:#c8b8ff;margin-right:8px;font-size:0.95rem;"></i>Envoyer
              un message</h2>
            <p>Remplissez le formulaire — nous vous répondrons par email</p>
          </div>

          <!-- Subject pills -->
          <div class="subject-pills">
            <button class="subj-pill active" onclick="setPill(this)">💬 Question générale</button>
            <button class="subj-pill" onclick="setPill(this)">📦 Commande / Livraison</button>
            <button class="subj-pill" onclick="setPill(this)">🔄 Retour / Remboursement</button>
            <button class="subj-pill" onclick="setPill(this)">🤝 Partenariat</button>
            <button class="subj-pill" onclick="setPill(this)">🐛 Signaler un problème</button>
          </div>

          <div class="form-body">
            <!-- Name row -->
            <div class="form-row-2">
              <div class="field" id="f-wrap-prenom">
                <label>Prénom *</label>
                <input type="text" id="f-prenom" placeholder="Kodjo" autocomplete="given-name">
                <span class="err">Prénom requis</span>
              </div>
              <div class="field" id="f-wrap-nom">
                <label>Nom *</label>
                <input type="text" id="f-nom" placeholder="Dossou" autocomplete="family-name">
                <span class="err">Nom requis</span>
              </div>
            </div>

            <!-- Email / Phone -->
            <div class="form-row-2">
              <div class="field" id="f-wrap-email">
                <label>Adresse email *</label>
                <input type="email" id="f-email" placeholder="kodjo@email.com" autocomplete="email">
                <span class="err">Email invalide</span>
              </div>
              <div class="field">
                <label>Téléphone (optionnel)</label>
                <input type="tel" id="f-tel" placeholder="+228 90 00 00 00" autocomplete="tel">
              </div>
            </div>

            <!-- Subject -->
            <div class="field" id="f-wrap-sujet">
              <label>Objet du message *</label>
              <input type="text" id="f-sujet" placeholder="Ex: Problème avec ma commande #CMD-2024">
              <span class="err">Objet requis</span>
            </div>

            <!-- Order ref -->
            <div class="field">
              <label>N° de commande (si applicable)</label>
              <input type="text" id="f-order" placeholder="#CMD-XXXX">
            </div>

            <!-- Message -->
            <div class="field" id="f-wrap-msg">
              <label>Votre message *</label>
              <textarea id="f-msg"
                placeholder="Décrivez votre demande en détail. Plus vous êtes précis, plus nous pourrons vous aider rapidement..."
                oninput="updateCharCount(this)"></textarea>
              <div class="field-footer">
                <span class="err">Message trop court (min. 20 caractères)</span>
                <span class="char-count" id="char-count">0 / 1000</span>
              </div>
            </div>

            <!-- Rating -->
            <div class="field">
              <label>Votre satisfaction actuelle (optionnel)</label>
              <div class="rating-widget">
                <div class="rating-stars-input">
                  <input type="radio" name="rating" id="r5" value="5"><label for="r5">★</label>
                  <input type="radio" name="rating" id="r4" value="4"><label for="r4">★</label>
                  <input type="radio" name="rating" id="r3" value="3"><label for="r3">★</label>
                  <input type="radio" name="rating" id="r2" value="2"><label for="r2">★</label>
                  <input type="radio" name="rating" id="r1" value="1"><label for="r1">★</label>
                </div>
              </div>
            </div>

            <!-- File upload -->
            <div class="field">
              <label>Pièce jointe (optionnel)</label>
              <div class="upload-zone" onclick="document.getElementById('f-file').click()" id="upload-zone">
                <i class="fa-solid fa-cloud-arrow-up"></i>
                <p><span>Cliquer pour uploader</span> ou glisser-déposer</p>
                <p style="font-size:0.68rem;margin-top:3px;color:#6b6688;">PNG, JPG, PDF — Max 5MB</p>
                <input type="file" id="f-file" accept=".png,.jpg,.jpeg,.pdf" onchange="handleFile(this)">
              </div>
              <div id="file-preview"
                style="display:none; align-items:center; gap:8px; padding: 0.6rem 0.9rem; background:#1b1b28; border-radius:10px; border:1px solid rgba(200,184,255,0.1);">
                <i class="fa-solid fa-file" style="color:#c8b8ff;"></i>
                <span id="file-name"
                  style="font-size:0.82rem;color:#f0eeff;flex:1;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"></span>
                <button onclick="removeFile()"
                  style="background:none;border:none;color:#f87171;cursor:pointer;font-size:0.8rem;"><i
                    class="fa-solid fa-times"></i></button>
              </div>
            </div>

            <!-- Submit -->
            <button class="btn-submit" id="submit-btn" onclick="submitForm()">
              <div class="btn-text"><i class="fa-solid fa-paper-plane"></i> Envoyer le message</div>
              <div class="btn-loader">
                <div class="spinner"></div> Envoi en cours…
              </div>
            </button>

            <p class="form-privacy">En soumettant ce formulaire, vous acceptez notre <a href="#">politique de
                confidentialité</a>. Vos données sont protégées et ne seront jamais partagées.</p>
          </div>
        </div><!-- /form-view -->

        <!-- SUCCESS STATE -->
        <div class="success-state" id="success-view">
          <div class="success-icon"><i class="fa-solid fa-check"></i></div>
          <h3>Message envoyé ! 🎉</h3>
          <p>Merci <strong id="success-name" style="color:#c8b8ff;"></strong> ! Votre message a bien été reçu. Notre
            équipe vous répondra à <strong id="success-email" style="color:#c8b8ff;"></strong> dans les plus brefs
            délais.</p>
          <div class="ref-badge" id="success-ref">REF-000000</div>
          <button class="btn-back" onclick="resetForm()"><i class="fa-solid fa-arrow-left"></i> Envoyer un autre
            message</button>
        </div>
      </div><!-- /form-card -->

      <!-- SIDEBAR -->
      <div class="contact-sidebar">

        <!-- Contact info -->
        <div class="info-card">
          <h3><i class="fa-solid fa-address-card"
              style="color:#c8b8ff;margin-right:8px;font-size:0.9rem;"></i>Coordonnées</h3>
          <div class="contact-item">
            <div class="ci-icon purple"><i class="fa-solid fa-envelope"></i></div>
            <div>
              <div class="ci-label">Email</div>
              <div class="ci-value"><a href="mailto:contact@ecommerce.tg">contact@ecommerce.tg</a></div>
              <div class="ci-sub">Réponse sous 2h en semaine</div>
            </div>
          </div>
          <div class="contact-item">
            <div class="ci-icon green"><i class="fa-brands fa-whatsapp"></i></div>
            <div>
              <div class="ci-label">WhatsApp</div>
              <div class="ci-value"><a href="https://wa.me/22871852914">+228 71 85 29 14</a></div>
              <div class="ci-sub">Disponible 8h–20h · 7j/7</div>
            </div>
          </div>
          <div class="contact-item">
            <div class="ci-icon blue"><i class="fa-solid fa-phone"></i></div>
            <div>
              <div class="ci-label">Téléphone</div>
              <div class="ci-value"><a href="tel:+22822000000">+228 22 00 00 00</a></div>
              <div class="ci-sub">Lun–Sam · 8h30–17h30</div>
            </div>
          </div>
          <div class="contact-item">
            <div class="ci-icon orange"><i class="fa-solid fa-location-dot"></i></div>
            <div>
              <div class="ci-label">Adresse</div>
              <div class="ci-value">Bd du Mono, Tokoin, Lomé</div>
              <div class="ci-sub">Togo · Afrique de l'Ouest</div>
            </div>
          </div>
        </div>

        <!-- Hours -->
        <div class="hours-card">
          <h3><i class="fa-regular fa-clock" style="color:#8eb8d8;"></i>Horaires d'ouverture</h3>
          <div class="hour-row today">
            <span class="hour-day">Dimanche <span class="now-badge">Aujourd'hui</span></span>
            <span class="hour-time">10h – 17h</span>
          </div>
          <div class="hour-row"><span class="hour-day">Lundi</span><span class="hour-time">8h30 – 18h</span></div>
          <div class="hour-row"><span class="hour-day">Mardi</span><span class="hour-time">8h30 – 18h</span></div>
          <div class="hour-row"><span class="hour-day">Mercredi</span><span class="hour-time">8h30 – 18h</span></div>
          <div class="hour-row"><span class="hour-day">Jeudi</span><span class="hour-time">8h30 – 18h</span></div>
          <div class="hour-row"><span class="hour-day">Vendredi</span><span class="hour-time">8h30 – 18h</span></div>
          <div class="hour-row"><span class="hour-day">Samedi</span><span class="hour-time">9h – 16h</span></div>
        </div>

        <!-- Social -->
        <div class="social-card">
          <h3><i class="fa-solid fa-hashtag" style="color:#f4a261;margin-right:6px;font-size:0.9rem;"></i>Réseaux
            sociaux</h3>
          <div class="social-links">
            <a href="#" class="social-link fb"><i class="fa-brands fa-facebook-f"></i> Facebook</a>
            <a href="#" class="social-link ig"><i class="fa-brands fa-instagram"></i> Instagram</a>
            <a href="#" class="social-link tw"><i class="fa-brands fa-x-twitter"></i> X / Twitter</a>
            <a href="#" class="social-link li"><i class="fa-brands fa-linkedin-in"></i> LinkedIn</a>
            <a href="#" class="social-link wa"><i class="fa-brands fa-whatsapp"></i> WhatsApp</a>
            <a href="#" class="social-link yt"><i class="fa-brands fa-youtube"></i> YouTube</a>
          </div>
        </div>

      </div><!-- /sidebar -->

      <!-- FAQ -->
      <div class="faq-section">
        <div class="faq-title">Questions <span>fréquentes</span></div>
        <div class="faq-grid">
          <div class="faq-item">
            <div class="faq-q" onclick="toggleFaq(this)">Quel est le délai de livraison ? <i
                class="fa-solid fa-plus"></i></div>
            <div class="faq-a">La livraison standard prend 3 à 5 jours ouvrés à Lomé et 5 à 7 jours dans les autres
              villes. La livraison express (24h) est disponible uniquement à Lomé pour un supplément de 2 000 FCFA.
            </div>
          </div>
          <div class="faq-item">
            <div class="faq-q" onclick="toggleFaq(this)">Comment retourner un article ? <i class="fa-solid fa-plus"></i>
            </div>
            <div class="faq-a">Vous avez 30 jours pour retourner un article neuf, non porté et dans son emballage
              d'origine. Contactez-nous par email ou WhatsApp pour obtenir une étiquette de retour prépayée. Le
              remboursement est effectué sous 5 jours ouvrés.</div>
          </div>
          <div class="faq-item">
            <div class="faq-q" onclick="toggleFaq(this)">Quels modes de paiement acceptez-vous ? <i
                class="fa-solid fa-plus"></i></div>
            <div class="faq-a">Nous acceptons les cartes bancaires Visa et Mastercard, Flooz, T-Money, les virements
              bancaires et le paiement en espèces à la livraison. Tous les paiements en ligne sont sécurisés SSL
              256-bit.</div>
          </div>
          <div class="faq-item">
            <div class="faq-q" onclick="toggleFaq(this)">Livrez-vous en dehors du Togo ? <i
                class="fa-solid fa-plus"></i></div>
            <div class="faq-a">Oui ! Nous livrons au Bénin, Ghana, Côte d'Ivoire et Sénégal. Les délais et frais varient
              selon la destination. Contactez-nous pour un devis personnalisé.</div>
          </div>
          <div class="faq-item">
            <div class="faq-q" onclick="toggleFaq(this)">Comment suivre ma commande ? <i class="fa-solid fa-plus"></i>
            </div>
            <div class="faq-a">Dès l'expédition de votre commande, vous recevez un SMS et un email avec un lien de
              suivi. Vous pouvez également vous connecter à votre compte pour voir le statut en temps réel.</div>
          </div>
          <div class="faq-item">
            <div class="faq-q" onclick="toggleFaq(this)">Les tailles sont-elles fidèles ? <i
                class="fa-solid fa-plus"></i></div>
            <div class="faq-a">En général oui, mais cela dépend des marques. Chaque fiche produit inclut un guide des
              tailles détaillé. En cas de doute, n'hésitez pas à nous contacter : on vous conseillera avec plaisir !
            </div>
          </div>
        </div>
      </div>

      <!-- MAP -->
      <div class="map-section">
        <div class="map-wrap">
          <div class="map-center">
            <span class="map-pin">📍</span>
            <p style="font-weight:700;color:#f0eeff;font-size:1rem;margin-bottom:4px;">Ecommerce — Boutique Lomé</p>
            <p>Boulevard du Mono, Tokoin, Lomé, Togo</p>
            <button class="map-open-btn" onclick="window.open('https://maps.google.com/?q=Lome+Togo','_blank')">
              <i class="fa-solid fa-map-location-dot"></i> Ouvrir dans Google Maps
            </button>
          </div>
        </div>
      </div>

    </div><!-- /contact-grid -->
  </div><!-- /main-wrap -->

  <!-- TOAST -->
  <div class="toast" id="toast">
    <i class="fa-solid fa-circle-check" id="toast-icon" style="color:#4ade80;"></i>
    <span id="toast-msg">Message envoyé !</span>
  </div>

  <script>
    // SUBJECT PILLS
    function setPill(el) {
      document.querySelectorAll('.subj-pill').forEach(p => p.classList.remove('active'));
      el.classList.add('active');
      // Auto-fill subject field
      const map = {
        '💬 Question générale': 'Question générale',
        '📦 Commande / Livraison': 'Question sur ma commande / livraison',
        '🔄 Retour / Remboursement': 'Demande de retour ou remboursement',
        '🤝 Partenariat': 'Proposition de partenariat',
        '🐛 Signaler un problème': 'Signalement d\'un problème'
      };
      const txt = el.textContent.trim();
      if (map[txt]) document.getElementById('f-sujet').value = map[txt];
    }

    // CHAR COUNT
    function updateCharCount(ta) {
      const n = ta.value.length;
      const el = document.getElementById('char-count');
      el.textContent = n + ' / 1000';
      el.className = 'char-count' + (n > 900 ? ' warn' : '');
      if (n > 1000) ta.value = ta.value.substring(0, 1000);
    }

    // FILE UPLOAD
    function handleFile(input) {
      if (!input.files.length) return;
      const f = input.files[0];
      if (f.size > 5 * 1024 * 1024) { showToast('Fichier trop volumineux (max 5MB)', 'red'); return; }
      document.getElementById('file-name').textContent = f.name;
      document.getElementById('upload-zone').style.display = 'none';
      document.getElementById('file-preview').style.display = 'flex';
    }

    function removeFile() {
      document.getElementById('f-file').value = '';
      document.getElementById('upload-zone').style.display = 'block';
      document.getElementById('file-preview').style.display = 'none';
    }

    // DRAG & DROP
    const zone = document.getElementById('upload-zone');
    zone.addEventListener('dragover', e => { e.preventDefault(); zone.style.borderColor = '#c8b8ff'; zone.style.background = 'rgba(200,184,255,0.05)'; });
    zone.addEventListener('dragleave', () => { zone.style.borderColor = ''; zone.style.background = ''; });
    zone.addEventListener('drop', e => {
      e.preventDefault(); zone.style.borderColor = ''; zone.style.background = '';
      const dt = e.dataTransfer;
      if (dt.files.length) { document.getElementById('f-file').files = dt.files; handleFile(document.getElementById('f-file')); }
    });

    // VALIDATION
    function validate() {
      let ok = true;
      const fields = [
        { id: 'f-prenom', wrap: 'f-wrap-prenom', check: v => v.trim().length > 0 },
        { id: 'f-nom', wrap: 'f-wrap-nom', check: v => v.trim().length > 0 },
        { id: 'f-email', wrap: 'f-wrap-email', check: v => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v) },
        { id: 'f-sujet', wrap: 'f-wrap-sujet', check: v => v.trim().length > 2 },
        { id: 'f-msg', wrap: 'f-wrap-msg', check: v => v.trim().length >= 20 }
      ];
      fields.forEach(f => {
        const el = document.getElementById(f.id);
        const wrap = document.getElementById(f.wrap) || el.closest('.field');
        if (!f.check(el.value)) {
          wrap.classList.add('has-error');
          ok = false;
        } else {
          wrap.classList.remove('has-error');
        }
      });
      return ok;
    }

    // Clear error on input
    document.querySelectorAll('input,textarea').forEach(el => {
      el.addEventListener('input', () => {
        const wrap = el.closest('.field');
        if (wrap) wrap.classList.remove('has-error');
      });
    });

    // SUBMIT
    function submitForm() {
      if (!validate()) {
        showToast('Corrigez les erreurs avant d\'envoyer', 'red');
        const firstErr = document.querySelector('.field.has-error input, .field.has-error textarea');
        if (firstErr) firstErr.scrollIntoView({ behavior: 'smooth', block: 'center' });
        return;
      }

      const btn = document.getElementById('submit-btn');
      btn.classList.add('loading');
      btn.disabled = true;

      // Simulate email send
      setTimeout(() => {
        btn.classList.remove('loading');
        btn.disabled = false;

        const prenom = document.getElementById('f-prenom').value;
        const email = document.getElementById('f-email').value;
        const ref = 'REF-' + Date.now().toString().slice(-6);

        document.getElementById('success-name').textContent = prenom;
        document.getElementById('success-email').textContent = email;
        document.getElementById('success-ref').textContent = ref;

        document.getElementById('form-view').style.display = 'none';
        document.getElementById('success-view').classList.add('show');

        showToast('Message envoyé avec succès !', 'green');
      }, 2200);
    }

    function resetForm() {
      document.getElementById('form-view').style.display = 'block';
      document.getElementById('success-view').classList.remove('show');
      document.querySelectorAll('input,textarea').forEach(el => el.value = '');
      document.getElementById('char-count').textContent = '0 / 1000';
      document.querySelectorAll('.subj-pill').forEach((p, i) => p.classList.toggle('active', i === 0));
      removeFile();
    }

    // FAQ TOGGLE
    function toggleFaq(btn) {
      const item = btn.closest('.faq-item');
      const isOpen = item.classList.contains('open');
      document.querySelectorAll('.faq-item').forEach(f => f.classList.remove('open'));
      if (!isOpen) item.classList.add('open');
    }

    // TOAST
    function showToast(msg, type = 'green') {
      const toast = document.getElementById('toast');
      const icon = document.getElementById('toast-icon');
      document.getElementById('toast-msg').textContent = msg;
      icon.className = type === 'green' ? 'fa-solid fa-circle-check' : 'fa-solid fa-circle-exclamation';
      icon.style.color = type === 'green' ? '#4ade80' : '#f87171';
      toast.classList.add('show');
      setTimeout(() => toast.classList.remove('show'), 3000);
    }
  </script>
</body>

</html>