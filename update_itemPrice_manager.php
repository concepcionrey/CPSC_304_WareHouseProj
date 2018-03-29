<html>
<body>
<?php
    $conn = OCILogon("ora_r2e0b", "a55344148", "dbhost.ugrad.cs.ubc.ca:1522/ug");
    $itemID = $_GET["IIDUpdatePrice"];
    $priceUpdate = $_GET["priceUpdate"];

    $finalStr = "UPDATE Item SET price = '{$priceUpdate}' WHERE IID = '{$itemID}'";

    $stid = oci_parse($conn, $finalStr);
    $x = oci_execute($stid);
    header('Location: ManagerView.php');
    exit;    
?>
</body>
</html>