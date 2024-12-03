<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/styles.css">
    
    <title>Sửa sản phẩm</title>
</head>
<body>
    <div class="container">
        <h1>Sửa sản phẩm</h1>
        <form method="POST">
            <label for="name">Tên sản phẩm:</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>
            <label for="price">Giá sản phẩm:</label>
            <input type="number" id="price" name="price" value="<?= htmlspecialchars($product['price']) ?>" required>
            <button type="submit">Cập nhật</button>
        </form>
    </div>
</body>
</html>
