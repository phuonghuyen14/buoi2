
<?php
$ten = "";
$tongTien = null;

if (isset($_POST["tinh"])) {
    $ten = trim($_POST["ten"]);
    $soLuong = (int) $_POST["soLuong"];
    $donGia = (float) $_POST["donGia"];

    $tongTien = $soLuong * $donGia;
}
?>

<a href="index.php">Bài 1</a>
<a href="bai2.php">Bài 2</a>
<a href="bai_3.php">Bài 3</a>
<a href="bai_4.php">Bài 4</a>
<a href="bai_5.php">Bài 5</a>
<a href="bai_6.php">Bài 6</a>
<a href="bai_7.php">Bài 7</a>
<br><br>

<form method="post">
    <input type="text" name="ten" placeholder="Tên tài liệu"
           value="<?php echo htmlspecialchars($ten); ?>">

    <input type="number" name="soLuong" placeholder="Số lượng"
           value="<?php echo htmlspecialchars($_POST['soLuong'] ?? ''); ?>">

    <input type="number" name="donGia" placeholder="Đơn giá"
           value="<?php echo htmlspecialchars($_POST['donGia'] ?? ''); ?>">

    <button type="submit" name="tinh">Tính</button>
</form>

<?php
if ($tongTien !== null) {
    echo "<p>" . htmlspecialchars($ten) . ": "
       . number_format($tongTien, 0, ',', '.') . " đ</p>";
}
?>
