<?php declare(strict_types=1); ?>
<?php /** @var array $filieres */ ?>
<?php /** @var array $errors */ ?>
<?php /** @var array $old */ ?>

<header style="margin-bottom: 1rem;">
  <h2 style="margin-bottom:.25rem;">Créer un étudiant</h2>
  <p style="margin:0; opacity:.8;">Saisir les informations puis enregistrer.</p>
</header>

<form method="post" action="/etudiants/store" novalidate>
  <div class="grid2">

    <div>
      <label for="cne">CNE</label>
      <input
        id="cne"
        name="cne"
        value="<?= htmlspecialchars($old['cne'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
        placeholder="Ex: AB123456"
        required
      >
      <?php if (!empty($errors['cne'])): ?>
        <small class="error"><?= htmlspecialchars($errors['cne'], ENT_QUOTES, 'UTF-8') ?></small>
      <?php endif; ?>
    </div>

    <div>
      <label for="email">Email</label>
      <input
        id="email"
        type="email"
        name="email"
        value="<?= htmlspecialchars($old['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
        placeholder="exemple@mail.com"
        required
      >
      <?php if (!empty($errors['email'])): ?>
        <small class="error"><?= htmlspecialchars($errors['email'], ENT_QUOTES, 'UTF-8') ?></small>
      <?php endif; ?>
    </div>

    <div>
      <label for="nom">Nom</label>
      <input
        id="nom"
        name="nom"
        value="<?= htmlspecialchars($old['nom'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
        placeholder="Nom"
        required
      >
      <?php if (!empty($errors['nom'])): ?>
        <small class="error"><?= htmlspecialchars($errors['nom'], ENT_QUOTES, 'UTF-8') ?></small>
      <?php endif; ?>
    </div>

    <div>
      <label for="prenom">Prénom</label>
      <input
        id="prenom"
        name="prenom"
        value="<?= htmlspecialchars($old['prenom'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
        placeholder="Prénom"
        required
      >
      <?php if (!empty($errors['prenom'])): ?>
        <small class="error"><?= htmlspecialchars($errors['prenom'], ENT_QUOTES, 'UTF-8') ?></small>
      <?php endif; ?>
    </div>

    <div class="full">
      <label for="filiere_id">Filière</label>
      <select id="filiere_id" name="filiere_id" required>
        <option value="">-- Choisir --</option>
        <?php foreach ($filieres as $f): ?>
          <?php
            $fid = (int)$f['id'];
            $selected = (isset($old['filiere_id']) && (int)$old['filiere_id'] === $fid) ? 'selected' : '';
          ?>
          <option value="<?= $fid ?>" <?= $selected ?>>
            <?= htmlspecialchars($f['code'] . ' — ' . $f['libelle'], ENT_QUOTES, 'UTF-8') ?>
          </option>
        <?php endforeach; ?>
      </select>
      <?php if (!empty($errors['filiere_id'])): ?>
        <small class="error"><?= htmlspecialchars($errors['filiere_id'], ENT_QUOTES, 'UTF-8') ?></small>
      <?php endif; ?>
    </div>

  </div>

  <div class="actions">
    <button type="submit">Enregistrer</button>
    <a class="btn secondary" href="/etudiants">Annuler</a>
  </div>
</form>