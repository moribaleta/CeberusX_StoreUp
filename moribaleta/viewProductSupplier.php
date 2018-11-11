<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");

include 'access.php';
error_reporting(0);
$conn = OpenCon();
$supp_id = $_GET['id'];
$sql = "SELECT * FROM supplier where id=".$supp_id;

$result = $conn->query($sql);

$rows = array();
while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
}
print json_encode($rows);
 
CloseCon($conn);

?>
