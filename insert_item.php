<html>
<body>
<?php 
   $conn = OCILogon("ora_r2e0b", "a55344148", "dbhost.ugrad.cs.ubc.ca:1522/ug");

    $insertID = $_GET["IIDInsert"]; 
    $itemCategory = $_GET["itemCategoryInsert"];
    $itemName = $_GET["nameInsert"];
    $itemPrice = $_GET["priceInsert"];
    $itemSupplyCode = $_GET["supplyCodeInsert"];
    $itemStock = $_GET["stockInsert"];
    
    //echo($itemCategory);
    $finalStr = "INSERT INTO Item (IID, category, name, price, supplierCode, itemStock) VALUES ('{$insertID}', '{$itemCategory}', '{$itemName}  ', {$itemPrice}, '{$itemSupplyCode}', {$itemStock})";
    //echo($finalStr);
    
    $stid = oci_parse($conn, $finalStr);
    $x = oci_execute($stid);
    header('Location: ManagerView.php');
    exit;
    
    
//    function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
//        //echo "<br>running ".$cmdstr."<br>";
//        global $conn, $success;
//        $statement = OCIParse($conn, $cmdstr); //There is a set of comments at the end of the file that describe some of the OCI specific functions and how they work
//
//        if (!$statement) {
//            echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
//            $e = OCI_Error($conn); // For OCIParse errors pass the       
//            // connection handle
//            echo htmlentities($e['message']);
//            $success = False;
//        }
//
//        $r = OCIExecute($statement, OCI_DEFAULT);
//        if (!$r) {
//            echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
//            $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
//            echo htmlentities($e['message']);
//            $success = False;
//        } else {
//
//        }
//        return $statement;
//    }
//    
//    function printResult($result) { //prints results from a select statement
//        echo "<br>Got data from table tab1:<br>";
//        echo "<table>";
//        echo "<tr><th>ID</th><th>Name</th></tr>";
//
//        while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
//            echo "<tr><td>" . $row["IID"] . "</td><td>" . $row["NAME"] . "</td></tr>"; //or just use "echo $row[0]" 
//        }
//        echo "</table>";
//    }
//    
//    $getStr = "SELECT * FROM Item";
//    $result = executePlainSQL($getStr);
//    printResult($result);
    
?>

</body>
</html>
