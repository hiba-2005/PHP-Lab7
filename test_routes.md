# test_routes.md

- GET  /                     → 302 → /etudiants
- GET  /etudiants            → 200 liste paginée, liens de pagination visibles
- GET  /etudiants/create     → 200 formulaire création
- POST /etudiants/store      → 302 → /etudiants/{id} (si OK) sinon 200 avec erreurs
- GET  /etudiants/{id}       → 200 page détail (404 si id inconnu)
- GET  /etudiants/{id}/edit  → 200 formulaire édition (404 si id inconnu)
- POST /etudiants/{id}/update → 302 → /etudiants/{id} (si OK) sinon 200 avec erreurs
- POST /etudiants/{id}/delete → 302 → /etudiants
- GET  /api/etudiants?page=1 → 200 JSON (optionnel)