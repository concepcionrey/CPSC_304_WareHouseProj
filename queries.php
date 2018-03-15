<html>
<body>
<?php 
    $connection = mysql_connect("servername:3306", "user", "password") or die ('Error connecting to mysql');

    mysql_select_db("databasename");
    
    $insertID = $_GET["IIDInsert"]; 
    $itemCategory = $_GET["itemCategoryInsert"];
    $itemName = $_GET["nameInsert"];
    $itemPrice = $_GET["priceInsert"];
    $itemSupplyCode = $_GET["supplyCodeInsert"];
    $itemStock = $_GET["stockInsert"];
    $sql = sprintf("INSERT INTO Item
                    (IID, category, name, price, supplierCode, itemStock)
                    VALUES
                    (%s, %s, %s, %s, %s, %s);",
                   mysql_real_escape_string($insertID),
                   mysql_real_escape_string($itemCategory),
                   mysql_real_escape_string($itemName),
                   mysql_real_escape_string($itemPrice),
                   mysql_real_escape_string($itemSupplyCode)
                   mysql_real_escape_string($itemStock));
    
    $result = mysql_query($sql) or die(mysql_error());               
    echo '<ul>';
    while($row = mysql_fetch_array($result)) { 
        echo '<li>' . $row[$column] . '</li>';
    }
    echo '</ul>';

    mysql_close($connection);                
?>

</body>
</html>