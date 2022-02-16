<?php 
require_once 'db.php';
// $db = new PDO('mysql:host=localhost;port=3306;dbname=superdb;', 'root', '');

// $sql = "INSERT INTO `stuff` (`a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`) VALUES ('asd', '1', 'asd', '1', '1', 'asd', '1', '1')";
// $stmt = $db->prepare("INSERT INTO `stuff` (`a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`) VALUES ('asd', '1', 'asd', '1', '1', 'asd', '1', '1')");
// $stmt->execute();

// var_dump($stmt);

class Player
{
    private string $id;
    private string $firstname;
    private string $lastname;
    private string $ppg;
    private string $rpg;
    private string $apg;
    private string $spg;
    private string $tpg;
    private string $team;
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public static function create($db,$a,$b,$c,$d,$e,$f,$g,$h)
    {
        $sql = "INSERT INTO stats (firstname,lastname,ppg,rpg,apg,spg,tpg,team) 
        VALUES (:firstname,:lastname,:ppg,:rpg,:apg,:spg,:tpg,:team)";
        $stmt = $db->db->prepare($sql);

        $stmt->bindParam(':firstname', $a, \PDO::PARAM_STR);
        $stmt->bindParam(':lastname', $b, \PDO::PARAM_STR);
        $stmt->bindParam(':ppg', $c, \PDO::PARAM_INT);
        $stmt->bindParam(':rpg', $d, \PDO::PARAM_INT);
        $stmt->bindParam(':apg', $e, \PDO::PARAM_INT);
        $stmt->bindParam(':spg', $f, \PDO::PARAM_INT);
        $stmt->bindParam(':tpg', $g, \PDO::PARAM_INT);
        $stmt->bindParam(':team', $h, \PDO::PARAM_STR);

        $stmt->execute();  

        $id = $db->db->lastInsertId();

        $player = new Player($db);
        $player->setfirstname($a);
        $player->setlastname($b);
        $player->setppg($c);
        $player->setrpg($d);
        $player->setapg($e);
        $player->setspg($f);
        $player->settpg($g);
        $player->setteam($h);
        $player->setid($id);
        
        return $player;
        
    }

    public function updaterow()
    {
        $stmt = $this->db->db->prepare("UPDATE stats SET firstname = :firstname, lastname = :lastname, ppg = :ppg,
         rpg = :rpg, apg = :apg, spg = :spg, tpg = :tpg, team = :team WHERE id = :id");

        $firstname = $this->getfirstname();
        $lastname = $this->getlastname();
        $ppg = $this->getppg();
        $rpg = $this->getrpg();
        $apg = $this->getapg();
        $spg = $this->getspg();
        $tpg = $this->gettpg();
        $team = $this->getteam();
        $id = $this->getid();

        $stmt->bindParam(':firstname', $firstname, \PDO::PARAM_STR);
        $stmt->bindParam(':lastname', $lastname, \PDO::PARAM_STR);
        $stmt->bindParam(':ppg', $ppg);
        $stmt->bindParam(':rpg', $rpg);
        $stmt->bindParam(':apg', $apg);
        $stmt->bindParam(':spg', $spg);
        $stmt->bindParam(':tpg', $tpg);
        $stmt->bindParam(':team', $team, \PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);

        $stmt->execute();  
    }

    public static function show($db,$id)
    {
        $stmt = $db->db->prepare("SELECT * from stats where id = :id");

        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);

        $stmt->execute(); 
        $res = $stmt->fetch(\PDO::FETCH_ASSOC);  
        
        $player = new Player($db);
        $player->setfirstname($res['firstname']);
        $player->setlastname($res['lastname']);
        $player->setppg($res['ppg']);
        $player->setrpg($res['rpg']);
        $player->setapg($res['apg']);
        $player->setspg($res['spg']);
        $player->settpg($res['tpg']);
        $player->setteam($res['team']);
        $player->setid($res['id']);

        return $player;

    }

    public static function indexof($db)
    
    {
        $stmt = $db->db->prepare("SELECT * from stats");
        $stmt->execute(); 
        $data = $stmt->fetchall(\PDO::FETCH_ASSOC); 

        $array = array();
        foreach ($data as $row){
            $player = new Player($db);
            $player->setfirstname($row['firstname']);
            $player->setlastname($row['lastname']);
            $player->setppg($row['ppg']);
            $player->setrpg($row['rpg']);
            $player->setapg($row['apg']);
            $player->setspg($row['spg']);
            $player->settpg($row['tpg']);
            $player->setteam($row['team']);
            $player->setid($row['id']);
            
            array_push($array, $player);
        }

        return $array;

    }

    public function delete()
    {
        $sql = $this->db->db->prepare("DELETE FROM stats WHERE id = :id ");
        
        $id = $this->getid();

        $sql->bindParam(':id', $id, \PDO::PARAM_INT);

        $sql->execute();

        // $player = new Player();
        // $player->setid('id');

    }

    public static function update($id)
    {
        //
    }

    public function getfirstname(): string
    {
        return $this->firstname;
    }

    public function setfirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getlastname(): string
    {
        return $this->lastname;
    }

    public function setlastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getppg(): string
    {
        return $this->ppg;
    }

    public function setppg(string $ppg): void
    {
        $this->ppg = $ppg;
    }

    public function getrpg(): string
    {
        return $this->rpg;
    }

    public function setrpg(string $rpg): void
    {
        $this->rpg = $rpg;
    }

    public function getapg(): string
    {
        return $this->apg;
    }

    public function setapg(string $apg): void
    {
        $this->apg = $apg;
    }

    public function getspg(): string
    {
        return $this->spg;
    }

    public function setspg(string $spg): void
    {
        $this->spg = $spg;
    }

    public function gettpg(): string
    {
        return $this->tpg;
    }

    public function settpg(string $tpg): void
    {
        $this->tpg = $tpg;
    }

    public function getteam(): string
    {
        return $this->team;
    }

    public function setteam(string $team): void
    {
        $this->team = $team;
    }
    
    public function getid(): string
    {
        return $this->id;
    }

    public function setid(string $id): void
    {
        $this->id = $id;
    }
}
?>

