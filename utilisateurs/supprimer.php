<?php
include '../db/connexion.php';
include '../db/fonction.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteUtilisateur($id);
}

header('Location: ../utilisateurs/index.php');
exit();

?>