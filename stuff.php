<?php 
require_once 'db.php';
// $db = new PDO('mysql:host=localhost;port=3306;dbname=superdb;', 'root', '');

// $sql = "INSERT INTO `stuff` (`a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`) VALUES ('asd', '1', 'asd', '1', '1', 'asd', '1', '1')";
// $stmt = $db->prepare("INSERT INTO `stuff` (`a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`) VALUES ('asd', '1', 'asd', '1', '1', 'asd', '1', '1')");
// $stmt->execute();

// var_dump($stmt);

class create
{
    // public function addrow($db)
    // {
    //     $sql = "INSERT INTO `stuff` (`a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`) VALUES ('asd', '1', 'asd', '1', '1', 'asd', '1', '1')";
    //     $stmt = $db->db->prepare("INSERT INTO `stuff` (`a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`) VALUES ('asd', '1', 'asd', '1', '1', 'asd', '1', '1')");
    //     $stmt->execute();        
    // }

    public function addrowm($db,$a,$b,$c,$d,$e,$f,$g,$h)
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
        echo $sql;      
    }

    public function updaterow($id)
    {
        $stmt = $this->db->prepare("UPDATE stats SET firstname = :firstname, lastname = :lastname, ppg = :ppg,
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
        $stmt->bindParam(':ppg', $ppg, \PDO::PARAM_INT);
        $stmt->bindParam(':rpg', $rpg, \PDO::PARAM_INT);
        $stmt->bindParam(':apg', $apg, \PDO::PARAM_INT);
        $stmt->bindParam(':spg', $spg, \PDO::PARAM_INT);
        $stmt->bindParam(':tpg', $tpg, \PDO::PARAM_INT);
        $stmt->bindParam(':team', $team, \PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);

        $stmt->execute();  
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

