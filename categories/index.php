
<?php

include '../db/connexion.php';

include '../db/fonction.php';

$listCategories = getAllCategories();



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
      <div class="mt-3">
          <a href="./ajouter.php" class="btn btn-primary" role="button" aria-pressed="true">Ajouter un categorie</a>
      </div>

     <table class="table table-bordered mt-4">
        <thead>
          <tr>
            <td>Numero</td>
            <td>Nom</td>
            <td>Actions</td>
          </tr>
        </thead>
        <tbody>

        <?php foreach ($listCategories as $categorie): ?>
          <tr>
            <td><?php echo $categorie['id_categorie']; ?></td>
            <td><?php echo $categorie['nom']; ?></td>
            <td>
              <a href="./modifier.php?id=<?php echo $categorie['id_categorie']; ?>" class="btn btn-success" role="button" aria-pressed="true">Modifier</a>
              <a href="./supprimer.php?id=<?php echo $categorie['id_categorie']; ?>" class="btn btn-danger" role="button" aria-pressed="true">Supprimer</a>
            </td>
          </tr>
        <?php endforeach; ?>
         
        </tbody>
     </table>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>