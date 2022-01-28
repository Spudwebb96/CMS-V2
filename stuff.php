<?php 
require_once 'db.php';
// $db = new PDO('mysql:host=localhost;port=3306;dbname=superdb;', 'root', '');

// $sql = "INSERT INTO `stuff` (`a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`) VALUES ('asd', '1', 'asd', '1', '1', 'asd', '1', '1')";
// $stmt = $db->prepare("INSERT INTO `stuff` (`a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`) VALUES ('asd', '1', 'asd', '1', '1', 'asd', '1', '1')");
// $stmt->execute();

// var_dump($stmt);

class update
{
    public function addrow($db)
    {
        $sql = "INSERT INTO `stuff` (`a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`) VALUES ('asd', '1', 'asd', '1', '1', 'asd', '1', '1')";
        $stmt = $db->db->prepare("INSERT INTO `stuff` (`a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`) VALUES ('asd', '1', 'asd', '1', '1', 'asd', '1', '1')");
        $stmt->execute();        
    }

    public function addrowm($db,$a,$b,$c,$d,$e,$f,$g,$h)
    {
        $sql = "INSERT INTO stuff ('First Name','Last Name','PPG','RPG','APG','SPG','TPG','Team') 
        VALUES (':First Name',':Last Name',:PPG,:RPG,:APG,:SPG,:TPG,:Team)";
        $stmt = $db->db->prepare($sql);

        $stmt->bindParam(':First Name', $a, \PDO::PARAM_STR);
        $stmt->bindParam(':Last Name', $b, \PDO::PARAM_STR);
        $stmt->bindParam(':PPG', $c, \PDO::PARAM_INT);
        $stmt->bindParam(':RPG', $d, \PDO::PARAM_INT);
        $stmt->bindParam(':APG', $e, \PDO::PARAM_INT);
        $stmt->bindParam(':SPG', $f, \PDO::PARAM_INT);
        $stmt->bindParam(':TPG', $g, \PDO::PARAM_INT);
        $stmt->bindParam(':Team', $h, \PDO::PARAM_STR);

        $stmt->execute();  
        echo $sql;      
    }
}
?>

