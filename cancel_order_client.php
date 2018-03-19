`<html>
<body>
<?php 
   $conn = OCILogon("ora_r2e0b", "a55344148", "dbhost.ugrad.cs.ubc.ca:1522/ug");            
    $cancelOD = $_GET["cancelOrderID"];
   
    // TODO check if right
    echo($itemCategory);
    $finalStr = "DELETE FROM Order_Makes WHERE OID ='$cancelOD';
    echo($finalStr);
    
    $stid = oci_parse($conn, $finalStr);
    $x = oci_execute($stid);
?>

</body>
</html>
