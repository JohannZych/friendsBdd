<?php

require_once '_connec.php';
$pdo = new \PDO(DSN, USER, PASS);

// A exécuter afin de tester le contenu de votre table friend
$query = "SELECT * FROM friend";
$statement = $pdo->query($query);

// On veut afficher notre résultat via un tableau associatif (PDO::FETCH_OBJ)
$friendsObject = $statement->fetchAll(PDO::FETCH_OBJ);

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste Friends</title>
</head>
<body>
    <ul>
        <?php
        foreach($friendsObject as $friend) {
            echo "<li>$friend->firstname" . ' ' . "$friend->lastname </li>";
        }
        ?>
    </ul>

    <form action="bdd.php" method="post">
        <label for="firstName" >Nom : </label>
        <input type="text" name="firstName" id="firstName" required="required">
        <label for="lastName" >Prénom : </label>
        <input type="text" name="lastName" id="lastName" required="required">
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>

</body>
</html>
