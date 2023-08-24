<?php
// Kết nối đến cơ sở dữ liệu (thay đổi thông tin kết nối phù hợp với cấu hình cơ sở dữ liệu của bạn).
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_nhom14";
// tạo kiểu hướng đối tượng trong mysqli
$conn = new mysqli($servername, $username, $password, $dbname);
// Kiểm tra kết nối đến cơ sở dữ liệu.
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
  }
  
?>