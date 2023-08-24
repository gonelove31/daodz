
<?php
if(isset($_GET['productName']) && $_GET['productID'] && $_GET['stt']){
  $producID=$_GET['productID'];
  include('./Handel_products/config.php');
$query = "SELECT * FROM Products where ProductID = $producID";
$result = $conn->query($query);
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" sizes="16x16" href="../../css/Nhom_14_Logo.png">
  <!-- CDN font-awesome  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- CDN animate css  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <!-- CDN tailwind css -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- tippyCustom.css -->
  <link rel="stylesheet" href="../assets/css/tippyCustom.css" />

  <title>Admin Page</title>
</head>

<body>
  <div id="wapper" class="flex max-w-[100vw]">
    <!-- LEFT - Phần sidebar (menu bên trái) -->
    <div class="sidebar min-h-screen basis-[250px] w-[234px] px-[8px] bg-[#343a40]">
      <!-- LEFT - Logo + ADMIN PAGE -->
      <div class="user-panel flex pb-4 my-4 gap-[10px]">
        <div class="image w-[40px] rounded-full flex items-center justify-center overflow-hidden">
          <a href="admin.php"><img class="block w-full" src="../../css/Nhom_14_Logo.png" alt="Nhóm 14" /></a>

        </div>
        <div class="p-[5px] pb-0 pt-[8px]">
          <span class="text-[#c2c7d0] hover:text-[#fff]">
            <a href="admin.php">ADMIN PAGE</a>
          </span>
        </div>
      </div>
      <!-- LEFT - Input Search -->
      <div class="search max-w-full flex flex-nowrap">
        <input class="block max-w-[182px] text-white outline-none border border-gray-400 border-solid border-r-0 caret-white rounded-l-lg px-[12px] py-[5px] bg-[#3f474e]" type="text" placeholder="Search" />
        <div class="basis-[40px] border border-gray-400 border-solid rounded-r-lg flex items-center justify-center overflow-hidden">
          <button class="flex px-[10px] py-[9px] items-center justify-center overflow-hidden cursor-pointer" type="button">
            <i class="block w-[16px] h-[16px] text-white fa-solid fa-magnifying-glass"></i>
          </button>
        </div>
      </div>
      <!-- LEFT - Bottom slidebar -->
      <nav class="mt-2 flex flex-col justify-between">
        <!-- LEFT - Danh sách các chức năng quản lý -->
        <ul class="feature flex flex-col">
          <!-- LEFT - 1. Dashboard -->
          <li class="nav-item flex w-full">
            <a href="./admin.php" class="nav-link w-full rounded-md flex gap-2 px-[16px] py-[8px] text-[#c2c7d0] items-center hover:bg-[#494e53]">
              <i class="nav-icon fas fa-house" aria-hidden="true"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <!-- LEFT - 2. Quản lý người dùng -->
          <li class="nav-item flex w-full">
            <a href="#" class="nav-link w-full rounded-md flex gap-2 px-[16px] py-[8px] text-[#c2c7d0] items-center hover:bg-[#494e53]">
              <!-- <i class="nav-icon fas fa-th" aria-hidden="true"></i> -->
              <i class="fa-solid fa-users-gear"></i>
              <p>
                Quản lý người dùng
                <!-- <i class="right fas fa-angle-right"></i> -->
              </p>
            </a>
          </li>

          <!-- LEFT - 3. Quản lý danh mục -->
          <li class="nav-item flex w-full">
            <a href="#" class="nav-link w-full rounded-md flex gap-2 px-[16px] py-[8px] text-[#c2c7d0] items-center hover:bg-[#494e53]">
              <i class="nav-icon fas fa-th" aria-hidden="true"></i>
              <p>
                Quản lý danh mục
                <!-- <i class="right fas fa-angle-right"></i> -->
              </p>
            </a>
          </li>
          <!-- LEFT - 4. Quản lý sản phẩm -->
          <li class="nav-item flex w-full  flex-col">
            <a href="./addProducts.php" class="nav-link w-full rounded-md flex gap-2 px-[16px] py-[8px] text-[#c2c7d0] items-center hover:bg-[#494e53]">
              <i class="nav-icon fas fa-copy" aria-hidden="true"></i>
              <p>
                Quản lý sản phẩm
                <!-- <i class="right fas fa-angle-right"></i> -->
              </p>
            </a>

            <!-- 4.1.  -->
            <ul class="nav nav-treeview" style="display: block;">
              <li class="nav-item w-full rounded-md flex gap-2 px-[16px] py-[8px] text-[#c2c7d0] items-center hover:bg-[#494e53]">
                <a href="./readAllProducts.php" class="nav-link flex items-center justify-center gap-[10px] pl-4">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tất cả sản phẩm</p>
                </a>
              </li>
              <li class="nav-item w-full rounded-md flex gap-2 px-[16px] py-[8px] text-[#c2c7d0] items-center hover:bg-[#494e53]">
                <a href="./addProducts.php" class="nav-link flex items-center justify-center gap-[10px] pl-4">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm sản phẩm</p>
                </a>
              </li>
             
             
            </ul>
          </li>

          <!-- LEFT - 5.Quản lý đơn hàng -->
          <li class="nav-item flex w-full">
            <a href="#" class="nav-link w-full rounded-md flex gap-2 px-[16px] py-[8px] text-[#c2c7d0] items-center hover:bg-[#494e53]">
              <i class="nav-icon fas fa-edit" aria-hidden="true"></i>
              <p>
                Quản lý đơn hàng
                <!-- <i class="right fas fa-angle-right"></i> -->
              </p>
            </a>
          </li>
        </ul>

        <!-- Đăng xuất -->
        <ul class="logout">
          <li class="nav-item flex w-full mb-[5px]">
            <a href="../pages/logout.php" class="nav-link w-full rounded-md flex gap-2 px-[16px] py-[8px] text-[#c2c7d0] items-center hover:bg-[#494e53]">
              <i class="nav-icon fa-solid fa-right-from-bracket"></i>
              <p>
                Đăng xuất
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>

    <!-- RIGHT - Phần content (nội dung chính) -->
    <div class="basis-auto w-[100%] bg-[#f4f6f9]">
      <nav class="p-4 flex items-center justify-between bg-white">
        <ul>
          <li>
            <i class="fa-solid fa-bars"></i>
          </li>
        </ul>
        <ul class="flex gap-3">
          <li>
            <span>Xin chào, </span>
          </li>
          <li><i class="fa-regular fa-bell"></i></li>
        </ul>
      </nav>
      <!--  -->
      <section class="bg-[#756d6d] p-8 content-hd  flex gap-2 my-[5px]">
        <h1 class="font-bold  text-2xl basis-1/2 flex justify-start items-center ">
         Bạn đang sửa sản phẩm có Tên là : <?php echo $_GET['productName']. "<br>".
         "và có Mã Sản Phẩm là: ".$_GET['productID'] ?>
        </h1>
        <span class="basis-1/2 flex justify-end items-center"><a href="./readAllProducts.php">Quay Lại </a> / <a href="#"> Sửa sản phẩm</a></span>
      </section>

      <!-- thong tin them san pham-->
      <div class="content px-6 py-4 flex flex-col gap-3 bg-red">
        <?php
   while($row = $result->fetch_assoc()){
        ?>
        <form method="POST" action="./Handel_products/HandelFixProducts.php" enctype="multipart/form-data">
          <table class="w-full max-w-full border-collapse border border-gray-300">
            <tbody>
              <!-- lấy stt gửi đi để biết sản phẩm nào cần sửa  -->
              <input  style="display: none;" type="text" name="stt" value="<?php echo $row['stt']?>"> 
              <tr class="bg-gray-100 w-full text-[14px]">
                <th class="text-[16px] align-top text-left break-words px-3 py-2 font-bold border border-gray-300 grow ">Product ID</th>
                <td class="balign-top text-left reak-words px-4 py-2 border border-gray-300 "><input class="w-1/3" type="number" name="maSanPham"  value="<?php echo $row['ProductID']?>"  ></td>
              </tr>
              <tr class="bg-gray-100 w-full text-[14px]">
                <th class="text-[16px] align-top text-left break-words px-3 py-2 font-bold border border-gray-300 grow ">Product Name</th>
                <td class="balign-top text-left reak-words px-4 py-2 border border-gray-300 "><input class="w-1/3" type="text" name="tenSanPham"  value="<?php echo $row['ProductName']?>"></td>
              </tr>
              <tr class="bg-gray-100 w-full text-[14px]">
                <th class="text-[16px] align-top text-left break-words px-3 py-2 font-bold border border-gray-300 grow "> Price</th>
                <td class="balign-top text-left reak-words px-4 py-2 border border-gray-300 "><input class="w-1/3" type="number" name="giaSanPham" value="<?php echo $row['Price']?>"></td>
              </tr>
              <tr class="bg-gray-100 w-full text-[14px]">
                <th class="text-[16px] align-top text-left break-words px-3 py-2 font-bold border border-gray-300 grow ">Description</th>
                <td class="balign-top text-left reak-words px-4 py-2 border border-gray-300  line-clamp-6"><textarea class="w-1/3 h-28 resize-none"  name="mota"  ><?php echo $row['Description']?> </textarea></td>
              </tr>
              <tr class="bg-gray-100 w-full text-[14px]">
                <th class="text-[16px] align-top text-left break-words px-3 py-2 font-bold border border-gray-300 grow ">Publishing Company</th>
                <td class="balign-top text-left reak-words px-4 py-2 border border-gray-300 "><input class="w-1/3" type="text" name="nhaxuatban" value="<?php echo $row['PublishingCompany']?>"></td>
              </tr>
              <tr class="bg-gray-100 w-full text-[14px]">
                <th class="text-[16px] align-top text-left break-words px-3 py-2 font-bold border border-gray-300 grow ">Issuing Company </th>
                <td class="balign-top text-left reak-words px-4 py-2 border border-gray-300 "><input class="w-1/3" type="text" name="congtyphathanh" value="<?php echo $row['IssuingCompany']?>"></td>
              </tr>
              <tr class="bg-gray-100 w-full text-[14px]">
                <th class="text-[16px] align-top text-left break-words px-3 py-2 font-bold border border-gray-300 grow ">Page Counts</th>
                <td class="balign-top text-left reak-words px-4 py-2 border border-gray-300 "><input class="w-1/3" type="number" name="sotrang" value="<?php echo $row['PageCounts']?>"></td>
              </tr>
              <tr class="bg-gray-100 w-full text-[14px]">
                <th class="text-[16px] align-top text-left break-words px-3 py-2 font-bold border border-gray-300 grow ">Cover Type</th>
                <td class="balign-top text-left reak-words px-4 py-2 border border-gray-300 "><input class="w-1/3" type="text" name="loaibia" value="<?php echo $row['CoverType']?>"></td>
              </tr>
              <tr class="bg-gray-100 w-full text-[14px]">
                <th class="text-[16px] align-top text-left break-words px-3 py-2 font-bold border border-gray-300 grow ">Old Price</th>
                <td class="balign-top text-left reak-words px-4 py-2 border border-gray-300 "><input class="w-1/3" type="number" name="giagoc" value="<?php echo $row['OldPrice']?>"></td>
              </tr>
              <tr class="bg-gray-100 w-full text-[14px]">
                <th class="text-[16px] align-top text-left break-words px-3 py-2 font-bold border border-gray-300 grow ">Book Type ID</th>
                <td class="balign-top text-left reak-words px-4 py-2 border border-gray-300 "><input class="w-1/3" type="text" name="loaisach" value="<?php echo $row['BookTypeID']?>"></td>
              </tr>
              <tr class="bg-gray-100 w-full text-[14px]">
                <th class="text-[16px] align-top text-left break-words px-3 py-2 font-bold border border-gray-300 grow ">Shop ID</th>
                <td class="balign-top text-left reak-words px-4 py-2 border border-gray-300 "><input class="w-1/3" type="number" name="shop" value="<?php echo $row['ShopID']?>"></td>
              </tr>
              <tr class="bg-gray-100 w-full text-[14px]">
                <th class="text-[16px] align-top text-left break-words px-3 py-2 font-bold border border-gray-300 grow ">Star</th>
                <td class="balign-top text-left reak-words px-4 py-2 border border-gray-300 "><input class="w-1/3" type="number" name="star" value="<?php echo $row['Star']?>"></td>
              </tr>
              <tr class="bg-gray-100 w-full text-[14px]">
                <th class="text-[16px] align-top text-left break-words px-3 py-2 font-bold border border-gray-300 grow ">Sell Number</th>
                <td class="balign-top text-left reak-words px-4 py-2 border border-gray-300 "><input class="w-1/3" type="number" name="soluongban"  value="<?php echo $row['sellNumber']?>"></td>
              </tr>
              <tr class="bg-gray-100 w-full text-[14px]">
                <th class="text-[16px] align-top text-left break-words px-3 py-2 font-bold border border-gray-300 grow ">Image</th>
                <td class="walign-top text-left -[90px] break-words px-4 py-2 border border-gray-300 "><input class="w-full" type="file" name="hinhanh"></td>
              </tr>

            </tbody>
          </table>
          <button type="submit" class="bg-[#6fc5cd] text-lg  p-5 px-16 hover:bg-[red] mb-5 font-[500] ml-96 mt-5">Sửa lại</button>
        </form>
        <?php
   }
        ?>
        </ul>


      </div>
    </div>
  </div>


  <?php
  include '../../includes/footer.php';
  ?>
</body>

</html>
<?php 
} else{
  echo "Lỗi không tìm thấy sản phẩm cần sửa !";
}
?>