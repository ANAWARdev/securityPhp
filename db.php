<!-- Création de canal de communication avec la base de données -->
<!-- on a stocké notre bd dans mysqlClient -->
<?php
$mysqlClient = new PDO(
	'mysql:host=localhost;dbname=partage_de_recettes;charset=utf8',
	'root',
	''
);
// Pour récupérer la liste des recettes
$recipesStatement = $mysqlClient->prepare('SELECT * FROM recipes');
$recipesStatement->execute();
// fetch c'est va chercher
$recipes = $recipesStatement->fetchAll();

// Pour récupérer la liste des utilisateurs
$usersStatement = $mysqlClient->prepare('SELECT * FROM users');
$usersStatement->execute();
// fetch c'est va chercher
$users = $usersStatement->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <?php   
        foreach ($recipes as $recipe) {
            echo $recipe['title']. ' ' . $recipe['author']. '<br>';
}
?>
    </div>
    <br>
    <br>
    <div>
        <?php   
        foreach ($users as $user) {
            echo $user['full_name']. '<br>';
}
?>
    </div>
</body>

</html>