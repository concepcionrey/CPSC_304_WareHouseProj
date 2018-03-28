`<html>
<body>
<?php
$conn = OCILogon("ora_r2e0b", "a55344148", "dbhost.ugrad.cs.ubc.ca:1522/ug");
$IID = $_GET["deleteIID"];

$finalStr =
    "DELETE * FROM Item
    WHERE IID = '{$IID}'";

echo($finalStr);

$stid = oci_parse($conn, $finalStr);
$x = oci_execute($stid);
?>

</body>
</html>