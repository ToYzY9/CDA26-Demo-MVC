<?php
//Model : Communiquer avec la BDD pour ce qui concerne les Agents
function findAll(){
    try{
        //Création du PDO
        $pdo = new PDO("mysql:host=localhost;dbname=agent_manager","root","root",[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);

        //Préparation de la requête
        $request = $pdo->prepare("SELECT a.Id_Agent, a.name, a.dob, a.created_at, t.tier, ac.archetype, te.team_name FROM agents a INNER JOIN tiers t ON t.Id_Tier = a.Id_Tier INNER JOIN archetypes ac ON ac.Id_Archetype = a.Id_Archetype LEFT JOIN Teams te ON te.Id_Team = a.Id_Team");

        //Execution
        $request->execute();

        //Récupère
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }catch(Exception $error){
        http_response_code(500);
        return $error->getMessage();
    }
}