`<html>
<body>
<?php
$conn = OCILogon("ora_r2e0b", "a55344148", "dbhost.ugrad.cs.ubc.ca:1522/ug");

$finalStr =
    "select max(x) from (select avg(price) as x from item group by category)";

echo($finalStr);

$stid = oci_parse($conn, $finalStr);
$x = oci_execute($stid);
?>

</body>
</html>