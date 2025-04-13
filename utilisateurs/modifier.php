<?php 

include '../db/connexion.php';
include '../db/fonction.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $utilisateur = getUtilisateurById($id);

    // var_dump($utilisateur);
} else {
  header('Location: ../utilisateurs/index.php');
    exit();
}

if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $motdepasse = $_POST['motdepasse'];
    $role = $_POST['role'];

    updateUtilisateur($id, $nom, $prenom, $email, $motdepasse, $role);
     
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  </head>
  <body>
  <?php include '../header.php'; ?>

  <div class="container">
      <div class="mt-3 card offset-3 w-50 mb-5">
          <div class="card-header text-center">
              <h2>Modifier un utilisateur</h2>
          </div>
          <div class="card-body">
           <form action="" method="post">
           <div class="m-3">
                <div class="mt-2">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $utilisateur['nom']; ?>" required>
                </div>
                <div class="mt-2">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $utilisateur['prenom']; ?>" required>
                </div>
                <div class="mt-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $utilisateur['email']; ?>" required>
                </div>
                <div class="mt-2">
                    <label for="motdepasse" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="motdepasse" name="motdepasse" value="<?php echo $utilisateur['mdp']; ?>" required>
                </div>
                <div class="mt-2">
                    <label for="role" class="form-label">Rôle</label>
                    <select class="form-select" id="role" name="role" required>
                        <option value="<?php echo $utilisateur['role']; ?>" selected><?php echo $utilisateur['role']; ?></option>
          
                        <option value="admin">Administrateur</option>
                        <option value="utilisateur">Utilisateur</option>
                    </select>
                </div>
                <div class="mt-2 text-center">
                    <button type="submit" name="submit" class="btn btn-primary w-50">Modifier</button>
                </div>
            </div>
           </form>
          </div>
      </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>