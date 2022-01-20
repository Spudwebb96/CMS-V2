<?php
require_once 'db.php';
require_once 'stuff.php';

$inst = new DB();
$update = new update();

$query = $inst->db->query('SELECT * FROM stuff');
$response = $query->fetchall(\PDO::FETCH_ASSOC);

var_dump($_GET);
?>
<a href="index.php?update=true">Click me</a>
<a href="test.php">Click me</a>
<form action="" method="get" target="_self">
    <input method="get" type="submit" action="test.php"></input>
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



