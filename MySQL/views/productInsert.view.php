<!DOCTYPE html>
<html lang="en">
<head>
    <title>Insert products</title>
</head>
<body>
<div>
    <h2>Insert a New product</h2>
</div>
<form method="post" action="../connections/productInsert.conn.php">


    <label>Product Name</label>
    <input type="text" name="productName"></p>
    <p>
        <label>Description</label>
        <input type="text" name="description"></p>
    <p>
        <label>Price</label>
        <input type="text" name="price"></p>

    <button formaction="../index.php">Cancel</button>
    <input type="submit" value="Insert">

</form>
</body>
</html>
