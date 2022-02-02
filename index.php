<?php
require_once 'db.php';
require_once 'player.php';

$inst = new DB();
$player = new Player();

$query = $inst->db->query('SELECT * FROM stats');
$response = $query->fetchall(\PDO::FETCH_ASSOC);

var_dump($_GET, $_POST);


if (isset($_POST['id'])){
    $player->updaterow($_POST['id']);
    header("Location: index.php");
    exit;
}

?>
<!-- <a href="index.php?create=true">Click me</a>
<a href="test.php">Click me</a> -->

<form action="index.php" method="post" target="_self">

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

<table>



<?php foreach ($response as $key => $row) { ?>
    <tr> <?php var_dump($row)?>
    <?php foreach ($row as $innerkey => $column){ ?>
        <td>
            <?php echo 'row :' . $key . ' -> ' . $innerkey . '=>' . $column;?>
        </td>
    <?php } ?> <td>
        <form action="index.php" method="post" target="_self">
            <input type="hidden" name="id" value="<?php echo $row["id"]?>">
            <button>Edit</button> 
        </form> 
    </td>
    </tr>
<?php } ?> 
</table>

