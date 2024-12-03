<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/styles.css">
    <title>Thêm sản phẩm</title>
</head>
<body>
    <div class="container">
        <h1>Thêm sản phẩm</h1>
        <form method="POST">
            <label for="product_name">Tên sản phẩm:</label>
            <input type="text" id="product_name" name="product_name" required>
            <label for="product_price">Giá sản phẩm:</label>
            <input type="number" id="product_price" name="product_price" required>
            <button type="submit">Lưu</button>
        </form>
    </div>
</body>
</html>
