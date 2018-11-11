<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
include 'access.php';

$conn = OpenCon();

$name = $_POST['name'];
$supplier = $_POST['supplier'];
$type = $_POST['type'];

//$sql = "SELECT * FROM suppliers";

$sql = "insert into product (name,supplier,type) values('" . $name . "','" . $supplier . "','" . $type . "')";

$result = $conn->query($sql);

if ($result) {
    echo "success";
} else {
    echo "error";
}

CloseCon($conn);
