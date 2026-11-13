<?php 
class AccueilController {
    private AgentRepository $agentRepo;
    private viewAccueil $view;

    public function __construct(AgentRepository $pAgentRepo, viewAccueil $pView)
    {
        $this->agentRepo = $pAgentRepo;
        $this->view = $pView;
    }

    function render(){
        //appeler le modèle pour récupérer la liste des agents
        $data = $this->agentRepo->findAllAgent();

        //Vérifier la nature de $data (tableau ou chaîne de caractère)
        if(gettype($data) == "array"){
            //J'envoie les données à la view
            $this->view->setListAgents($data)->display();
        }else{
            //J'envoie le message d'erreur à la view
            $this->view->setMessage($data)->display();
        }
    }
}
