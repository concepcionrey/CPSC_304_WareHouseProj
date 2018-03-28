<!doctype html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<div id="boxedQuery">
    QUERY STRING WILL BE DISPLAYED HERE.
</div>

<div id="boxed">
    <ul>
        <li><?php include('displayTables.php'); ?></li>
    </ul>
</div>


<div id = "queriesManager">
    <form action="insert_item.php" method="get">
        Item ID:<input type="text" name="IIDInsert" id="IIDInsert" maxlength="15" onkeypress='return event.charCode >=48 && event.charCode<=57'   title="Please enter numbers only."  placeholder="Enter numbers only." >
        Item Category:<input type="text" name="itemCategoryInsert" id="itemCategoryInsert"  maxlength="40" title="Please enter the item category." placeholder="Enter the item category">
        Item name:<input type="text" name="nameInsert" id="nameInsert" maxlength="40" pattern="[A-Za-z]+" title="Please enter the item name." placeholder="Enter the item name." >
        Item Price:<input type="number" name="priceInsert" id="priceInsert" step="0.01" onkeypress="if(this.value.length==15) return false;" min="0.01" max="999999999999999"  title="Please enter numbers only." placeholder="Enter numbers only." >
        Item Supply code:<input type="text" maxlength="40" name="supplyCodeInsert" id="supplyCodeInsert"  title="Please enter the supplier code." placeholder="Enter the supplier code.">
        Item Stock:<input type="text" name="stockInsert" id="stockInsert" maxlength="15" onkeypress='return event.charCode >=48 && event.charCode<=57' title="Please enter numbers only."  placeholder="Enter numbers only.">
        <button type="add item" id="addItemButton">Add Item to Items table</button> <br>

        <script type="text/javascript">
            document.getElementById('addItemButton').onclick = function() {
                var id = document.getElementById("IIDInsert").value + ", ";
                var cat = document.getElementById("itemCategoryInsert").value+ ", ";
                var name = document.getElementById("nameInsert").value+ ", ";
                var price = document.getElementById("priceInsert").value+ ", ";
                var supplyCode = document.getElementById("supplyCodeInsert").value+ ", ";
                var stock = document.getElementById("stockInsert").value;
                var finStr =  "INSERT INTO Item (IID, category, name, price, supplierCode, itemStock) VALUES ("+ id + cat + name + price + supplyCode + stock + ")";
                alert(finStr);

            }
        </script>
    </form>

    <form action="update_itemStock.php" method="get">
        Item ID: <input type="text" name="IIDUpdateStock" maxlength="15" onkeypress='return event.charCode >=48 && event.charCode<=57'  title="Please enter numbers only." placeholder="Enter numbers only." id="IIDUpdateStock">

        Update stock by: <input type="text" name="stockUpdate" maxlength="15" onkeypress='return event.charCode >=48 && event.charCode<=57' title="Please enter numbers only." placeholder="Enter numbers only." id="stockUpdate">
        <button type="add item" id="updateStockButton">Update stock of an Item</button> <br>

        <script type="text/javascript">
            document.getElementById('updateStockButton').onclick = function() {
                var id = document.getElementById("IIDUpdateStock").value;
                var stock = document.getElementById("stockUpdate").value;
                var finStr =  "UPDATE Item SET itemStock =" +stock+  " WHERE IID = " + id;
                alert(finStr);
            }
        </script>
    </form>


    <form action="update_itemPrice.php" method="get">
        Item ID: <input type="text" name="IIDUpdatePrice" maxlength="15" onkeypress='return event.charCode >=48 && event.charCode<=57' placeholder="Enter numbers only." title="Please enter numbers only." id="IIDUpdatePrice">
        Set the new price: <input type="number"  step="0.01" onkeypress="if(this.value.length==1) return false;" min="0.01" max="999999999999999"  title="Please enter numbers only." placeholder="Enter numbers only." id="priceUpdate">
        <button type="add item" id="updatePriceButton">Update price of an Item</button> <br>
        <script type="text/javascript">
            document.getElementById('updatePriceButton').onclick = function() {
                var id = document.getElementById("IIDUpdatePrice").value;
                var price = document.getElementById("priceUpdate").value;
                var finStr =  "UPDATE Item SET itemPrice =" +price+  " WHERE IID = " + id;
                alert(finStr);
            }
        </script>
    </form>
    
    <form action="get_itemPriceGT.php" method="get">
        Items with price > <input  type="number" name="retrievePrice" step="0.01" onkeypress="if(this.value.length==15) return false;" min="0.01" max="999999999999999"  title="Please enter numbers only." placeholder="Enter numbers only." id="retrievePrice">
        <button type="add item" id="selectItemsPriceButton">Select Items</button> <br>
        <script type="text/javascript">
            document.getElementById('selectItemsPriceButton').onclick = function() {
                var price = document.getElementById("retrievePrice").value;
                var finStr =  "SELECT * FROM Item WHERE price > " + price;
                alert(finStr);
            }
        </script>
    </form>

    <form action="get_itemNotShipped.php" method="get">
        <button type="add item" id="notShippedItemsButton">Display not yet shipped orders</button> <br>
    </form>

    <form action="delete_item" method="get">
        Item ID: <input type="text" maxlength="15" onkeypress='return event.charCode >=48 && event.charCode<=57'  title="Please enter numbers only." placeholder="Enter numbers only." name="IIDDeleteItem">
        <button type="add item" id="deleteItem">Delete Item</button> <br>
    </form>

    Join two tables, table 1: <input type="text" maxlength="15" onkeypress='return event.charCode >=48 && event.charCode<=57'  title="Please enter the first Table ID."  name="table1Join" placeholder="Enter the 1st Table ID">
    table 2: <input type="text" maxlength="15" onkeypress='return event.charCode >=48 && event.charCode<=57'  name="table2Join" title="Please enter the second Table ID." placeholder="Enter the 2nd Table ID">
    <button type="add item" id="joinTablesButton">Join Tables</button> <br>

    <form action="get_itemMaxPrice" method="get">
        <button type="add item" id="selectMaxPrice">Select Items with the maximum price</button> <br>
    </form>
</div>