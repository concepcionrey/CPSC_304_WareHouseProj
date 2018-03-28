<html>
<body>
<?php
$conn = OCILogon("ora_r2e0b", "a55344148", "dbhost.ugrad.cs.ubc.ca:1522/ug");

$finalStr = "SELECT streetName, W.WID, IID
              FROM Warehouse_Located W, Stores S
              WHERE w.WID = S.WID";

echo($finalStr);

$stid = oci_parse($conn, $finalStr);
$x = oci_execute($stid);
?>

</body>
</html>