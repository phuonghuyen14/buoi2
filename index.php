
<?php
$students = [
    [
        "name" => "Nguyen Van An",
        "midterm" => 7,
        "final" => 8
    ],
    [
        "name" => "Tran Thi Binh",
        "midterm" => 4,
        "final" => 5
    ],
    [
        "name" => "Le Van Cuong",
        "midterm" => 6,
        "final" => 7
    ]
];

function calculateAverage($midterm, $final) {
    return ($midterm + $final) / 2;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bảng điểm 3 sinh viên</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: lightgreen;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
</head>
<a href="index.php">Bài 1</a>
<a href="bai2.php">Bài 2</a>
<a href="bai_3.php">Bài 3</a>
<a href="bai_4.php">Bài 4</a>
<a href="bai_5.php">Bài 5</a>
<a href="bai_6.php">Bài 6</a>
<a href="bai_7.php">Bài 7</a>
<h2>BẢNG ĐIỂM 3 SINH VIÊN</h2>

<table>
    <tr>
        <th>STT</th>
        <th>Họ và tên</th>
        <th>Điểm giữa kỳ</th>
        <th>Điểm cuối kỳ</th>
        <th>Điểm trung bình</th>
        <th>Kết quả</th>
    </tr>

    <?php
    $stt = 1;

    foreach ($students as $student) {
        $average = calculateAverage(
            $student["midterm"],
            $student["final"]
        );

        $result = ($average >= 5) ? "Đạt" : "Không đạt";
    ?>

    <tr>
        <td><?php echo $stt; ?></td>
        <td><?php echo htmlspecialchars($student["name"], ENT_QUOTES, 'UTF-8'); ?></td>
        <td><?php echo $student["midterm"]; ?></td>
        <td><?php echo $student["final"]; ?></td>
        <td><?php echo number_format($average, 2); ?></td>
        <td><?php echo $result; ?></td>
    </tr>

    <?php
        $stt++;
    }
    ?>

</table>

</body>
</html>
