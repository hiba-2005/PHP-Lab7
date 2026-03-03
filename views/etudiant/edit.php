<?php declare(strict_types=1); ?>
<?php /** @var array $e */ ?>
<?php /** @var array $filieres */ ?>
<?php /** @var array $errors */ ?>

<h2>Éditer l’étudiant #<?= (int)$e['id'] ?></h2>

<form method="post" action="/etudiants/<?= (int)$e['id'] ?>/update">
  <label>
    CNE
    <input name="cne" value="<?= htmlspecialchars($e['cne'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
    <?php if (!empty($errors['cne'])): ?>
      <small class="error"><?= htmlspecialchars($errors['cne'], ENT_QUOTES, 'UTF-8') ?></small>
    <?php endif; ?>
  </label>

  <label>
    Nom
    <input name="nom" value="<?= htmlspecialchars($e['nom'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
    <?php if (!empty($errors['nom'])): ?>
      <small class="error"><?= htmlspecialchars($errors['nom'], ENT_QUOTES, 'UTF-8') ?></small>
    <?php endif; ?>
  </label>

  <label>
    Prénom
    <input name="prenom" value="<?= htmlspecialchars($e['prenom'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
    <?php if (!empty($errors['prenom'])): ?>
      <small class="error"><?= htmlspecialchars($errors['prenom'], ENT_QUOTES, 'UTF-8') ?></small>
    <?php endif; ?>
  </label>

  <label>
    Email
    <input type="email" name="email" value="<?= htmlspecialchars($e['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
    <?php if (!empty($errors['email'])): ?>
      <small class="error"><?= htmlspecialchars($errors['email'], ENT_QUOTES, 'UTF-8') ?></small>
    <?php endif; ?>
  </label>

  <label>
    Filière
    <select name="filiere_id" required>
      <?php foreach ($filieres as $f): ?>
        <?php
          $fid = (int)$f['id'];
          $selected = ((int)($e['filiere_id'] ?? 0) === $fid) ? 'selected' : '';
        ?>
        <option value="<?= $fid ?>" <?= $selected ?>>
          <?= htmlspecialchars($f['code'] . ' — ' . $f['libelle'], ENT_QUOTES, 'UTF-8') ?>
        </option>
      <?php endforeach; ?>
    </select>
    <?php if (!empty($errors['filiere_id'])): ?>
      <small class="error"><?= htmlspecialchars($errors['filiere_id'], ENT_QUOTES, 'UTF-8') ?></small>
    <?php endif; ?>
  </label>

  <button type="submit">Enregistrer</button>
  <a role="button" class="secondary" href="/etudiants/<?= (int)$e['id'] ?>">Annuler</a>
</form>