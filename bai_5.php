
<?php
function isValidScore($diem) {
    return $diem !== "" && is_numeric($diem)
        && $diem >= 0 && $diem <= 10;
}

function finalScore($chuyenCan, $giuaKy, $cuoiKy) {
    return $chuyenCan * 0.1 + $giuaKy * 0.3 + $cuoiKy * 0.6;
}

$hoTen = "";
$chuyenCan = "";
$giuaKy = "";
$cuoiKy = "";
$loi = [];
$diemTongKet = null;
$xepLoai = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hoTen = trim($_POST["hoTen"] ?? "");
    $chuyenCan = trim($_POST["chuyenCan"] ?? "");
    $giuaKy = trim($_POST["giuaKy"] ?? "");
    $cuoiKy = trim($_POST["cuoiKy"] ?? "");

    if ($hoTen == "") {
        $loi[] = "Vui lòng nhập họ tên.";
    }

    if (!isValidScore($chuyenCan)) {
        $loi[] = "Điểm chuyên cần phải nằm trong khoảng 0–10.";
    }

    if (!isValidScore($giuaKy)) {
        $loi[] = "Điểm giữa kỳ phải nằm trong khoảng 0–10.";
    }

    if (!isValidScore($cuoiKy)) {
        $loi[] = "Điểm cuối kỳ phải nằm trong khoảng 0–10.";
    }

    if (empty($loi)) {
        $diemTongKet = finalScore(
            (float)$chuyenCan,
            (float)$giuaKy,
            (float)$cuoiKy
        );

        if ($diemTongKet >= 8) {
            $xepLoai = "Giỏi";
        } elseif ($diemTongKet >= 6.5) {
            $xepLoai = "Khá";
        } elseif ($diemTongKet >= 5) {
            $xepLoai = "Trung bình";
        } else {
            $xepLoai = "Chưa đạt";
        }
    }
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
    <label>Họ tên:</label>
    <input type="text" name="hoTen"
           value="<?php echo htmlspecialchars($hoTen); ?>">
    <br><br>

    <label>Điểm chuyên cần:</label>
    <input type="number" name="chuyenCan" min="0" max="10"
           step="any"
           value="<?php echo htmlspecialchars($chuyenCan); ?>">
    <br><br>

    <label>Điểm giữa kỳ:</label>
    <input type="number" name="giuaKy" min="0" max="10"
           step="any"
           value="<?php echo htmlspecialchars($giuaKy); ?>">
    <br><br>

    <label>Điểm cuối kỳ:</label>
    <input type="number" name="cuoiKy" min="0" max="10"
           step="any"
           value="<?php echo htmlspecialchars($cuoiKy); ?>">
    <br><br>

    <button type="submit">Tính điểm</button>
</form>

<?php
if (!empty($loi)) {
    echo "<ul>";
    foreach ($loi as $thongBao) {
        echo "<li>" . htmlspecialchars($thongBao) . "</li>";
    }
    echo "</ul>";
}

if ($diemTongKet !== null) {
    echo "<h3>Kết quả</h3>";
    echo "Họ tên: " . htmlspecialchars($hoTen) . "<br>";
    echo "Điểm tổng kết: " . number_format($diemTongKet, 2) . "<br>";
    echo "Xếp loại: " . $xepLoai;
}
?>
