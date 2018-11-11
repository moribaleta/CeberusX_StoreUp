<?php
header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
//header('Content-type: application/json');
include 'access.php';
error_reporting(0);


$conn = OpenCon();
$search = $_POST['search'];


$sql = "SELECT * FROM `feedback` WHERE `Company` LIKE '%".$search."%' ORDER BY `Score` DESC LIMIT 10";


$result = $conn->query($sql);

$rows = array();
while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
}
print json_encode($rows);
 


CloseCon($conn);
?>
    