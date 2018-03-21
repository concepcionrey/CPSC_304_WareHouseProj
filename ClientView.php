<!doctype html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<div id="boxedQuery">
    QUERY STRING WILL BE DISPLAYED HERE.
</div>

<div id="boxed">
      <ul>
        <li><?php include('displayClientTables.php'); ?></li>
    </ul>
</div>

<div id = "queriesClient">
    <form action="insert_order_item.php", method="get">
    Item IID:<input type="text" name="IIDOrder">
    <button type="add item" id="addItemButton">Order Item</button> <br>
</form>
    
    <form action="cancel_order_client.php", method="get">
    Order ID: <input type="text" name="cancelOrderID"> 
    <button type="add item" id="updateStockButton">Cancel Order</button> <br>
</form>
    
    <form action="update_creditCardNumber_client.php", method="get">
    New Credit Card#: <input type="text" name="creditCardNumberUpdate"> 
    <button type="add item" id="updateCreditCard">Update credit card info</button> <br>
</form>
    
    <form action="update_email_client.php", method="get">
    New email: <input type="text" name="emailUpdate"> 
    <button type="add item" id="updateEmail">Update Email</button> <br>
</form>
    
    <form action="select_items_client", method="get">
    Items with price > <input type="text" name="retrievePrice">
    <button type="add item" id="selectItemsPriceButton">Select Items</button> <br>
</form>
</div>