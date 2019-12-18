<!DOCTYPE html>
<html lang="en">
<head>
    <title>Insert products</title>
</head>
<body>
<form method="post" action="prodInsconnect.php">
    <h3>Insert a new product</h3>

    Product Name : <label>
        <input type="text" name="productName">
    </label><br><br>
    Description : <label>
        <input type="text" name="description">
    </label><br><br>
    Price : <label>
        <input type="text" name="price">
    </label><br><br>

    <button formaction="index.php">Cancel</button>
    <input type="submit" value="Insert">
</form>
</body>
</html>
