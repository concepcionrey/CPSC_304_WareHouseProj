<html>
<body>
<?php 
   $conn = OCILogon("ora_r2e0b", "a55344148", "dbhost.ugrad.cs.ubc.ca:1522/ug");              
    $orderIID = $_GET["IIDOrder"];
    $orderCLID = $_GET["CLIDOrder"]; 
    $orderOD = $_GET["ODOrder"];

    // TODO: $orderOD fails to preserve value
    echo($itemCategory);
    $finalStr = "INSERT INTO CONTAINS (IID, CLID, OD) VALUES ('{$orderIID}', '{$orderCLID}', '{$orderOD}')";
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
        echo "<tr><th>ID</th><th>Client ID</th><th>OD</th></th></tr>";

        while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
            echo "<tr><td>" . $row["IID"] . 
                "</td><td>" . $row["CLID"] . 
                "</td><td>" . $row["OD"] . 
                "</td></tr>"; //or just use "echo $row[0]" 
        }
        echo "</table>";
        
    }

    $stid = oci_parse($conn, $finalStr);
    $x = oci_execute($stid);
    header('Location: ClientView.php');
    exit;
?>

</body>
</html>