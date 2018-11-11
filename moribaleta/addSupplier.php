<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
include 'access.php';

$conn = OpenCon();
$item = $_POST['item'];
$name = $item['name'];
$contactnumber = $item['contactnumber'];
$address = $item['address'];
$contact = $item['contact'];
$tin = $item['tin'];
$saved = $item['saved'];
//$sql = "SELECT * FROM suppliers";

$sql = "insert into supplier (Name,ContactNumber,Address,Contact,Tin,Saved) values('".$name."','".$contactnumber."','".$address."','".$contact."','".$tin."','".$saved."')";


$result = $conn->query($sql);

echo mysqli_error($conn);
$message = "error";

if ($result) {
    $message = "success";
} 

echo json_encode($message);

CloseCon($conn);
