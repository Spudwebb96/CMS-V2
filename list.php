<?php
require_once 'db.php';
require_once 'player.php';

$inst = new DB();

$players = Player::indexof($inst);
?>

<ul>
    <?php foreach ($players as $player){?> 
    <li><a href="get.php?id=<?php echo $player->getid()?>"> <?php echo $player->getfirstname() . " " . $player->getlastname()?></a></li>
    <?php } ?>
</ul>