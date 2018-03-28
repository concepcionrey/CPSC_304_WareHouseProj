<html>
<body>
<?php 
   $conn = OCILogon("ora_r2e0b", "a55344148", "dbhost.ugrad.cs.ubc.ca:1522/ug");            
    $updateAddress = $_GET["addressUpdate"];
    $clientCLID = $_GET["CLIDupdate"];
   
    // TODO check if right
    echo($itemCategory);
    $finalStr = "UPDATE Client_Lives_in SET billingAddress = {$updateAddress} WHERE CLID =$clientCLID";
    echo($finalStr);
    
    $stid = oci_parse($conn, $finalStr);
    $x = oci_execute($stid);
?>

</body>
</html>
