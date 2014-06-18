<?php
require_once("./classes/dataConnect.php");

$conn=new createConnection();
$connectDb=$conn->connectToDatabase();
$selectDb=$conn->selectDatabase();
$query="SELECT * FROM wp_users";
$result=$conn->selectRecords($query);
$numrows=$conn->numRecords($result);

if($numrows>0)
{
    ?>
<table>
    <tr>
        <th>ID</th>
        <th>user_login</th>
        <th>user_email</th>
    </tr>
<?php
    while ($row=  $conn->fetchRecords($result))
    {
?>
<tr>
    <td><?php echo $row[0];?></td>
    <td><?php echo $row[1];?></td>
    <td><?php echo $row[2];?></td>
</tr>
<?php
    }
?>
</table>
<?php
}
else
{
    echo "No records were found";
}
$conn->closeConnection();

?>