<?php
//Controller : page (url) d'accès au client
// s'occupe de la logique pour l'affichage de la liste des agents

//import des ressources
include './model/modelAgent.php';
include './view/viewAccueil.php';

class ControllerAccueil {
    //ATTRIBUT
    private ModelAgent $model;
    private ViewAccueil $view;

    //CONSTRUCTEUR
    public function __construct(ModelAgent $newModel, ViewAccueil $newView){
        $this->model = $newModel;
        $this->view = $newView;
    }

    //GETTER ET SETTER
    /**
     * Get the value of model
     *
     * @return ModelAgent
     */
    public function getModel(): ModelAgent {
        return $this->model;
    }

    /**
     * Set the value of model
     *
     * @param ModelAgent $model
     *
     * @return self
     */
    public function setModel(ModelAgent $model): self {
        $this->model = $model;
        return $this;
    }

    /**
     * Get the value of view
     *
     * @return ViewAccueil
     */
    public function getView(): ViewAccueil {
        return $this->view;
    }

    /**
     * Set the value of view
     *
     * @param ViewAccueil $view
     *
     * @return self
     */
    public function setView(ViewAccueil $view): self {
        $this->view = $view;
        return $this;
    }

    //METHOD
    public function render(){
        //appeler le modèle pour récupérer la liste des agents
        $data = $this->model->findAll();

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

$model = new ModelAgent(new PDO("mysql:host=localhost;dbname=agent_manager","root","root",[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]));

$view = new ViewAccueil();

$controllerAccueil = new ControllerAccueil($model,$view);
$controllerAccueil->render();

