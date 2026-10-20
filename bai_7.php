
<?php
$hoTen = "";
$email = "";
$chuDe = "";
$noiDung = "";
$errors = [];
$thanhCong = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hoTen = trim($_POST["hoTen"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $chuDe = trim($_POST["chuDe"] ?? "");
    $noiDung = trim($_POST["noiDung"] ?? "");

    if ($hoTen == "") {
        $errors[] = "Vui lòng nhập họ tên.";
    }

    if ($email == "") {
        $errors[] = "Vui lòng nhập email.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email không đúng định dạng.";
    }

    if ($noiDung == "") {
        $errors[] = "Vui lòng nhập nội dung liên hệ.";
    } elseif (mb_strlen($noiDung) < 10 || mb_strlen($noiDung) > 500) {
        $errors[] = "Nội dung phải từ 10 đến 500 ký tự.";
    }

    if (
        !isset($_FILES["anhDaiDien"]) ||
        $_FILES["anhDaiDien"]["error"] == UPLOAD_ERR_NO_FILE
    ) {
        $errors[] = "Vui lòng tải lên ảnh đại diện.";
    } elseif ($_FILES["anhDaiDien"]["error"] != UPLOAD_ERR_OK) {
        $errors[] = "Tải ảnh lên thất bại.";
    } else {
        $file = $_FILES["anhDaiDien"];
        $duoi = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
        $allowed = ["jpg", "jpeg", "png", "gif"];

        $checkImage = getimagesize($file["tmp_name"]);

        if (
            $checkImage === false ||
            !in_array($duoi, $allowed) ||
            $file["size"] > 2 * 1024 * 1024
        ) {
            $errors[] = "Ảnh phải có định dạng JPG, JPEG, PNG hoặc GIF và không quá 2MB.";
        }
    }

    if (empty($errors)) {
        $thanhCong = true;
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

<style>
    body {
        font-family: Arial, sans-serif;
        color: #23415c;
    }

    .form-lien-he {
        width: 350px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 2px 8px #ddd;
    }

    h2 {
        text-align: center;
        margin-top: 0;
    }

    label {
        display: block;
        margin: 12px 0 6px;
        font-weight: bold;
        font-size: 14px;
    }

    input, select, textarea {
        width: 100%;
        padding: 9px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    textarea {
        height: 100px;
        resize: vertical;
    }

    button {
        width: 100%;
        padding: 10px;
        margin-top: 15px;
        background: #2875b8;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .loi {
        color: red;
    }

    .thanh-cong {
        color: green;
    }
</style>

<div class="form-lien-he">
    <h2>Liên hệ</h2>

    <p style="text-align:center">
        Vui lòng nhập đầy đủ thông tin bên dưới.
    </p>

    <?php if (!empty($errors)): ?>
        <ul class="loi">
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php if ($thanhCong): ?>
        <p class="thanh-cong">
            Gửi liên hệ thành công!
        </p>
        <p>Họ tên: <?php echo htmlspecialchars($hoTen); ?></p>
        <p>Email: <?php echo htmlspecialchars($email); ?></p>
        <p>Chủ đề: <?php echo htmlspecialchars($chuDe); ?></p>
        <p>Nội dung: <?php echo nl2br(htmlspecialchars($noiDung)); ?></p>
        <p>Ảnh đại diện: <?php echo htmlspecialchars($_FILES["anhDaiDien"]["name"]); ?></p>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data">
        <label>Họ tên</label>
        <input type="text" name="hoTen"
               value="<?php echo htmlspecialchars($hoTen); ?>">

        <label>Email</label>
        <input type="text" name="email"
               value="<?php echo htmlspecialchars($email); ?>">

        <label>Chủ đề</label>
        <select name="chuDe">
            <option value="">-- Chọn chủ đề --</option>
            <option value="Hỗ trợ kỹ thuật"
                <?php if ($chuDe == "Hỗ trợ kỹ thuật") echo "selected"; ?>>
                Hỗ trợ kỹ thuật
            </option>
            <option value="Góp ý"
                <?php if ($chuDe == "Góp ý") echo "selected"; ?>>
                Góp ý
            </option>
            <option value="Khác"
                <?php if ($chuDe == "Khác") echo "selected"; ?>>
                Khác
            </option>
        </select>

        <label>Nội dung</label>
        <textarea name="noiDung"
                  placeholder="Nhập nội dung liên hệ..."><?php
            echo htmlspecialchars($noiDung);
        ?></textarea>

        <label>Ảnh đại diện</label>
        <input type="file" name="anhDaiDien" accept="image/*">

        <button type="submit">Gửi liên hệ</button>
    </form>
</div>
