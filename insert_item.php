<html>
<body>
<?php 
   $conn = OCILogon("ora_r2e0b", "a55344148", "dbhost.ugrad.cs.ubc.ca:1522/ug");              
	//echo("running script");
    $insertID = $_GET["IIDInsert"]; 
    $itemCategory = $_GET["itemCategoryInsert"];
    $itemName = $_GET["nameInsert"];
    $itemPrice = $_GET["priceInsert"];
    $itemSupplyCode = $_GET["supplyCodeInsert"];
    $itemStock = $_GET["stockInsert"];
    
    //echo($itemCategory);
    $finalStr = "INSERT INTO Item (IID, category, name, price, supplierCode, itemStock) VALUES ('{$insertID}', '{$itemCategory}', '{$itemName}  ', {$itemPrice}, '{$itemSupplyCode}', {$itemStock})";
    //echo($finalStr);
    
    $stid = oci_parse($conn, $finalStr);
    $x = oci_execute($stid);
    header('Location: ManagerView.php');
    exit;
    
?>

</body>
</html>
