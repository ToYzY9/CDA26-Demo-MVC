<?php
//View : s'occuper de l'affichage de la page listant les agents
//Déclaration des variables d'affichage
function display($listAgents = [],$message = ""){
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
            <p><?php echo $message ?></p>
        </section>
    </main>
</body>
</html>

<?php
    }