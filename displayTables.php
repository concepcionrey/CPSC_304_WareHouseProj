<html>
<body>
<?php

    $conn = OCILogon("ora_r2e0b", "a55344148", "dbhost.ugrad.cs.ubc.ca:1522/ug"); 
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
        // echo "<br>Item Table:";
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Category</th><th>Supplier Code</th><th>Item Stock</th><th>Price</th></tr>";

        while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
            echo "<tr><td>" . $row["IID"] . 
                "</td><td>" . $row["NAME"] . 
                "</td><td>" . $row["CATEGORY"] . 
                "</td><td>" . $row["SUPPLIERCODE"] . 
                "</td><td>" . $row["ITEMSTOCK"] . 
                "</td><td>" . $row["PRICE"] . 
                "</td></tr>"; //or just use "echo $row[0]" 
        }
        echo "</table>";
    }
    
    function printCityResult($result) { //prints results from a select statement
        // echo "<br>Item Table:";
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Country</th><th>Region</th></tr>";

        while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
            echo "<tr><td>" . $row["CID"] . 
                "</td><td>" . $row["NAME"] . 
                "</td><td>" . $row["COUNTRY"] . 
                "</td><td>" . $row["REGION"] . 
                "</td></tr>"; //or just use "echo $row[0]" 
        }
        echo "</table>";
    }
    
    function printClient_Lives_InResult($result) { //prints results from a select statement
        // echo "<br>Item Table:";
        echo "<table>";
        echo "<tr><th>CLID</th><th>CID</th><th>billingAddress</th><th>Name</th><th>creditCardNum</th><th>Email</th><th>cellnum</th></tr>";

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
    
    function printWarehouse_LocatedResult($result) { //prints results from a select statement
        // echo "<br>Item Table:";
        echo "<table>";
        echo "<tr><th>WID</th><th>CID</th><th>streetName</th><th>postalCode</th><th>numOfEmployees</th><th>numOfForklift</th></tr>";

        while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
            echo "<tr><td>" . $row["WID"] . 
                "</td><td>" . $row["CID"] . 
                "</td><td>" . $row["STREETNAME"] . 
                "</td><td>" . $row["POSTALCODE"] . 
                "</td><td>" . $row["NUMOFEMPLOYEES"] .
                "</td><td>" . $row["NUMOFFORKLIFT"] .
                "</td></tr>"; //or just use "echo $row[0]" 
        }
        echo "</table>";
    }
    
    function printOrder_Makes($result) { //prints results from a select statement
        // echo "<br>Item Table:";
        echo "<table>";
        echo "<tr><th>CLID</th><th>OD</th><th>ISSHIPPED</th><th>SHIPPINGADDRESS</th><th>DESIREDTIME</th><th>EXPECTEDDELIVERYTIME</th><th>ISDELIVERED</th></tr>";

        while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
            echo "<tr><td>" . $row["CLID"] . 
                "</td><td>" . $row["OD"] . 
                "</td><td>" . $row["ISSHIPPED"] . 
                "</td><td>" . $row["SHIPPINGADDRESS"] . 
                "</td><td>" . $row["DESIREDTIME"] .
                "</td><td>" . $row["EXPECTEDDELIVERYTIME"] .
                "</td><td>" . $row["ISDELIVERED"] .
                "</td></tr>"; //or just use "echo $row[0]" 
        }
        echo "</table>";
    }
    
    function printStores($result) { //prints results from a select statement
        // echo "<br>Item Table:";
        echo "<table>";
        echo "<tr><th>WID</th><th>IID</th></tr>";

        while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
            echo "<tr><td>" . $row["WID"] . 
                "</td><td>" . $row["IID"] .
                "</td></tr>"; //or just use "echo $row[0]" 
        }
        echo "</table>";
    }
    
    function printContains($result) { //prints results from a select statement
        // echo "<br>Item Table:";
        echo "<table>";
        echo "<tr><th>IID</th><th>CLID</th></tr>";

        while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
            echo "<tr><td>" . $row["IID"] . 
                "</td><td>" . $row["CLID"] .
                "</td></tr>"; //or just use "echo $row[0]" 
        }
        echo "</table>";
    }
    
    
    $getStr = "SELECT * FROM Item";
    $result = executePlainSQL($getStr);
    printItemResult($result);
    
    $getStrCity = "SELECT * From City";
    $result = executePlainSql($getStrCity);
    printCityresult($result);
    
    $getStrLives = "SELECT * From Client_Lives_In";
    $result = executePlainSql($getStrLives);
    printClient_Lives_InResult($result);
    
    $getStrWarehouse = "SELECT * From Warehouse_Located";
    $result = executePlainSql($getStrWarehouse);
    printWarehouse_LocatedResult($result);
    
    $getStrOrder = "SELECT * From Order_Makes";
    $result = executePlainSql($getStrOrder);
    printOrder_Makes($result);
    
    $getStrStores = "SELECT * From STORES";
    $result = executePlainSql($getStrStores);
    printStores($result);
    
    $getStrContains = "SELECT * From CONTAINS";
    $result = executePlainSql($getStrContains);
    printContains($result);
?>
</body>
</html>