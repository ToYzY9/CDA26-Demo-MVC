<?php 
class DatabaseManager {
    private string $db_server;
    private string $db_username;
    private string $db_password;
    private string $db_name;
    private ?PDO $pdo = null;

    public function __construct(string $pDb_server, string $pDb_username, string $pDb_password, string $pDb_name) {
        $this->db_server = $pDb_server;
        $this->db_username = $pDb_username;
        $this->db_password = $pDb_password;
        $this->db_name = $pDb_name;
    }

    public function connexion() : ?PDO {
        if ($this->pdo === null) {
            try{
                //Création du PDO
                $pdoConnect = new PDO("mysql:host=" . $this->db_server . ";dbname=" . $this->db_name, $this->db_username, $this->db_password);
                // Set the PDO error mode to exception
                $pdoConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo = $pdoConnect;
                return ($this->pdo);
            } catch(PDOException $e){
                http_response_code(500);
                die("ERROR: Could not connect. " . $e->getMessage());
            }
        }
        return $this->pdo;
    }

    public function deconnexion(){
       $this->pdo = null;
    }

    function execute(string $request) : mixed 
    {
        $stmt = $this->connexion()->prepare($request);
        $stmt->execute();
        return $stmt;
    }
    

}
