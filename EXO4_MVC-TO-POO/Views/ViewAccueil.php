<?php 
class viewAccueil {
    private string $message = "";
    private array $listAgents = [];


 public function getMessage()
{
  return $this->message;
}

 public function setMessage(string $pMessage):self
{
    $this->message = $pMessage;
    return $this;
}

public function getListAgents()
{
    return $this->listAgents;
}
public function setListAgents(array $pListAgents):self
{
    $this->listAgents = $pListAgents;
    return $this;
}

//View : s'occuper de l'affichage de la page listant les agents
//Déclaration des variables d'affichage
public function display():void {
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
                            foreach($this->listAgents as $agent){
                        ?>
                                <li><?=(htmlspecialchars($agent['name'])." - ".htmlspecialchars($agent['archetype'])." - ".htmlspecialchars($agent['dob'])." - ".htmlspecialchars($agent['created_at'])." - ".htmlspecialchars($agent['tier']));?></li>
                        <?php
                            }
                        ?>
                    </ul>
                    <p><?=$this->message;?></p>
                </section>
            </main>
        </body>
        </html>
    <?php
}



 




}
