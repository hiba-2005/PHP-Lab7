<?php declare(strict_types=1); ?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mini MVC — Gestion Étudiants</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">

  <style>
    :root{
      --app-radius:16px;
      --app-border:rgba(0,0,0,.08);
      --app-shadow:0 10px 30px rgba(0,0,0,.06);
    }

    body{
      background: linear-gradient(180deg, rgba(0,0,0,.02), rgba(0,0,0,0));
    }

    .container{
      max-width: 1050px;
      margin: 2rem auto;
    }

    /* Header */
    .topbar{
      position: sticky;
      top: 0;
      z-index: 10;
      backdrop-filter: blur(10px);
      background: rgba(255,255,255,.75);
      border: 1px solid var(--app-border);
      border-radius: var(--app-radius);
      padding: .75rem 1rem;
      box-shadow: var(--app-shadow);
    }

    .brand{
      display:flex;
      align-items:center;
      gap:.75rem;
    }

    .brand-title{
      margin:0;
      font-size:1.05rem;
      letter-spacing:.2px;
    }

    .nav-links a{
      border-radius: 999px;
      padding: .4rem .75rem;
    }

    /* Content card */
    .panel{
      margin-top: 1rem;
      border: 1px solid var(--app-border);
      border-radius: var(--app-radius);
      box-shadow: var(--app-shadow);
      padding: 1.25rem;
      background: #fff;
    }

    /* Tables */
    table{
      width:100%;
    }
    thead th{
      background: rgba(0,0,0,.03);
    }

    /* Pagination + errors */
    .pagination a{ margin: 0 .25rem; }
    .error{ color:#b00020; font-weight:600; }

    /* Inline delete form */
    form.inline{ display:inline; }

    /* Buttons helper (for links) */
    .btn{
      display:inline-block;
      padding:.6rem .9rem;
      border-radius: 12px;
      text-decoration:none;
      border:1px solid var(--app-border);
    }
    .btn.secondary{ opacity:.85; }

    /* Grid helper for modern forms */
    .grid2{
      display:grid;
      grid-template-columns: 1fr;
      gap:1rem;
    }
    .grid2 .full{ grid-column: 1 / -1; }
    .actions{
      display:flex;
      gap:.75rem;
      justify-content:flex-end;
      align-items:center;
      margin-top:1rem;
    }
    @media (min-width: 900px){
      .grid2{ grid-template-columns: 1fr 1fr; }
    }
  </style>
</head>

<body>
  <main class="container">
    <nav class="topbar">
      <ul class="brand">
        <li>
          <h1 class="brand-title">Gestion Étudiants</h1>
        </li>
      </ul>

      <ul class="nav-links">
        <li><a href="/etudiants">Liste</a></li>
        <li><a href="/etudiants/create">Ajouter</a></li>
      </ul>
    </nav>

    <section class="panel">
      <?= $content ?>
    </section>
  </main>
</body>
</html>