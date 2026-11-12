<?php
//Controller : page (url) d'accès au client
// s'occupe de la logique pour l'affichage de la liste des agents

//import des ressources
include './model/modelAgent.php';
include './view/viewAccueil.php';

function render(){
    //appeler le modèle pour récupérer la liste des agents
    $data = findAll();

    //Vérifier la nature de $data (tableau ou chaîne de caractère)
    if(gettype($data) == "array"){
        //J'envoie les données à la view
        display($data);
    }else{
        //J'envoie le message d'erreur à la view
        display([],$data);
    }
}

render();

