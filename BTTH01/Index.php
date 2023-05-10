<?php
//Hàm isset trong PHP được sử dụng để kiểm tra xem một biến nào đó đã được khởi tạo hay chưa
if (isset($_POST['submit'])) {

$id = $_POST['id'];
$name = $_POST['name'];
$age = $_POST['age'];
$grade = $_POST['grade'];

$M = fopen('ListStudents.csv', 'r');
    
$data = array();
  while (($row = fgetcsv($M)) !== false) {
      $data[] = $row;
    }
    fclose($M);
 // Kiểm tra xem id đã tồn tại trong file hay chưa
 $id_exists = false;
 foreach ($data as $row) {
   if ($row[0] == $id) {
     $id_exists = true;
     break;
   }
 }
 if ($id_exists ==false) {
    // Mở file CSV để ghi dữ liệu
    $file = fopen('ListStudents.csv', 'a');

    // Ghi dữ liệu vào file CSV
    fputcsv($file, array($id,$name, $age, $grade));

    // Đóng file CSV
    fclose($file);

    // Chuyển hướng về trang 
    header('Location: index.php');
    exit();
    } else {
        $message = "Đã Trùng ID Xin Nhập lại!";
    }
}
?>

<?php if (isset($message)): ?>
  <p><?php echo $message; ?></p>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>  Quản Lý Sinh Viên </h1>
    <h2>    Danh sách sinh viên </h2>
    <table>

		<?php
        //require_once được sử dụng các tệp
        require_once 'Student.php';
        require_once 'StudentDAO.php';
            // Tạo đối tượng StudentDAO
        $list = new StudentDAO();

        // Gọi hàm readCSV với tên file csv bạn muốn đọc
        $list->readCSV('ListStudents.csv');
		?>
	</table>
    <h3>    Nhập Dữ liệu sinh viên </h3>
    <!-- dùng required để đẩm bảo người dùng phải nhập đầy đủ dữ liệu -->
	<form method="POST" action="Index.php">
        
        <label for="id">ID:</label>
        <input type="text" name="id" id="id">

        <label for="name">Name:</label>
        <input type="text" name="name" id="name">

        <label for="age">Age:</label>
        <input type="text" name="age" id="age">

        <label for="grade">Grade:</label>
        <input type="text" name="grade" id="grade">

        <input type="submit" name="submit" value="Thêm Mới">
    </form>

</body>
</html>