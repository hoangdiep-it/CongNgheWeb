<?php
$sinhvien = [];

// Kiểm tra nếu người dùng đã upload file
if (isset($_FILES['fileCSV'])) {
    $file = $_FILES['fileCSV']['tmp_name'];

    // Kiểm tra file có hợp lệ không
    if (is_uploaded_file($file)) {
        // Mở file CSV
        if (($handle = fopen($file, "r")) !== FALSE) {
            // Đọc dòng đầu tiên (tiêu đề)
            $headers = fgetcsv($handle, 1000, ",");

            // Đọc từng dòng dữ liệu
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                // Kết hợp tiêu đề với dữ liệu từng dòng
                $sinhvien[] = array_combine($headers, $data);
            }

            // Đóng file
            fclose($handle);
        }
    } else {
        echo "<script>alert('Không thể đọc file');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Danh sách sinh viên</h1>
        
        <!-- Form upload file -->
        <form method="POST" enctype="multipart/form-data" class="mb-4">
            <div class="mb-3">
                <label for="fileCSV" class="form-label">Chọn file:</label>
                <input type="file" class="form-control" id="fileCSV" name="fileCSV" accept=".csv" required>
            </div>
            <button type="submit" class="btn btn-primary">Tải danh sách lên</button>
        </form>

        <!-- Hiển thị bảng danh sách sinh viên -->
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                     <th>USER NAME</th>
                    <th>PASSWORD</th>
                    <th>LAST NAME</th>
                    <th>FIRST NAME</th>
                    <th>CLASS</th>
                    <th>EMAIL</th>
                    <th>COURSE1</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Kiểm tra nếu mảng sinh viên không rỗng
                if (!empty($sinhvien)) {
                    // Hiển thị từng sinh viên trong bảng
                    foreach ($sinhvien as $sv) {
                        echo "<tr>";
                        echo "<td>{$sv['username']}</td>";
                        echo "<td>{$sv['password']}</td>";
                        echo "<td>{$sv['lastname']}</td>";
                        echo "<td>{$sv['firstname']}</td>";
                        echo "<td>{$sv['class']}</td>";
                        echo "<td>{$sv['email']}</td>";
                        echo "<td>{$sv['course1']}</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Chưa có dữ liệu.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
