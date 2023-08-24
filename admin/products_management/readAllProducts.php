<?php

include('./Handel_products/config.php');
$query = "SELECT * FROM Products";
$result = $conn->query($query);

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/Nhom_14_Logo.png">
  <!-- CDN font-awesome  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- CDN animate css  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <!-- CDN tailwind css -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- tippyCustom.css -->
  <link rel="stylesheet" href="../../assets/css/tippyCustom.css" />

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
    <div class="content  max-w-full  px-6 py-4 flex flex-col gap-3 bg-white">
      <!-- Users Table -->
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
      <section class="bg-[#756d6d] p-8 content-hd h-[34px] flex gap-2 my-[5px]">
        <h1 class="font-bold text-2xl basis-1/2 flex justify-start items-center ">
          DANH SÁCH SẢN PHẨM
        </h1>
        <span class="basis-1/2 flex justify-end items-center"><a href="../admin.php">Home </a> / <a href="#"> Danh Sách Sản Phẩm </a></span>
      </section>
      <div class="w-full p-2 bg-white flex flex-col justify-between gap-[20px] items-start">
        <!-- <form method="POST"> -->
        <table class="w-full max-w-full border-collapse border border-gray-300">
          <thead>
            <tr class="bg-gray-100 w-full text-[14px]">
              <th class="break-words px-3 py-2 font-bold border border-gray-300 grow ">Product ID</th>
              <th class="break-words px-3 py-2 font-bold border border-gray-300 grow ">Product Name</th>
              <th class="break-words px-3 py-2 font-bold border border-gray-300 grow "> Price</th>
              <th class="break-words px-3 py-2 font-bold border border-gray-300 grow ">Description</th>
              <th class="break-words px-3 py-2 font-bold border border-gray-300 grow ">Publishing Company</th>
              <th class="break-words px-3 py-2 font-bold border border-gray-300 grow ">Issuing Company</th>
              <th class="break-words px-3 py-2 font-bold border border-gray-300 grow ">Page Counts</th>
              <th class="break-words px-3 py-2 font-bold border border-gray-300 grow ">Cover Type</th>
              <th class="break-words px-3 py-2 font-bold border border-gray-300 grow ">Old Price</th>
              <th class="break-words px-3 py-2 font-bold border border-gray-300 grow ">Book Type ID</th>
              <th class="break-words px-3 py-2 font-bold border border-gray-300 grow ">Shop ID</th>
              <th class="break-words px-3 py-2 font-bold border border-gray-300 grow ">Star</th>
              <th class="break-words px-3 py-2 font-bold border border-gray-300 grow ">Sell Number</th>
              <th class="break-words px-3 py-2 font-bold border border-gray-300 grow ">image</th>
              <th class="break-words px-3 py-2 font-bold border border-gray-300 grow ">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {

            ?>
              <!-- render productslist -->
              <tr class="bg-gray-200 hover:bg-gray-300 flexbreak-normal">
                <td class="break-words px-4 py-2 border border-gray-300 "><?php echo $row['ProductID']; ?></td>
                <td class="break-words px-4 py-2 border border-gray-300 "><?php echo $row['ProductName']; ?></td>
                <td class="break-words px-4 py-2 border border-gray-300 "><?php echo $row['Price']; ?></td>
                <td class="w-[150px] break-words px-4 py-2 border border-gray-300  line-clamp-6"><?php echo $row['Description']; ?></td>
                <td class="break-words px-4 py-2 border border-gray-300 "><?php echo $row['PublishingCompany']; ?></td>
                <td class="break-words px-4 py-2 border border-gray-300 "><?php echo $row['IssuingCompany']; ?></td>
                <td class="break-words px-4 py-2 border border-gray-300 "><?php echo $row['PageCounts']; ?></td>
                <td class="break-words px-4 py-2 border border-gray-300 "><?php echo $row['CoverType']; ?></td>
                <td class="break-words px-4 py-2 border border-gray-300 "><?php echo $row['OldPrice']; ?></td>
                <td class="break-words px-4 py-2 border border-gray-300 "><?php echo $row['BookTypeID']; ?></td>
                <td class="break-words px-4 py-2 border border-gray-300 "><?php echo $row['ShopID']; ?></td>
                <td class="break-words px-4 py-2 border border-gray-300 "><?php echo $row['Star']; ?></td>
                <td class="break-words px-4 py-2 border border-gray-300 "><?php echo $row['sellNumber']; ?></td>
                <td class="w-[90px] break-words px-4 py-2 border border-gray-300 ">

                  <!-- đường dẫn ảnh ở đây tính từ file nào render lên  -->
                  <img class="w-[100px] mb-[10px]" src="./Uploads/<?php echo $row['Image']; ?>">
                </td>
                <td class="pl-5 border border-gray-300  gap-[10px] ">
                  <!-- Edit -->
                  <a href="./fixProducts.php?productName=<?php echo $row['ProductName'] ?>&productID=<?php echo $row['ProductID'] ?>&stt=<?php echo $row['stt'] ?>
                    " class="block mb-4 ">
                    <i class="fa-solid fa-edit text-[22px] hover:bg-emerald-200"></i>
                  </a>

                  <!-- DEL -->

                  <a href="./Handel_products/HandelDelete.php?action=delete&productId=<?php echo $row['ProductID'] ?>" onclick="return  confirm('Bạn chắc chắn muốn xóa sản phẩm này')" class="block">
                    <i class="fa-solid fa-trash-can text-[22px] hover:bg-[red]"></i>
                  </a>

                </td>


              <?php
            }
              ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>


  <?php
  include '../../includes/footer.php';
  ?>

</body>

</html>