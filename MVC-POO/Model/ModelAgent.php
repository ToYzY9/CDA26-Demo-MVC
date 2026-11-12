<?php
//Model : Communiquer avec la BDD pour ce qui concerne les Agents
//EN POO : il doit modéliser la table de la BDD -> pouvoir créer un objet à partir de cette table

class ModelAgent{
    //ATTRIBUT : on reprend les données de la table agents, et on rajoute aussi le pdo pour lui permettre de l'utiliser
    private int $id;
    private string $name;
    private string $dob;
    private string $createdAt;
    private string $archetype;
    private string $tier;
    private string $team;
    private PDO $pdo;

    //CONSTRUCTEUR
    //Ici, on ne donne que le PDO, configuré avec le moins de privilège possible. En effet, on ne connait pas tout le temps les autres données de l'objet
    public function __construct(PDO $newPDO){ // <- injection de dépendance : le fait de passer la construction d'un objet au sein du constructeur de la classe qui l'utilise
        $this->pdo = $newPDO;
    }


    //GETTER ET SETTER
    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of name
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the value of dob
     *
     * @return string
     */
    public function getDob(): string {
        return $this->dob;
    }

    /**
     * Set the value of dob
     *
     * @param string $dob
     *
     * @return self
     */
    public function setDob(string $dob): self {
        $this->dob = $dob;
        return $this;
    }

    /**
     * Get the value of createdAt
     *
     * @return string
     */
    public function getCreatedAt(): string {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @param string $createdAt
     *
     * @return self
     */
    public function setCreatedAt(string $createdAt): self {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Get the value of archetype
     *
     * @return string
     */
    public function getArchetype(): string {
        return $this->archetype;
    }

    /**
     * Set the value of archetype
     *
     * @param string $archetype
     *
     * @return self
     */
    public function setArchetype(string $archetype): self {
        $this->archetype = $archetype;
        return $this;
    }

    /**
     * Get the value of tier
     *
     * @return string
     */
    public function getTier(): string {
        return $this->tier;
    }

    /**
     * Set the value of tier
     *
     * @param string $tier
     *
     * @return self
     */
    public function setTier(string $tier): self {
        $this->tier = $tier;
        return $this;
    }

    /**
     * Get the value of team
     *
     * @return string
     */
    public function getTeam(): string {
        return $this->team;
    }

    /**
     * Set the value of team
     *
     * @param string $team
     *
     * @return self
     */
    public function setTeam(string $team): self {
        $this->team = $team;
        return $this;
    }

    /**
     * Get the value of pdo
     *
     * @return PDO
     */
    public function getPdo(): PDO {
        return $this->pdo;
    }

    /**
     * Set the value of pdo
     *
     * @param PDO $pdo
     *
     * @return self
     */
    public function setPdo(PDO $pdo): self {
        $this->pdo = $pdo;
        return $this;
    }

    //METHOD
    public function findAll(){
        try{
            //Préparation de la requête : je récupère le PDO à partir de l'attribut pdo
            $request = $this->pdo->prepare("SELECT a.Id_Agent, a.name, a.dob, a.created_at, t.tier, ac.archetype, te.team_name FROM agents a INNER JOIN tiers t ON t.Id_Tier = a.Id_Tier INNER JOIN archetypes ac ON ac.Id_Archetype = a.Id_Archetype LEFT JOIN Teams te ON te.Id_Team = a.Id_Team");

            //Execution
            $request->execute();

            //Récupère
            return $request->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $error){
            http_response_code(500);
            return $error->getMessage();
        }
    }

    
}