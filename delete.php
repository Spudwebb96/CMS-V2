<?php 
require_once 'db.php';
require_once 'player.php';

$inst = new DB();

$players = Player::indexof($inst);


if (isset($_POST["id"])){
    $id = $_POST["id"];
    $b = Player::show($inst,$id);
    $p = Player::delete($inst,$_POST["id"]);
    echo $b->getfirstname() . " " . $b->getlastname() . " with the id " . $b->getid() . " has been erased from the database.";

    

    
}
?>

<h1>Current Players :</h1>

<?php foreach ($players as $player) { ?>

    <table>
        <h2><?php echo $player->getid() . " " . $player->getfirstname() . " " . $player->getlastname()?></h2>
        <form action="delete.php" method="post" target="_self">
            <input type="hidden" name="id" value="<?php echo $player->getid()?>">
            <button>Delete</button> 
        </form> 
        
            <tr>  
                <td>PPG : </td>
                <td><?php echo $player->getppg() ?></td>
            </tr>

            <tr>  
                <td>RPG : </td>
                <td><?php echo $player->getrpg() ?></td>
            </tr>

            <tr>  
                <td>APG : </td>
                <td><?php echo $player->getapg() ?></td>
            </tr>

            <tr>  
                <td>SPG : </td>
                <td><?php echo $player->getspg() ?></td>
            </tr>

            <tr>  
                <td>TPG : </td>
                <td><?php echo $player->gettpg() ?></td>
            </tr>

            <tr>  
                <td>Team : </td>
                <td><?php echo $player->getteam() ?></td>
            </tr>

    </table>
    <?php };?>

