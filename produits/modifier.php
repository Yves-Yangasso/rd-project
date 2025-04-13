<?php 

include '../db/connexion.php';
include '../db/fonction.php';

$utilisateurs = getAllUtilisateurs();
$categories = getAllCategories();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $produit = getProduitById($id);
}
if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $quantite = $_POST['quantite'];
    $id_utilisateur = $_POST['utilisateur'];
    $id_categorie = $_POST['categorie'];
    
    updateProduit($id, $nom, $prix, $quantite, $id_utilisateur, $id_categorie);
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
              <h2>Ajouter un modifier</h2>
          </div>
          <div class="card-body">
           <form action="" method="post">
           <div class="m-3">

              <div class="mt-2">
                <label for="">Nom</label>
                <input type="text" class="form-control" name="nom"  value="<?php echo $produit['nom']; ?>" required>
              </div>

              <div class="mt-2">
                <label for="">Prix</label>
                <input type="number" class="form-control" name="prix" value="<?php echo $produit['prix']; ?>" required>
              </div>


              <div class="mt-2">
                <label for="">Quantite</label>
                <input type="number" class="form-control" name="quantite" value="<?php echo $produit['quantite']; ?>" required>
              </div>


              <div class="mt-2">
                <label for="">Utilisateur</label>
                <select name="utilisateur" class="form-select" required>
                  <option value="" disabled selected>Choisir un utilisateur</option>
                  <?php 
                   
                    foreach($utilisateurs as $utilisateur) {
                      echo "<option value='{$utilisateur['id_utilisateur']}'>{$utilisateur['nom']}</option>";
                    }
                  ?>
                </select>
              </div>

              <div class="mt-2">
                <label for="">Categorie</label>
                <select name="categorie" class="form-select" required>
                  <option value="" disabled selected>Choisir une categorie</option>
                  <?php 
                   
                    foreach($categories as $categorie) {
                      echo "<option value='{$categorie['id_categorie']}'>{$categorie['nom']}</option>";
                    }
                  ?>
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