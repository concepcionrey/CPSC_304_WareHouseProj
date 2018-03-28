`<html>
<body>
<?php
$conn = OCILogon("ora_r2e0b", "a55344148", "dbhost.ugrad.cs.ubc.ca:1522/ug");

$finalStr =
    "SELECT W.streetName, W.WID
    FROM warehouse_Located W
    WHERE NOT EXISTS (SELECT I.IID
    FROM Item I
    WHERE NOT EXISTS (SELECT S.IID
    FROM STORES S
    WHERE S.IID = I.IID
    AND S.WID = W.WID))";

$stid = oci_parse($conn, $finalStr);
$x = oci_execute($stid);
?>

</body>
</html>