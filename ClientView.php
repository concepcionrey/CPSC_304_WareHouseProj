<!doctype html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<div id="boxedQuery">
    QUERY STRING WILL BE DISPLAYED HERE.
</div>
        
<script>
    if (performance.navigation.type != 1) {
        var id = prompt("Please Enter Your Client ID");
        document.cookie = id;
        if (id != null) {
            alert("Welcome " + id);
        }
    }
</script>

<div id="boxed">
      <ul>
        <li><?php include('displayClientTables.php'); ?></li>
    </ul>
</div>

<div id = "queriesClient">
    <form action="insert_order_client.php", method="get">
        Item IID:<input type="text" name="IIDOrder" id="IIDOrder">
        Client CLID:<input type="text" name="CLIDOrder" id="CLIDOrder">
        Order OD:<input type="text" name="ODOrder" id="ODOrder">
        <button type="add item" id="addItemButton">Order Item</button> <br>
        <script>
            document.getElementById("CLIDOrder").value = document.cookie.split(";")[0];
        </script>
    </form>
    
    <form action="cancel_order_client.php", method="get">
        Order ID: <input type="text" name="cancelOrderID", id="cancelOrderID"> 
        <button type="add item" id="updateStockButton">Cancel Order</button> <br>
    </form>
    
    <form action="update_creditCardNumber_client.php", method="get">
        New Credit Card#: <input type="text" name="creditCardNumberUpdate" id="creditCardNumberUpdate"> 
        Client CLID:<input type="text" name="CLIDupdate" id="CLIDupdate">
        <button type="add item" id="updateCreditCard">Update credit card info</button> <br>
        <script>
            document.getElementById("CLIDupdate").value = document.cookie.split(";")[0];
        </script>
    </form>

    <form action="update_address_client.php", method="get">
        New address: <input type="text" name="addressUpdate" id="addressUpdate"> 
        Client CLID:<input type="text" name="CLIDupdate" id="CLIDupdate">
        <button type="add item" id="updateAddress">Update Address</button> <br>
        <script>
            document.getElementById("CLIDupdate").value = document.cookie.split(";")[0];
        </script>
    </form>
    
    <form action="update_email_client.php", method="get">
        New email: <input type="text" name="emailUpdate" id="emailUpdate"> 
        Client CLID:<input type="text" name="CLIDupdate" id="CLIDupdate">
        <button type="add item" id="updateEmail">Update Email</button> <br>
        <script>
            document.getElementById("CLIDupdate").value = document.cookie.split(";")[0];
        </script>
    </form>
    
    <form action="select_items_client.php", method="post">
        
        Items with price 
        <select name="operator">
            <option value=">">&gt;</option>
            <option value="<">&lt;</option>
            <option value="=">=</option>
            <option value=">=">&ge;</option>
            <option value="<=">&le;</option>
        </select> 
        <input type="text" name="retrievePrice" id="retrievePrice">
        <button type="add item" id="selectItemsPriceButton">Select Items</button> <br>
    </form>
</div>