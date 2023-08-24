<?php
include('./config.php');
// Lấy dữ liệu từ các ô input sử dụng biến $_POST.
$stt = $_POST['stt']; 
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
$sql_update = "UPDATE products SET ProductName='$tenSanPham',ProductID='$maSanPham', Price='$giaSanPham',Description='$mota',PublishingCompany='$nhaxuatban',IssuingCompany='$congtyphathanh',PageCounts='$sotrang',CoverType='$loaibia',OldPrice='$giagoc',BookTypeID='$loaisach',ShopID='$shop',Star='$star',sellNumber='$soluongban',Image='$hinhanh' Where stt='$stt'";

if ($conn->query($sql_update) === TRUE) {
    echo "sửa sản phẩm  thành công!";
  } else {
    echo "Lỗi: " . $sql_update . "<br>" . $conn->error;
  }

echo "<a href='../readAllProducts.php'> quay lai </a>";
  
  
  $conn->close();
?>