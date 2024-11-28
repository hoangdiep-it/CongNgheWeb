<?php include './functions.php';
$flowers = getFlowers();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Các loại hoa đỉnh của chóp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>
<style>
   <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
        color: #333;
    }

    .flower_container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .flower_item img {
        width: 70%;
        height: 60%;
        object-fit: cover;
    }
</style>

<body > 
<header>
        <nav class="logo">
            <a href="./admin.php">Admin</a>
        </nav>
        <nav>
            <ul>
                <li><a href="./index.php">Trang chủ</a></li>

            </ul>
        </nav>
    </header>
    <h1>Danh sách các loại hoa</h1>

    <div class="flower_container"style="display:flex;">
        <?php foreach ($flowers as $flower): ?>
            <div class="flower_item">
            <h2><?php echo $flower['name']; ?></h2>
                <p><?php echo $flower['description'] ?></p>
                <img src="<?php echo $flower['image']; ?>" alt="<?php echo $flower['name'] ?>">
                
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>