<html>
<body>
<?php
    $conn = OCILogon("ora_r2e0b", "a55344148", "dbhost.ugrad.cs.ubc.ca:1522/ug");
    $updateCreditCard = $_GET["creditCardNumberUpdate"];
    $clientCLID = $_GET["CLIDupdate"];

    $finalStr = "UPDATE Client_Lives_in SET creditCardNum = {$updateCreditCard} WHERE CLID = {$clientCLID}";
    //echo($finalStr);
    $stid = oci_parse($conn, $finalStr);
    $x = oci_execute($stid);  

    $printStr = "SELECT * FROM Client_Lives_in";
    $result = executePlainSQL($printStr);
    printContains($result);

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
    
    function printContains($result) { //prints results from a select statement
        // echo "<br>Item Table:";
        echo "<table>";
        echo "<tr><th>Client ID</th><th>City ID</th><th>Billing Address</th><th>Name</th><th>Credit Card Number</th><th>Email</th><th>Cellphone Number</th></tr>";

        while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
            echo "<tr><td>" . $row["CLID"] . 
                "</td><td>" . $row["CID"] .
                "</td><td>" . $row["BILLINGADDRESS"] .
                "</td><td>" . $row["NAME"] .
                "</td><td>" . $row["CREDITCARDNUM"] .
                "</td><td>" . $row["EMAIL"] .
                "</td><td>" . $row["CELLNUM"] .
                "</td></tr>"; //or just use "echo $row[0]" 
        }
        echo "</table>";
    }

?>
</body>
</html>