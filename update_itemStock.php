`<html>
<body>
<?php
    echo("running update_itemStock script\r\n");
    $conn = OCILogon("ora_r2e0b", "a55344148", "dbhost.ugrad.cs.ubc.ca:1522/ug");
    $itemID = $_GET["IIDUpdateStock"];
    $stockUpdate = $_GET["stockUpdate"];

    $finalStr = "UPDATE Item SET itemStock = {$stockUpdate} WHERE IID = {$itemID}";

    echo($finalStr);

    $stid = oci_parse($conn, $finalStr);
    $x = oci_execute($stid);
?>

</body>
</html>