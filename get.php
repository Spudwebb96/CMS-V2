<?php
require_once 'db.php';
require_once 'player.php';

$inst = new DB();
$id = $_GET['id'];

$p = Player::show($inst,$id)


?>
<h1><?php echo $p->getfirstname() . " " . $p->getlastname() ?></h1>

<table>
<tr>
        <td>Ppg</td>
        <td><?php echo $p->getppg() ?></td>
    </tr>    
    <tr>
        <td>Rpg</td>
        <td><?php echo $p->getrpg() ?></td>
    </tr>    
    <tr>
        <td>Apg</td>
        <td><?php echo $p->getapg() ?></td>
    </tr>    
    <tr>
        <td>Spg</td>
        <td><?php echo $p->getspg() ?></td>
    </tr>    
    <tr>
        <td>Tpg</td>
        <td><?php echo $p->gettpg() ?></td>
    </tr>    
    <tr>
        <td>Team</td>
        <td><?php echo $p->getteam() ?></td>
    </tr>    


    
</table>