<?php
require_once 'db.php';
require_once 'player.php';

if (isset($_POST['create'])){
    $inst = new DB();
    $p = Player::create($inst,$_POST['firstname'],$_POST['lastname'],$_POST['ppg'],$_POST['rpg'],$_POST['apg'],$_POST['spg'],$_POST['tpg'],$_POST['team']);
    // header("Location: create.php");
    // exit;
    echo "The new created player is " . $p->getfirstname() . " " . $p->getlastname() . " with the id " . $p->getid();
};
?>

<form action="create.php" method="post" target="_self">

    <input type="hidden" name="create" value="true">
    <input type="text" name="firstname" value="Mike">    
    <input type="text" name="lastname" value="Jordan">
    <input type="number" step="0.01" name="ppg" value="23">
    <input type="number" step="0.01" name="rpg" value="23">
    <input type="number" step="0.01" name="apg" value="23">
    <input type="number" step="0.01" name="spg" value="23">
    <input type="number" step="0.01" name="tpg" value="23">
    <input type="text" step="0.01" name="team" value="Bulls">
    <button>XXX</button>

</form>