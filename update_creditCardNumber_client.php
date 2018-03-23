<html>
<body>
<?php
    $conn = OCILogon("ora_r2e0b", "a55344148", "dbhost.ugrad.cs.ubc.ca:1522/ug");
    $updateCreditCard = $_GET["creditCardNumberUpdate"];

    $finalStr = "UPDATE Client_Lives_in SET creditCardNum = {$updateCreditCard} WHERE CLID = {$updateCreditCard}";
    echo($finalStr);
    $stid = oci_parse($conn, $finalStr);
    $x = oci_execute($stid);  
?>
</body>
</html>