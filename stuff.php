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

    public function addrowm($db,$a,$b,$c,$d)
    {
        $sql = "INSERT INTO stuff (a,b,c,d) 
        VALUES (:a, :b, :c, :d)";
        $stmt = $db->db->prepare($sql);

        $stmt->bindParam(':a', $a, \PDO::PARAM_STR);
        $stmt->bindParam(':b', $b, \PDO::PARAM_INT);
        $stmt->bindParam(':c', $c, \PDO::PARAM_STR);
        $stmt->bindParam(':d', $d, \PDO::PARAM_INT);

        $stmt->execute();  
        echo $sql;      
    }
}
?>

