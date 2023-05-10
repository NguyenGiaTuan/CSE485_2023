<!DOCTYPE html>
<html>

<head>
    <title>Quản lý sinh viên</title>
</head>

<body>
    <h1>Quản lý sinh viên</h1>
    <form action="add_student.php" method="POST">
        <label for="id">ID:</label>
        <input type="int" name="id" required><br>

        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="age">Age:</label>
        <input type="int" name="age" required><br>

        <button type="submit">Thêm sinh viên</button>
    </form>

    <hr>

    <h2>Danh sách sinh viên</h2>

        <?php
        include "student.php";
        include "studentDAO.php";
        $file = fopen("data.csv", "r"); // Mở file CSV và đọc nội dung
        echo "<table>"; // Bắt đầu bảng HTML
        while (($data = fgetcsv($file)) !== false) { // Đọc từng dòng trong file CSV
            echo "<tr>"; // Bắt đầu một hàng mới trong bảng HTML
            foreach ($data as $cell) { // Đọc từng ô trong dòng hiện tại
                echo "<td>" . htmlspecialchars($cell) . "</td>"; // In ra giá trị của ô đó
            }
            echo "</tr>"; // Kết thúc hàng trong bảng HTML
        }
        echo "</table>"; // Kết thúc bảng HTML
        fclose($file); // Đóng file CSV
        ?>
    
</body>

</html>