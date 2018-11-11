<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
include 'access.php';
  
$conn = OpenCon();

//var_dump($_POST);
$id = $_POST['ID'];

$productlist = $_POST['product_list'];

  
$values = "";
        
foreach($productlist as $product){
        $prodId = $product['ID'];
        $values = $values."($id, $prodId),";
}

$values = substr($values, 0,-1);        

$sql = "INSERT INTO product_list (orderid,product_id) values $values";

        
$result = $conn->query($sql);
        
echo mysqli_error($conn);


if($result)
    print "success";
 
else
    echo "error";




CloseCon($conn);
?>