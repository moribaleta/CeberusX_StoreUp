<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
include 'access.php';

$conn = OpenCon();

$data = json_encode($_POST['data']);
$type = $_POST['type'];

$sql = "INSERT INTO history (data,type) values ($data,'".$type."')";

echo $sql;
$result = $conn->query($sql);

$message = "error";

if ($result) {
    $message = "success";
} 
echo mysqli_error($conn);

echo json_encode($message);

CloseCon($conn);

