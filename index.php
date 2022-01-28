<?php
require_once 'db.php';
require_once 'stuff.php';

$inst = new DB();
$update = new update();

$query = $inst->db->query('SELECT * FROM stuff');
$response = $query->fetchall(\PDO::FETCH_ASSOC);

var_dump($_GET, $_POST);

// if (isset($_POST['update'])){
//     $update->addrow($inst);

// };

if (isset($_POST['update'])){
    $update->addrowm($inst,$_POST['a'],$_POST['b'],$_POST['c'],$_POST['d']);
    header("Location: index.php");
    exit;
};

?>
<!-- <a href="index.php?update=true">Click me</a>
<a href="test.php">Click me</a> -->

<form action="index.php" method="post" target="_self">

    <input type="hidden" name="update" value="true">
    <input type="text" name="a" value="asd">
    <input type="number" name="b" value="2">
    <input type="text" name="c" value="asd">
    <input type="number" name="d" value="3">
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



