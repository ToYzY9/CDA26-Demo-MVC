<?php
//Page pour Afficher la liste des agents de l'appli Agent Manager
//Déclaration des variables d'affichage
$listAgents = [];

//LISTES DES AGENTS
try{
    //Création du PDO
    $pdo = new PDO("mysql:host=localhost;dbname=agent_manager","root","root",[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);

    //Préparation de la requête
    $request = $pdo->prepare("SELECT a.Id_Agent, a.name, a.dob, a.created_at, t.tier, ac.archetype, te.team_name FROM agents a INNER JOIN tiers t ON t.Id_Tier = a.Id_Tier INNER JOIN archetypes ac ON ac.Id_Archetype = a.Id_Archetype LEFT JOIN Teams te ON te.Id_Team = a.Id_Team");

    //Execution
    $request->execute();

    //Récupère
    $listAgents = $request->fetchAll(PDO::FETCH_ASSOC);
}catch(Exception $error){
   http_response_code(500);
   $message = $error->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <section>
            <h2>Liste des agents</h2>
            <ul>
                <?php
                    foreach($listAgents as $agent){
                ?>
                        <li><?php 
                        //Affichage des données avec nettoyage du code malveillant
                        echo(htmlspecialchars($agent['name'])." - ".htmlspecialchars($agent['archetype'])." - ".htmlspecialchars($agent['dob'])." - ".htmlspecialchars($agent['created_at'])." - ".htmlspecialchars($agent['tier'])) ?></li>
                <?php
                    }
                ?>
            </ul>
        </section>
    </main>
</body>
</html>