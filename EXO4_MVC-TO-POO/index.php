<?php
//Controller : page (url) d'accès au client
// s'occupe de la logique pour l'affichage de la liste des agents

//import des ressources
include './Models/Manager/DatabaseManager.php';
include './Models/Repository/AgentRepository.php';
include './Views/ViewAccueil.php';
include './Controllers/AccueilController.php';




// $model = new AgentRepository(new DatabaseManager($_ENV['DB_SERVER'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']));
$dbManager = new DatabaseManager('localhost', 'root', '', 'agent_manager');
$agentRepository = new AgentRepository($dbManager);
$view = new ViewAccueil();

$accueilController = new AccueilController($agentRepository,$view);
$accueilController->render();