<?php
require_once "../model/database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .header-title {
            text-align: center;
            margin: 20px 0;
        }
        .question-container {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
        }
        .question-container p {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header-title">
        <h1>Danh sách câu hỏi</h1>
    </div>
    <div class="container">
        <form action="../controller/result.php" method="get">
            <?php foreach ($data as $index => $item): ?>
                <div class="question-container">
                    <!-- Hiển thị câu hỏi -->
                    <p><?php echo $item['question']; ?></p>
                    <ul class="list-unstyled">
                        <?php foreach ($item['choices'] as $choiceIndex => $choice): ?>
                            <div class="form-check">
                                <!-- Sửa name để mỗi câu hỏi có nhóm riêng -->
                                <input class="form-check-input" type="radio" 
                                       name="question_<?php echo $index; ?>" 
                                       id="question_<?php echo $index . '_' . $choiceIndex; ?>" 
                                       value="<?php echo $choice; ?>">
                                <label class="form-check-label" for="question_<?php echo $index . '_' . $choiceIndex; ?>">
                                    <?php echo $choice; ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
            <div class="text-center">
                <button class="btn btn-success" type="submit">Nộp bài</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbRkNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
