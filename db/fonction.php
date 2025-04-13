<?php 

function addUtilisateur($nom, $prenom, $email, $motdepasse, $role){

    global $conn;

    $stmt = $conn->prepare("INSERT INTO utilisateurs (nom, prenom, email, mdp, role) VALUES (:nom, :prenom, :email, :p, :r)");
        
    // Bind parameters
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':p', $motdepasse);
    $stmt->bindParam(':r', $role);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Utilisateur ajouté avec succès";
        header('Location: ../utilisateurs/index.php');
        exit();
    } else {
        echo "Erreur lors de l'ajout de l'utilisateur";
    }
}


function getAllUtilisateurs(){
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM utilisateurs");
    $stmt->execute();

    $utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $utilisateurs;
}

function getUtilisateurById($id){
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE id_utilisateur = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

    return $utilisateur;
}

function updateUtilisateur($id, $nom, $prenom, $email, $motdepasse, $role){
    global $conn;

    $stmt = $conn->prepare("UPDATE utilisateurs SET nom = :nom, prenom = :prenom, email = :email, mdp = :p, role = :r WHERE id_utilisateur = :id");
        
    // Bind parameters
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':p', $motdepasse);
    $stmt->bindParam(':r', $role);
    $stmt->bindParam(':id', $id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Utilisateur modifié avec succès";
        header('Location: ../utilisateurs/index.php');
        exit();
    } else {
        echo "Erreur lors de la modification de l'utilisateur";
    }
}

function deleteUtilisateur($id){
    global $conn;

    $stmt = $conn->prepare("DELETE FROM utilisateurs WHERE id_utilisateur = :id");
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "Utilisateur supprimé avec succès";
        header('Location: ../utilisateurs/index.php');
        exit();
    } else {
        echo "Erreur lors de la suppression de l'utilisateur";
    }
}


function getAllCategories(){
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM categorie");
    $stmt->execute();

    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $categories;
}

function addCategorie($nom){
    global $conn;

    $stmt = $conn->prepare("INSERT INTO categorie (nom) VALUES (:nom)");
        
    // Bind parameters
    $stmt->bindParam(':nom', $nom);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Categorie ajoutée avec succès";
        header('Location: ../categories/index.php');
        exit();
    } else {
        echo "Erreur lors de l'ajout de la categorie";
    }
}


function getCategorieById($id){
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM categorie WHERE id_categorie = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $categorie = $stmt->fetch(PDO::FETCH_ASSOC);

    return $categorie;
}

function updateCategorie($id, $nom){
    global $conn;

    $stmt = $conn->prepare("UPDATE categorie SET nom = :nom WHERE id_categorie = :id");
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':id', $id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Categorie modifiée avec succès";
        header('Location: ../categories/index.php');
        exit();
    } else {
        echo "Erreur lors de la modification de la categorie";
    }
}

function deleteCategorie($id){
    global $conn;

    $stmt = $conn->prepare("DELETE FROM categorie WHERE id_categorie = :id");
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "Categorie supprimée avec succès";
        header('Location: ../categories/index.php');
        exit();
    } else {
        echo "Erreur lors de la suppression de la categorie";
    }
}

function getAllProduits(){
    global $conn;

    $stmt = $conn->prepare("SELECT p.id_produit as id_produit, p.nom as nom, p.prix as prix, p.quantite as quantite,
    u.nom as utilisateur, c.nom as categorie  FROM produits p 
    join utilisateurs u on p.id_utilisateur = u.id_utilisateur
    join categorie c on p.id_categorie = c.id_categorie");
    $stmt->execute();

    $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $produits;
}


function addProduit($nom, $prix, $quantite, $id_utilisateur, $id_categorie){
    global $conn;

    $stmt = $conn->prepare("INSERT INTO produits (nom, prix, quantite, id_utilisateur, id_categorie) VALUES (:nom, :prix, :quantite, :id_utilisateur, :id_categorie)");
        
    // Bind parameters
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prix', $prix);
    $stmt->bindParam(':quantite', $quantite);
    $stmt->bindParam(':id_utilisateur', $id_utilisateur);
    $stmt->bindParam(':id_categorie', $id_categorie);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Produit ajouté avec succès";
        header('Location: ../produits/index.php');
        exit();
    } else {
        echo "Erreur lors de l'ajout du produit";
    }
}


function getProduitById($id){
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM produits WHERE id_produit = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $produit = $stmt->fetch(PDO::FETCH_ASSOC);

    return $produit;
}

function updateProduit($id, $nom, $prix, $quantite, $id_utilisateur, $id_categorie){
    global $conn;

    $stmt = $conn->prepare("UPDATE produits SET nom = :nom, prix = :prix, quantite = :quantite, id_utilisateur = :id_utilisateur, id_categorie = :id_categorie WHERE id_produit = :id");
        
    // Bind parameters
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prix', $prix);
    $stmt->bindParam(':quantite', $quantite);
    $stmt->bindParam(':id_utilisateur', $id_utilisateur);
    $stmt->bindParam(':id_categorie', $id_categorie);
    // Execute the statement
    if ($stmt->execute()) {
        echo "Produit modifié avec succès";
        header('Location: ../produits/index.php');
        exit();
    } else {
        echo "Erreur lors de la modification du produit";
    }
}

function deleteProduit($id){
    global $conn;

    $stmt = $conn->prepare("DELETE FROM produits WHERE id_produit = :id");
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "Produit supprimé avec succès";
        header('Location: ../produits/index.php');
        exit();
    } else {
        echo "Erreur lors de la suppression du produit";
    }
}


?>