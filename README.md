# LAB 7 — Mini Framework MVC + Routing (PHP 7)

## Objectif
Réaliser un mini-framework en PHP 7 avec :
- Front Controller (`public/index.php`)
- Routing GET/POST avec paramètres (`/etudiants/{id}`)
- MVC simple (Controller + View)
- Accès BD via PDO (DAO + Logger)
- CRUD Étudiant + pagination + API JSON optionnelle

---

## Prérequis
- PHP 7.x (CLI)
- MySQL / MariaDB
- Extension `pdo_mysql` activée
- Serveur interne PHP ou XAMPP

---
## Arborescence

 ````
Lab7/
  public/
    index.php
  src/
    Container/
      AppFactory.php
    Controller/
      BaseController.php
      EtudiantController.php
    Core/
      Router.php
      Request.php
      Response.php
      View.php
    Dao/
      DBConnection.php
      Logger.php
      EtudiantDao.php
      FiliereDao.php
  views/
    layout.php
    etudiant/
      index.php
      create.php
      edit.php
      show.php
  logs/
  test_routes.md
  ````
<img width="522" height="407" alt="image" src="https://github.com/user-attachments/assets/620a1c03-0077-4f37-b917-b8f362fe622b" />
<img width="525" height="393" alt="image" src="https://github.com/user-attachments/assets/da311bda-5a13-460b-a0cb-4cc35e9fd723" />
<img width="567" height="607" alt="image" src="https://github.com/user-attachments/assets/54943d51-9d99-4e88-ab10-b5526dd8fd63" />
