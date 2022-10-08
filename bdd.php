<?php

require_once '_connec.php';
$pdo = new \PDO(DSN, USER, PASS);

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    // nettoyage et validation des données soumises via le formulaire
    if (!empty($_POST['firstName']) && !empty($_POST['firstName'])) {

// On récupère les informations saisies précédemment dans un formulaire
        $firstname = trim($_POST['firstName']);
        $lastname = trim($_POST['lastName']);

// On prépare notre requête d'insertion
        $query = 'INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)';
        $statement = $pdo->prepare($query);

// On lie les valeurs saisies dans le formulaire à nos placeholders
        $statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
        $statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);

        $statement->execute();
    }
}

header("Location: index.php");

