<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
include 'access.php';

$conn = OpenCon();

//var_dump($_POST);

$data = $_POST['data'];

$company = $data["Company"];
$del = $data["Delivery Lead Time"];
$cod = $data["Completeness of Delivery"];
$price = $data["Price"];
$over = $data["Overall Quality of Deliveries"];
$ase = $data["After sales Support"];
$score = $data['Score'];

$sql = "INSERT INTO `feedback` (`Company`,`DeliveryLeadTime`,`CompletenessofDelivery`,`OverallQualityofDeliveries`,`AftersalesSupport`,`Price`,`Score`) values ('".$company."',$del,$cod,$price,$over,$ase,$score)";

echo $sql;

$result = $conn->query($sql);

echo mysqli_error($conn);

if ($result) {
    print "success";
} else {
    echo "error";
}

CloseCon($conn);

