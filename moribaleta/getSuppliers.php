<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header('Content-type: application/json');

include 'access.php';
error_reporting(0);
$conn = OpenCon();

$saved = $_GET['saved'];

$sql = "";

if($saved == "YES") {
    $sql = "SELECT * FROM supplier where saved = $saved";
}else if($saved == "NO"){
    $sql = "SELECT * FROM supplier where saved = $saved";
}else{
    $sql = "SELECT * FROM supplier";
}

$result = $conn->query($sql);

$rows = array();
while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
}
print json_encode($rows);
 
CloseCon($conn);



?>
