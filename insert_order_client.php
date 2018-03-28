<html>
<body>
<?php 
   $conn = OCILogon("ora_r2e0b", "a55344148", "dbhost.ugrad.cs.ubc.ca:1522/ug");              
    $orderIID = $_GET["IIDOrder"];
    $orderCLID = $_GET["CLIDOrder"]; 
    $orderOD = $_GET["ODOrder"];

    // TODO: $orderOD fails to preserve value
    echo($itemCategory);
    $finalStr = "INSERT INTO CONTAINS (IID, CLID, OD) VALUES ('{$orderIID}', '{$orderCLID}', '{$orderOD}')";
    echo($finalStr);
    
    $stid = oci_parse($conn, $finalStr);
    $x = oci_execute($stid);
?>

</body>
</html>