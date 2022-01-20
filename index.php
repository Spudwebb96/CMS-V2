<?php
require_once 'db.php';
require_once 'stuff.php';

$inst = new DB();
$update = new update();

$query = $inst->db->query('SELECT * FROM stuff');
$response = $query->fetchall(\PDO::FETCH_ASSOC);

var_dump($_GET, $_POST);

if (isset($_GET['update'])){
    $update->addrow($inst);
    header("Location: index.php");
    exit;
}

?>
<a href="index.php?update=true">Click me</a>
<a href="test.php">Click me</a>

<form action="index.php?update=true" method="post" target="_self">

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



