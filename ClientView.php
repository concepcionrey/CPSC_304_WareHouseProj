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
        Item IID:<input type="text" name="IIDOrder"  maxlength="15" onkeypress='return event.charCode >=48 && event.charCode<=57'   title="Please enter numbers only."  placeholder="Enter numbers only." id="IIDOrder">
        Client CLID:<input type="text" name="CLIDOrder"  maxlength="15" onkeypress='return event.charCode >=48 && event.charCode<=57'   title="Please enter numbers only."  placeholder="Enter numbers only." id="CLIDOrder">
        Order OD:<input type="text" name="ODOrder"  maxlength="15" onkeypress='return event.charCode >=48 && event.charCode<=57'   title="Please enter numbers only."  placeholder="Enter numbers only." id="ODOrder">
        <button type="add item" id="addItemButton">Order Item</button> <br>
        <script>
            document.getElementById("CLIDOrder").value = document.cookie.split(";")[0];
        </script>
    </form>
    
    <form action="cancel_order_client.php", method="get">
        Order OD: <input type="text" name="cancelOrderID",  maxlength="15" onkeypress='return event.charCode >=48 && event.charCode<=57'   title="Please enter numbers only."  placeholder="Enter numbers only." id="cancelOrderID">
        <button type="add item" id="updateStockButton">Cancel Order</button> <br>
    </form>
    
    <form action="update_creditCardNumber_client.php", method="get">
        New Credit Card#: <input type="text" name="creditCardNumberUpdate"  maxlength="16" onkeypress='return event.charCode >=48 && event.charCode<=57'   title="Please enter numbers only."  placeholder="Enter numbers only." id="creditCardNumberUpdate">
        Client CLID:<input type="text" name="CLIDupdate"   maxlength="15" onkeypress='return event.charCode >=48 && event.charCode<=57'   title="Please enter numbers only."  placeholder="Enter numbers only." id="CLIDupdate">
        <button type="add item" id="updateCreditCard">Update credit card info</button> <br>
    </form>
    
    <form action="update_email_client.php", method="get">
        New email: <input type="text" name="emailUpdate" maxLength="40" title="Please enter your email address."  placeholder="Enter your email address." id="emailUpdate">
        Client CLID:<input type="text" name="CLIDupdate"  maxlength="15" onkeypress='return event.charCode >=48 && event.charCode<=57'   title="Please enter numbers only."  placeholder="Enter numbers only." id="CLIDupdate">
        <button type="add item" id="updateEmail">Update Email</button> <br>
    </form>
    
    <form action="select_items_client", method="get">
        
        Items with price 
        <select>
            <option value=">">&gt;</option>
            <option value="<">&lt;  </option>
            <option value="=">=</option>
            <option value=">=">&ge;</option>
            <option value="<=">&le;</option>
        </select> 
        <input type="number" step="0.01" onkeypress="if(this.value.length==15) return false;" min="0.01" max="999999999999999"  title="Please enter numbers only." placeholder="Enter numbers only."  name="retrievePrice">
        <button type="add item" id="selectItemsPriceButton">Select Items</button> <br>
    </form>
</div>