<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/styles.css">
    <title>Đây là trang bán hàng của toiii</title>
</head>
<body>
    <div class="container">
        <header>
            <h1>Quản lý sản phẩm</h1>
        </header>
        <br>
        <a href="index.php?action=add">
            <button class="add-button"  style='background-color: red'>Thêm mới</button>
        </a>
        <table>
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= htmlspecialchars($product['name']) ?></td>
                        <td><?= htmlspecialchars($product['price']) ?> VND</td>
                        <td><a href="index.php?action=edit&id=<?= $product['id'] ?>">✏️</a></td>
                        <td><a href="index.php?action=delete&id=<?= $product['id'] ?>">🗑️</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

