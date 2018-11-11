<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header('Content-type: application/json');
include 'access.php';
 
$conn = OpenCon();


$sql = "SELECT * FROM orders";

$result = $conn->query($sql);

$rows = array();
while($r = mysqli_fetch_assoc   ($result)) {
    $rows[] = $r;
}
print json_encode($rows);
 
CloseCon($conn);

?>