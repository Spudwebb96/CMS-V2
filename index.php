<?php
require_once 'db.php';
require_once 'stuff.php';

$inst = new DB();
$update = new update();

$query = $inst->db->query('SELECT * FROM stats');
$response = $query->fetchall(\PDO::FETCH_ASSOC);

var_dump($_GET, $_POST);

// if (isset($_POST['update'])){
//     $update->addrow($inst);

// };

if (isset($_POST['update'])){
    $update->addrowm($inst,$_POST['firstname'],$_POST['lastname'],$_POST['ppg'],$_POST['rpg'],$_POST['apg'],$_POST['spg'],$_POST['tpg'],$_POST['team']);
    header("Location: index.php");
    exit;
};

?>
<!-- <a href="index.php?update=true">Click me</a>
<a href="test.php">Click me</a> -->

<form action="index.php" method="post" target="_self">

    <input type="hidden" name="update" value="true">
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
    <tr> 
    <?php foreach ($row as $innerkey => $column){ ?>
        <td>
            <?php echo 'row :' . $key . ' -> ' . $innerkey . '=>' . $column; ?>
        </td>
    <?php } ?> </tr>
    </tr>
<?php } ?> 
</table>