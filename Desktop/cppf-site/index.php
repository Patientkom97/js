<?php
require __DIR__ . '/includes/bootstrap.php';

$latest = db()->query('SELECT title, slug, excerpt, image, created_at FROM posts WHERE published = 1 ORDER BY created_at DESC LIMIT 3')->fetchAll();
$phone = setting('phone');
$telHref = preg_replace('/[^0-9+]/', '', $phone);

require __DIR__ . '/includes/public_header.php';
?>

  <main id="contenu">
    <!-- HERO -->
    <section class="hero">
      <div class="wrap hero-grid">
        <div>
          <p class="org">Conseil pour la promotion et protection de la femme et l’enfant</p>
          <h1 class="slogan">
            <span class="l l1">Une femme protégée,</span>
            <span class="l l2">un enfant épanoui,</span>
            <span class="l l3">une communauté forte.</span>
          </h1>
          <p class="lead">Défense, Protection et Promotion des Femmes et Enfants.</p>
          <div class="cta">
            <a class="btn" href="#actions">Découvrir nos actions</a>
            <a class="btn btn-ghost" href="#aide">Demander de l’aide</a>
          </div>
        </div>
        <div class="hero-art" aria-hidden="true">
          <span class="blob b1"></span><span class="blob b2"></span><span class="blob b3"></span>
        </div>
      </div>
    </section>

    <!-- A PROPOS -->
    <section class="section" id="apropos">
      <div class="wrap">
        <h2>Qui sommes-nous</h2>
        <div class="about">
          <article class="card-plain">
            <h3>Notre vision</h3>
            <p>Une société juste, inclusive et pacifique où les femmes et les enfants vivent dans la dignité et jouissent pleinement de leurs droits.</p>
          </article>
          <article class="card-plain">
            <h3>Notre mission</h3>
            <p>Protéger, défendre et promouvoir les droits des femmes et des enfants.</p>
          </article>
          <article class="card-plain">
            <h3>Notre devise</h3>
            <p>Défense, Protection et Promotion des Femmes et Enfants.</p>
          </article>
        </div>
        <blockquote class="quote">Protéger les droits, défendre la dignité, bâtir l’avenir.</blockquote>
      </div>
    </section>

    <!-- ACTIONS -->
    <section class="section tinted" id="actions">
      <div class="wrap">
        <h2>Nos domaines d’action</h2>
        <p class="intro">Neuf axes de travail, regroupés autour de trois engagements.</p>

        <div class="pillars">
          <article class="pillar p-protect">
            <h3>Protéger</h3>
            <ul>
              <li><strong>Protection des femmes et des enfants</strong><span>Prévention, accompagnement et mise en sécurité des personnes en danger.</span></li>
              <li><strong>Justice et droits humains</strong><span>Faire respecter les droits et faciliter l’accès à la justice.</span></li>
              <li><strong>Lutte contre l’exploitation et les discriminations</strong><span>Agir contre les violences, l’exploitation et toute forme d’exclusion.</span></li>
            </ul>
          </article>
          <article class="pillar p-grow">
            <h3>Épanouir</h3>
            <ul>
              <li><strong>Éducation et santé</strong><span>Soutenir l’accès à l’école et aux soins pour chaque enfant et chaque femme.</span></li>
              <li><strong>Autonomisation économique</strong><span>Renforcer les moyens d’agir et l’indépendance financière des femmes.</span></li>
              <li><strong>Entrepreneuriat féminin</strong><span>Former, conseiller et accompagner les femmes qui créent leur activité.</span></li>
            </ul>
          </article>
          <article class="pillar p-build">
            <h3>Bâtir</h3>
            <ul>
              <li><strong>Relèvement communautaire</strong><span>Reconstruire le lien social et les moyens de vie dans les communautés.</span></li>
              <li><strong>Femmes, paix, sécurité et cohésion sociale</strong><span>Associer les femmes à la prévention des conflits et à la paix durable.</span></li>
              <li><strong>Plaidoyer</strong><span>Porter la voix des femmes et des enfants auprès des décideurs.</span></li>
            </ul>
          </article>
        </div>
      </div>
    </section>

    <?php if ($latest): ?>
    <!-- ACTUALITES (gérées depuis le panel admin) -->
    <section class="section" id="actualites">
      <div class="wrap">
        <h2>Dernières actualités</h2>
        <div class="news-grid">
          <?php foreach ($latest as $p): ?>
            <article class="news-card">
              <?php if ($p['image']): ?>
                <a href="<?= BASE_URL ?>/actualite.php?slug=<?= e($p['slug']) ?>"><img src="<?= BASE_URL ?>/uploads/<?= e($p['image']) ?>" alt="" loading="lazy"></a>
              <?php endif; ?>
              <div class="news-body">
                <time datetime="<?= e(substr($p['created_at'], 0, 10)) ?>"><?= e(fr_date($p['created_at'])) ?></time>
                <h3><a href="<?= BASE_URL ?>/actualite.php?slug=<?= e($p['slug']) ?>"><?= e($p['title']) ?></a></h3>
                <p><?= e($p['excerpt']) ?></p>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
        <p class="more"><a class="btn btn-ghost" href="<?= BASE_URL ?>/actualites.php">Toutes les actualités</a></p>
      </div>
    </section>
    <?php endif; ?>

    <!-- AIDE -->
    <section class="section<?= $latest ? ' tinted' : '' ?>" id="aide">
      <div class="wrap help">
        <div>
          <h2>Besoin d’aide ou de signaler une situation ?</h2>
          <p>Si vous ou une personne de votre entourage subit des violences, une exploitation ou une discrimination, contactez-nous. Votre message est traité avec respect et discrétion.</p>
          <p class="notice">En cas de danger immédiat, appelez d’abord les services d’urgence de votre localité.</p>
        </div>
        <div class="help-box">
          <p><strong>Téléphone</strong><br><a href="tel:<?= e($telHref) ?>"><?= e($phone) ?></a></p>
          <p><strong>Courriel</strong><br><a href="mailto:<?= e(setting('email')) ?>"><?= e(setting('email')) ?></a></p>
          <p><strong>Adresse</strong><br><?= e(setting('address')) ?></p>
        </div>
      </div>
    </section>

    <!-- CONTACT -->
    <section class="section<?= $latest ? '' : ' tinted' ?>" id="contact">
      <div class="wrap contact">
        <div>
          <h2>Nous contacter</h2>
          <p>Partenaire, bénévole, bénéficiaire ou simple curieux : écrivez-nous. Nous répondons dans les meilleurs délais.</p>
        </div>
        <form id="contact-form" action="<?= BASE_URL ?>/api/contact.php" method="post" novalidate>
          <?= csrf_field() ?>
          <div class="hp" aria-hidden="true"><label>Ne pas remplir <input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>

          <label for="nom">Nom complet</label>
          <input id="nom" name="nom" type="text" autocomplete="name" required maxlength="120">
          <small class="err" data-for="nom"></small>

          <label for="email">Adresse courriel</label>
          <input id="email" name="email" type="email" autocomplete="email" required maxlength="160">
          <small class="err" data-for="email"></small>

          <label for="sujet">Sujet</label>
          <select id="sujet" name="sujet">
            <?php foreach (SUBJECTS as $s): ?><option><?= e($s) ?></option><?php endforeach; ?>
          </select>

          <label for="message">Message</label>
          <textarea id="message" name="message" rows="5" required maxlength="4000"></textarea>
          <small class="err" data-for="message"></small>

          <button class="btn" type="submit">Envoyer le message</button>
          <p class="status" id="form-status" role="status" aria-live="polite"></p>
        </form>
      </div>
    </section>
  </main>

<?php require __DIR__ . '/includes/public_footer.php'; ?>
