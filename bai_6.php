
<?php
$hoTen = "";
$email = "";
$ngaySinh = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hoTen = trim($_POST["hoTen"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $ngaySinh = trim($_POST["ngaySinh"] ?? "");

    if ($hoTen == "") {
        $errors[] = "Vui lòng nhập họ tên.";
    }

    if ($email == "") {
        $errors[] = "Vui lòng nhập email.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email không hợp lệ.";
    }

    if ($ngaySinh == "") {
        $errors[] = "Vui lòng nhập ngày sinh.";
    }

    if (empty($errors)) {
        header("Location: bai_6.php?success=1");
        exit;
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

<?php
if (isset($_GET["success"])) {
    echo "<p>Đăng ký thành công!</p>";
}
?>

<form method="post" action="bai_6.php">
    <input type="text" name="hoTen"
           placeholder="Họ tên"
           value="<?php echo htmlspecialchars($hoTen); ?>">
    <br><br>

    <input type="text" name="email"
           placeholder="Email"
           value="<?php echo htmlspecialchars($email); ?>">
    <br><br>

    <input type="date" name="ngaySinh"
           value="<?php echo htmlspecialchars($ngaySinh); ?>">
    <br><br>

    <button type="submit">Gửi</button>
</form>

<?php
if (!empty($errors)) {
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>" . htmlspecialchars($error) . "</li>";
    }
    echo "</ul>";
}
?>
