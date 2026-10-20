
<?php
$diem = '';
$ketQua = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $diem = $_POST['diem'] ?? '';

    if ($diem === '' || !is_numeric($diem)
        || $diem < 0 || $diem > 10) {
        $ketQua = 'Điểm không hợp lệ! Vui lòng nhập điểm từ 0 đến 10.';
    } elseif ($diem >= 8) {
        $ketQua = 'Xếp loại: Giỏi';
    } elseif ($diem >= 6.5) {
        $ketQua = 'Xếp loại: Khá';
    } elseif ($diem >= 5) {
        $ketQua = 'Xếp loại: Trung bình';
    } else {
        $ketQua = 'Xếp loại: Chưa đạt';
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài 3 - Xếp loại điểm</title>
</head>
<body>

    <a href="index.php">Bài 1</a>
    <a href="bai2.php">Bài 2</a>
    <a href="bai_3.php">Bài 3</a>
    <a href="bai_4.php">Bài 4</a>
    <a href="bai_5.php">Bài 5</a>
    <a href="bai_6.php">Bài 6</a>
<a href="bai_7.php">Bài 7</a> 
    <h2>XẾP LOẠI ĐIỂM</h2>

    <form method="POST" action="">
        <label>Nhập điểm:</label>
        <input type="number" name="diem"
               min="0" max="10" step="any"
               value="<?= htmlspecialchars((string)$diem) ?>"
               required>

        <button type="submit">Xếp loại</button>
    </form>

    <?php if ($ketQua != ''): ?>
        <h3><?= htmlspecialchars($ketQua) ?></h3>
    <?php endif; ?>

</body>
</html>
