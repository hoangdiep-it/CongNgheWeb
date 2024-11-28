 <?php
    include './functions.php';
    $flowers = getFlowers();
    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Quản lý danh sách các bài viết về hoa</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="./font/fontawesome/css/all.min.css">
     <link rel="stylesheet" href="./style.css">
 </head>
 <style>
     img {
         height: 100px;
         width: 100px;
     }

     table {
         max-width: 90%;
         margin-left: 60px;
     }
 </style>

 <body>
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
     <button type="button" class="btn btn-warning" style="margin-left: 10px;"><a href="./add.php">Thêm bài viết về hoa </a></button>
     <table class="table table-striped">
         <thead>
             <tr>
                 <th>Tên hoa</th>
                 <th style="width: 800px;">Mô tả</th>
                 <th>Hình ảnh</th>
                 <th>Hành động</th>
             </tr>
         </thead>
         <tbody>
             <?php foreach ($flowers as $flower): ?>
                 <tr>
                     <td><?php echo htmlspecialchars($flower['name']); ?></td>
                     <td><?php echo htmlspecialchars($flower['description']); ?></td>
                     <td><img src="<?php echo htmlspecialchars($flower['image']); ?>" alt="<?php echo htmlspecialchars($flower['name']); ?>"></td>
                     <td>
                         <a href="edit.php?id=<?php echo $flower['id']; ?>"><i class="fa-solid fa-pen-to-square"></i>
                         </a>
                         <a href="delete.php?id=<?php echo $flower['id']; ?>" onclick="return confirm('Bạn có chắc muốn xóa không?')"><i class="fa-solid fa-trash"></i></a>
                     </td>
                 </tr>
             <?php endforeach; ?>
         </tbody>
     </table>
 </body>

 </html>