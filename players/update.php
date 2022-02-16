<?php 
require_once 'db.php';
require_once 'player.php';

$inst = new DB();
$id = $_GET['id'];
$player = Player::show($inst,$id);

// if (isset($_POST['id'])){
//     $player->updaterow($_POST['id']);

// }

if (isset($_POST['update'])){
    $player->setfirstname($_POST['firstname']);
    $player->setlastname($_POST['lastname']);
    $player->setppg($_POST['ppg']);
    $player->setrpg($_POST['rpg']);
    $player->setapg($_POST['apg']);
    $player->setspg($_POST['spg']);
    $player->settpg($_POST['tpg']);
    $player->setteam($_POST['team']);
    $player->updaterow();

    // header("Location: index.php");
    // exit;
}

?>

<form action="update.php?id=<?php echo $player->getid()?>" method="post" target="_self">

    <input type="hidden" name="update" value="true">
    <input type="text" name="firstname" value="<?php echo $player->getfirstname()?>">    
    <input type="text" name="lastname" value="<?php echo $player->getlastname()?>">
    <input type="number" step="0.01" name="ppg" value="<?php echo $player->getppg()?>">
    <input type="number" step="0.01" name="rpg" value="<?php echo $player->getrpg()?>">
    <input type="number" step="0.01" name="apg" value="<?php echo $player->getapg()?>">
    <input type="number" step="0.01" name="spg" value="<?php echo $player->getspg()?>">
    <input type="number" step="0.01" name="tpg" value="<?php echo $player->gettpg()?>">
    <input type="text" step="0.01" name="team" value="<?php echo $player->getteam()?>">
    <button>XXX</button>

</form>