`<html>
<body>
<?php 
   $conn = OCILogon("ora_r2e0b", "a55344148", "dbhost.ugrad.cs.ubc.ca:1522/ug");              
    $insertID = $_GET["IIDOrder"]; 

    // TODO: $finalStr is probably wrong, send halp
    echo($itemCategory);
    $finalStr = "INSERT INTO CONTAINS (IID, CLID, OD) VALUES ('{$insertID}')";
    echo($finalStr);
    
    $stid = oci_parse($conn, $finalStr);
    $x = oci_execute($stid);
?>

</body>
</html>