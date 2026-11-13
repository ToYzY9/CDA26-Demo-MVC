<?php 
class AgentRepository {

    private Agent $agent;
    private DatabaseManager $db;

    public function __construct(DatabaseManager $pDb) {
        $this->db = $pDb;
    }

    function findAllAgent() {
        try {
            //Préparation de la requête
            $request = $this->db->execute("SELECT a.Id_Agent, a.name, a.dob, a.created_at, t.tier, ac.archetype, te.team_name FROM agents a INNER JOIN tiers t ON t.Id_Tier = a.Id_Tier INNER JOIN archetypes ac ON ac.Id_Archetype = a.Id_Archetype LEFT JOIN Teams te ON te.Id_Team = a.Id_Team");
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
