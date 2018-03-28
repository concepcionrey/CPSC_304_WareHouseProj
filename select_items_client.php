<html>
<body>
<?php 
   $conn = OCILogon("ora_r2e0b", "a55344148", "dbhost.ugrad.cs.ubc.ca:1522/ug");            
    $updateAddress = $_POST["retrievePrice"];
    $myValue = $_POST["operator"];
   
    $finalStr = "SELECT * FROM Item WHERE price $myValue $updateAddress";
    echo($finalStr);
    
    $stid = oci_parse($conn, $finalStr);
    $x = oci_execute($stid);
?>

</body>
</html>
