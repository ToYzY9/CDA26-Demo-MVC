<?php
//View : s'occuper de l'affichage de la page listant les agents
class ViewAccueil {
    //ATTRIBUT
    private array $listAgents = [];
    private string $message = "";

    //CONSTRUCTEUR

    //GETTER ET SETTER
    /**
     * Get the value of listAgents
     *
     * @return array
     */
    public function getListAgents(): array {
        return $this->listAgents;
    }

    /**
     * Set the value of listAgents
     *
     * @param array $listAgents
     *
     * @return self
     */
    public function setListAgents(array $listAgents): self {
        $this->listAgents = $listAgents;
        return $this;
    }

    /**
     * Get the value of message
     *
     * @return string
     */
    public function getMessage(): string {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @param string $message
     *
     * @return self
     */
    public function setMessage(string $message): self {
        $this->message = $message;
        return $this;
    }

    //METHOD
    //Déclaration des variables d'affichage
    public function display(){
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
                                <li><?php 
                                //Affichage des données avec nettoyage du code malveillant
                                echo(htmlspecialchars($agent['name'])." - ".htmlspecialchars($agent['archetype'])." - ".htmlspecialchars($agent['dob'])." - ".htmlspecialchars($agent['created_at'])." - ".htmlspecialchars($agent['tier'])) ?></li>
                        <?php
                            }
                        ?>
                    </ul>
                    <p><?php echo $this->message ?></p>
                </section>
            </main>
        </body>
        </html>

<?php
    }

    
}