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
        Item ID:<input type="text" name="IIDInsert" id="IIDInsert"> 
        Item Category:<input type="text" name="itemCategoryInsert" id="itemCategoryInsert"> 
        Item name:<input type="text" name="nameInsert" id="nameInsert">
        Item Price:<input type="text" name="priceInsert" id="priceInsert">
        Item Supply code:<input type="text" name="supplyCodeInsert" id="supplyCodeInsert">
        Item Stock:<input type="text" name="stockInsert" id="stockInsert">
        <button type="add item" id="addItemButton">Add Item to Items table</button> <br>
        
        <script type="text/javascript">
            document.getElementById('addItemButton').onclick = function() {
                var id = document.getElementById("IIDInsert").value + ", ";
                var cat = document.getElementById("itemCategoryInsert").value+ ", ";
                var name = document.getElementById("nameInsert").value+ ", ";
                var price = document.getElementById("priceInsert").value+ ", ";
                var supplyCode = document.getElementById("supplyCodeInsert").value+ ", ";
                var stock = document.getElementById("stockInsert").value+ ", ";
                var finStr =  "INSERT INTO Item (IID, category, name, price, supplierCode, itemStock) VALUES ("+ id + cat + name + price + supplyCode + stock + ")";
                alert(finStr);
            }
        </script>
    </form>

    <form action="update_itemStock.php" method="get">
        Item ID: <input type="text" name="IIDUpdateStock">
        Update stock by: <input type="text" name="stockUpdate">
        <button type="add item" id="updateStockButton">Update stock of an Item</button> <br>
    </form>

    <form action="update_itemPrice.php" method="get">
        Item ID: <input type="text" name="IIDUpdatePrice">
        Set the new price: <input type="text" name="priceUpdate">
        <button type="add item" id="updatePriceButton">Update price of an Item</button> <br>
    </form>
    
    <form action="get_itemPriceGT.php" method="get">
        Items with price > <input type="text" name="retrievePrice">
        <button type="add item" id="selectItemsPriceButton">Select Items</button> <br>
    </form>

    <form action="get_itemNotShipped.php" method="get">
    <button type="add item" id="notShippedItemsButton">Display not yet shipped orders</button> <br>
    </form>

    <form action="delete_item" method="get">
        Item ID: <input type="text" name="IIDDeleteItem">
        <button type="add item" id="deleteItem">Delete Item</button> <br>
    </form>

    Join two tables, table 1: <input type="text" name="table1Join" placeholder="Something Like Table ID">
    table 2: <input type="text" name="table2Join" placeholder="Something Like Table ID">
    <button type="add item" id="joinTablesButton">Join Tables</button> <br>

    <form action="get_itemMaxPrice" method="get">
        <button type="add item" id="selectMaxPrice">Select Items with the maximum price</button> <br>
    </form>
</div>