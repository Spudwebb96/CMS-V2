<?php 
require_once 'db.php';
require_once 'teams.php';

$inst = new DB();

$teams = Team::indexof($inst);


// if (isset($_POST["id"])){
//     $id = $_POST["id"];
//     $b = Team::show($inst,$id);
//     $b->delete(); 
//     echo $b->getfirstname() . " " . $b->getlastname() . " with the id " . $b->getid() . " has been erased from the database.";
// }

?>

<h1>Current Teams :</h1>

<?php foreach ($teams as $team) { ?>

    <table>
        <h2><?php echo $team->getid() . " "?><a href="get.php?id=<?php echo $team->getid()?>"><?php echo $team->getcity() . " " . $team->getteams()?></a></h2>
        <form action="list.php" method="post" target="_self">
            <input type="hidden" name="id" value="<?php echo $team->getid()?>">
            <button>Delete</button> 
        </form> 
        <a href="update.php?id=<?php echo $team->getid()?>">Edit</a>
            
        
            <tr>  
                <td>State : </td>
                <td><?php echo $team->getstate() ?></td>
            </tr>

            <tr>  
                <td>Wins : </td>
                <td><?php echo $team->getwins() ?></td>
            </tr>

            <tr>  
                <td>Loses : </td>
                <td><?php echo $team->getloses() ?></td>
            </tr>

            <tr>  
                <td>Stadium : </td>
                <td><?php echo $team->getstadium() ?></td>
            </tr>

    </table>
    <?php };?>
