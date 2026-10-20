
<?php
$diem = "";
$thongBao = "";
$hopLe = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $diem = trim($_POST["diem"] ?? "");

    if ($diem !== "" && is_numeric($diem)) {
        $diemSo = (float)$diem;

        if ($diemSo >= 0 && $diemSo <= 10) {
            $hopLe = true;
            $thongBao = "Điểm " . $diemSo . " là HỢP LỆ";
        } else {
            $thongBao = "Điểm không hợp lệ! Vui lòng nhập từ 0 đến 10.";
        }
    } else {
        $thongBao = "Vui lòng nhập điểm là một số.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài 4: Kiểm Tra Điểm</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f0f4f8;
            color: #333;
        }

        nav {
            padding: 15px 0;
            background: white;
        }

        nav a {
            color: #333;
            margin-right: 5px;
            font-size: 14px;
        }

        .khung {
            width: 550px;
            max-width: 90%;
            margin: 30px auto;
            padding: 35px 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            text-align: center;
        }

        h2 {
            display: inline-block;
            margin: 0 0 20px;
            color: #fff;
            background: #2864bd;
            font-size: 22px;
        }

        hr {
            border: 0;
            border-top: 2px solid #8da4c5;
            margin-bottom: 22px;
        }

        form {
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 12px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 13px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 5px;
            background: #2874c8;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #185ca8;
        }

        .ket-qua {
            margin-top: 20px;
            padding: 17px 10px;
            border-radius: 5px;
            font-size: 15px;
        }

        .hop-le {
            background: #d1e7dd;
            color: #285b49;
        }

        .khong-hop-le {
            background: #f8d7da;
            color: #842029;
        }

        .quay-lai {
            display: block;
            margin-top: 22px;
            color: #555;
            font-size: 14px;
            text-decoration: none;
        }

        .quay-lai:hover {
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            .khung {
                padding: 25px 20px;
            }
        }
    </style>
</head>

<body>

    <nav>
        <a href="index.php">Bài 1</a>
        <a href="bai2.php">Bài 2</a>
        <a href="bai_3.php">Bài 3</a>
        <a href="bai_4.php">Bài 4</a>
        <a href="bai_5.php">Bài 5</a>
        <a href="bai_6.php">Bài 6</a>
        <a href="bai_7.php">Bài 7</a>
    </nav>

    <div class="khung">

        <h2>Bài 4: Kiểm Tra Điểm</h2>

        <hr>

        <form method="post" action="">
            <label for="diem">
                Nhập điểm của bạn (từ 0 đến 10):
            </label>

            <input
                type="number"
                id="diem"
                name="diem"
                min="0"
                max="10"
                step="any"
                value="<?php echo htmlspecialchars($diem, ENT_QUOTES, 'UTF-8'); ?>"
                required
            >

            <button type="submit">Kiểm Tra Kết Quả</button>
        </form>

        <?php if ($thongBao != ""): ?>
            <div class="ket-qua <?php
                echo $hopLe ? 'hop-le' : 'khong-hop-le';
            ?>">
                <?php echo htmlspecialchars($thongBao, ENT_QUOTES, 'UTF-8'); ?>
            </div>
        <?php endif; ?>

        <a class="quay-lai" href="index.php">
            ← Quay lại danh sách bài tập
        </a>

    </div>

</body>
</html>
