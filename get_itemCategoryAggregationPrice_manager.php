<html>
<body>
<?php
$conn = OCILogon("ora_r2e0b", "a55344148", "dbhost.ugrad.cs.ubc.ca:1522/ug");
$op = $_POST["operator"];

$finalStr =
    "SELECT category, $op(price)
     FROM item GROUP BY category";


$result = executePlainSQL($finalStr);
printItemResult($result);

function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
    //echo "<br>running ".$cmdstr."<br>";
    global $conn, $success;
    $statement = OCIParse($conn, $cmdstr); //There is a set of comments at the end of the file that describe some of the OCI specific functions and how they work

    if (!$statement) {
        echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
        $e = OCI_Error($conn); // For OCIParse errors pass the
        // connection handle
        echo htmlentities($e['message']);
        $success = False;
    }

    $r = OCIExecute($statement, OCI_DEFAULT);
    if (!$r) {
        echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
        $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
        echo htmlentities($e['message']);
        $success = False;
    } else {

    }
    return $statement;
}

function printItemResult($result) { //prints results from a select statement
    echo "<table>";
    echo "<tr><th>Category</th><th>Price</th><th>";

    while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
        echo "<tr><td>" . $row[0] .
            "</td><td>" . $row[1] .
            "</td></tr>"; //or just use "echo $row[0]"
    }
    echo "</table>";

}

?>
<script type="text/javascript">
</script>
</body>
</html>