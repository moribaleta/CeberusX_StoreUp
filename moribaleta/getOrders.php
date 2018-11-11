<?php

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