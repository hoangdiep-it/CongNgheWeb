<?php
    require_once "../model/database.php";
    $correctAnswers = 0;

// Lặp qua từng câu hỏi trong dữ liệu
    foreach ($data as $index => $item) {
    // Lấy câu trả lời người dùng chọn từ $_GET
    $userAnswer = isset($_GET["question_" . $index]) ? $_GET["question_" . $index] : null;

    // Xử lý và lấy ký tự đáp án (phần trước dấu chấm)
    $userAnswerLetter = $userAnswer ? substr($userAnswer, 0, 1) : null;

    // So sánh với đáp án đúng
    if ($userAnswerLetter === $item['answer']) {
        $correctAnswers++;
    }
}



?>


<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả bài trắc nghiệm</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Kết quả bài trắc nghiệm</h1>
    <div class="alert alert-success text-center">
        Bạn trả lời đúng <strong><?php echo $correctAnswers; ?></strong> trên <strong><?php echo count($data); ?></strong> câu.
    </div>
    <div class="text-center">
        <a href="../src/index.php" class="btn btn-primary">Làm lại</a>
    </div>
</div>
</body>
</html>