<?php declare(strict_types=1); ?>
<?php /** @var array $etudiants */ ?>
<?php /** @var int $page */ ?>
<?php /** @var int $size */ ?>
<?php /** @var int $total */ ?>
<?php /** @var int $totalPages */ ?>

<h2>Étudiants</h2>

<p>
  Total: <?= (int)$total ?> — Page <?= (int)$page ?>/<?= (int)$totalPages ?>
</p>

<p>
  <a role="button" href="/etudiants/create">Nouveau</a>
</p>

<?php if (empty($etudiants)): ?>
  <p>Aucun étudiant.</p>
<?php else: ?>
  <table>
    <thead>
      <tr>
        <th>ID</th><th>CNE</th><th>Nom</th><th>Prénom</th><th>Email</th><th>Filière</th><th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($etudiants as $e): ?>
      <tr>
        <td><?= (int)$e['id'] ?></td>
        <td><?= htmlspecialchars($e['cne'], ENT_QUOTES, 'UTF-8') ?></td>
        <td><?= htmlspecialchars($e['nom'], ENT_QUOTES, 'UTF-8') ?></td>
        <td><?= htmlspecialchars($e['prenom'], ENT_QUOTES, 'UTF-8') ?></td>
        <td><?= htmlspecialchars($e['email'], ENT_QUOTES, 'UTF-8') ?></td>
        <td><?= htmlspecialchars($e['filiere_code'] . ' — ' . $e['filiere_libelle'], ENT_QUOTES, 'UTF-8') ?></td>
        <td>
          <a href="/etudiants/<?= (int)$e['id'] ?>">Voir</a>
          &nbsp;|&nbsp;
          <a href="/etudiants/<?= (int)$e['id'] ?>/edit">Éditer</a>
          &nbsp;|&nbsp;
          <form class="inline" action="/etudiants/<?= (int)$e['id'] ?>/delete" method="post" onsubmit="return confirm('Supprimer ?');">
            <button type="submit">Supprimer</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>

  <?php $base = '/etudiants?size=' . (int)$size . '&page='; ?>
  <nav class="pagination">
    <?php if ($page > 1): ?>
      <a href="<?= $base . ($page - 1) ?>">« Préc.</a>
    <?php endif; ?>

    <?php for ($p = 1; $p <= $totalPages; $p++): ?>
      <a href="<?= $base . $p ?>" <?= ($p === (int)$page) ? 'aria-current="page"' : '' ?>>
        <?= $p ?>
      </a>
    <?php endfor; ?>

    <?php if ($page < $totalPages): ?>
      <a href="<?= $base . ($page + 1) ?>">Suiv. »</a>
    <?php endif; ?>
  </nav>
<?php endif; ?>