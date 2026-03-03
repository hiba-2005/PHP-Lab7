<?php declare(strict_types=1); ?>


<h2>Étudiant #<?= (int)$e['id'] ?></h2>

<ul>
  <li>CNE : <?= htmlspecialchars($e['cne'], ENT_QUOTES, 'UTF-8') ?></li>
  <li>Nom : <?= htmlspecialchars($e['nom'], ENT_QUOTES, 'UTF-8') ?></li>
  <li>Prénom : <?= htmlspecialchars($e['prenom'], ENT_QUOTES, 'UTF-8') ?></li>
  <li>Email : <?= htmlspecialchars($e['email'], ENT_QUOTES, 'UTF-8') ?></li>
  <li>Filière : <?= htmlspecialchars($e['filiere_code'] . ' — ' . $e['filiere_libelle'], ENT_QUOTES, 'UTF-8') ?></li>
</ul>

<p>
  <a role="button" href="/etudiants/<?= (int)$e['id'] ?>/edit">Éditer</a>
  <a role="button" class="secondary" href="/etudiants">Retour</a>
</p>

<form action="/etudiants/<?= (int)$e['id'] ?>/delete" method="post" onsubmit="return confirm('Supprimer ?');">
  <button type="submit" class="contrast">Supprimer</button>
</form>