<?php
include('./config.php');


// Lấy dữ liệu từ các ô input sử dụng biến $_POST.
$maSanPham = $_POST['maSanPham']; //ProductID
$tenSanPham = $_POST['tenSanPham'];  //ProductName 
$giaSanPham = $_POST['giaSanPham'];  //Price
$mota = $_POST['mota'];  //Description
$nhaxuatban = $_POST['nhaxuatban']; //PublishingCompany
$congtyphathanh = $_POST['congtyphathanh']; //	IssuingCompanyID
$sotrang = $_POST['sotrang']; //PageCounts
$loaibia = $_POST['loaibia']; //CoverType
$giagoc = $_POST['giagoc']; //OldPrice
$loaisach = $_POST['loaisach']; //BookTypeID
$shop = $_POST['shop']; //NameShop
$star=$_POST['star'];//Star
$soluongban=$_POST['soluongban'];//sellNumber

//hinh anh
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];

move_uploaded_file($hinhanh_tmp,"../Uploads/".$hinhanh);

// $result = $conn->query("SELECT ShopID FROM shop WHERE NameShop='$shop'"); //loi ??? query gi 
// if (!$result) {
//   echo "loi" . $conn->error . "<br>";
// }
// $rows = $result->fetch_assoc();
// $checkShopID = $rows["ShopID"];

// Thực hiện câu truy vấn để chèn dữ liệu vào cơ sở dữ liệu 
$sql = "INSERT INTO products (ProductName,ProductID, Price,Description,PublishingCompany,IssuingCompany,PageCounts,CoverType,OldPrice,BookTypeID,ShopID,Star,sellNumber,Image) VALUES ('$tenSanPham', '$maSanPham', '$giaSanPham','$mota','$nhaxuatban','$congtyphathanh','$sotrang','$loaibia','$giagoc','$loaisach','$shop','$star','$soluongban','$hinhanh')  ";


if ($conn->query($sql) === TRUE) {
  echo "Thêm sản phẩm thành công!";
  echo "<br>";
} else {
  echo "Lỗi: " . $sql . "<br>" . $conn->error;
  echo"<br>";
}
echo "<a href='../addProducts.php'> quay lai </a>";

$conn->close();
