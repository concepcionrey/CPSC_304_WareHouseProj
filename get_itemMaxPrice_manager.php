`<html>
<body>
<?php
echo("running get_itemPriceGT script\r\n");
$conn = OCILogon("ora_r2e0b", "a55344148", "dbhost.ugrad.cs.ubc.ca:1522/ug");
$retrievePrice = $_GET["retrievePrice"];

$finalStr =
    "SELECT * FROM Item
    WHERE price > {$retrievePrice}";

echo($finalStr);

$stid = oci_parse($conn, $finalStr);
$x = oci_execute($stid);
?>

</body>
</html>