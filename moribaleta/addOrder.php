<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
include 'access.php';
  
$conn = OpenCon();

$eta = $_POST['item']['eta'];


$sql = "INSERT INTO orders (eta) values ($eta)";

$result = $conn->query($sql);

echo mysqli_error($conn);

if($result) {
    
    $sqlId = mysqli_insert_id($conn);

    echo $sqlId;
    

}
else
    echo "error";




CloseCon($conn);
?>