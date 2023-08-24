<!-- ấn chọn mua tự động có số trong giỏ hàng -->
<!-- ẩn số sản phẩm liên quan khi có nhiều -->
<?php
include('../includes/header.php');
if (isset($_GET['ProductID'])) {
    $ProductID = $_GET['ProductID'];
    // duong dan lay ket noi co so du lieu 
    include('../admin/products_management/Handel_products/config.php');
    // lay ra san pham co id tuong ung khi click vao
    $query_Products = "SELECT * FROM Products where ProductID = $ProductID";
    $result_products = $conn->query($query_Products);
    $row_products = $result_products->fetch_assoc();

    //lay ra shop va loai sach
    $ShopID = $row_products['ShopID'];
    $BookTypeID = $row_products['BookTypeID'];
    // lay ra shop
    $query_shop = "SELECT * FROM shop where ShopID  = $ShopID";
    // lay ra loai sach
    $query_booktype = "SELECT * FROM booktype where BookTypeID  = $BookTypeID";


    $result_shop = $conn->query($query_shop);
    $result_booktype = $conn->query($query_booktype);
    // truy van vao tung cot cua tung bang 

    $row_shop = $result_shop->fetch_assoc();
    $row_booktype = $result_booktype->fetch_assoc();

    // san pham tuong tu
    $query_relatedProducts="SELECT * FROM Products where BookTypeID = $BookTypeID AND ProductID <> $ProductID";
    $result_relatedProducts = $conn->query($query_relatedProducts);
    // sản phảm random
    $query_randomProducts="SELECT *
    FROM products
    where BookTypeID <> $BookTypeID
    ORDER BY RAND()
    LIMIT 18  ";
    $result_randomProducts = $conn->query($query_randomProducts);
    
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../build/tailwind.css">
        <link rel="stylesheet" href="../icon/font awesome/fontawesome-free-5.15.4-web/css/all.css">
        <link rel="stylesheet" href="../icon/themify-icons/themify-icons.css">
        <title>Document</title>
        <style>
            .product-container{
                
                transition: 0.3s ease-in-out;
            }
            .product.active{
                display: block;
         
            }
        </style>
    </head>

    <body>

        <div class="header">

        </div>

        <div class="main-content bg-[#f8eeeea1]  px-[20px] py-[0px] mx-[50px]">
            <!--start main product(thong tin de mua hang img..) -->
            <div class="main-product flex  my-[20px]">

                <div class="img-product py-[16px] pr-0 pl-[16px] ">
                    <!-- ảnh sản phẩm -->
                    <img class=" w-[444px]" src="../admin/products_management/Uploads/<?php echo $row_products['Image']; ?> ">

                    <div class="flex mt-[35px]">
                        Chia sẻ :
                        <div class=" cursor-pointer rounded-full w-[28px] h-[28px] ml-[10px] mr-[4px] bg-[#0b0b52] text-[white] text-center"><i class="fab mt-1 fa-facebook-f"></i></div>
                        <div class=" cursor-pointer rounded-full w-[28px] h-[28px] mx-[4px] bg-[#6666ca] text-[#f9f4f4] text-center"><i class="fab mt-1 fa-facebook-messenger"></i></div>
                        <div class=" cursor-pointer rounded-full w-[28px] h-[28px] mx-[4px] bg-[#d82626] text-[white] text-center"><i class="fab mt-1 fa-pinterest-square"></i></div>
                        <div class=" cursor-pointer rounded-full w-[28px] h-[28px] mx-[4px] bg-[#33c4de] text-[white] text-center"><i class="fab mt-1 fa-twitter"></i></div>
                        <div class=" cursor-pointer rounded-full w-[28px] h-[28px] mx-[4px] bg-[#636375] text-[white] text-center"><i class="fas mt-1 fa-link"></i></div>
                    </div>
                    <div class="bg-[#f8eeeea1]  mt-[80px]">
                        
                        <img src="./img/anh-dong-cute-cho-powerpoint_105545111.gif" class="w-[200px] " alt="">
                    </div>
                </div>
                <div class=" mx-[12px] bg-[#e6e1e1] w-[1px] opacity-50"></div>
                <!-- bat dau thong tin gom dia chi , thoi gia,.. ko co anh  -->
                <div class="about-product py-[16px] pr-[28px]  pl-0">
                    <h5 class=" text-[#ff004c]">Loại Sách: <?php echo $row_booktype['BookTypeName']; ?></h5>
                    <!-- tên sản phẩm -->
                    <p class="text-[24px]"><?php echo $row_products['ProductName']; ?></p>
                    <div class="star ">
                        <!-- danh gia  -->
                        <!-- đánh giá  -->
                        <?php 
                        for($i=1;$i<=$row_products['Star'];$i++){
                         ?> <i class="fas fa-star text-[yellow]"></i>
                        <?php } ?>
                        <p class="inline-block text-[#bdbaba]">(62 đánh giá) |</p>
                        <p class="inline-block text-[#bab1b1]">Đã bán <?php echo $row_products['sellNumber']; ?></p>
                    </div>
                    <div class="flex">
                        <div class="w-2/3">
                            <!-- giá bán -->
                            <h1 class="  inline-block font-medium text-[40px]  text-red-500  m-[12px]"><?php echo $row_products['Price']; ?>.000 ₫</h1>
                            <del class=" text-[20px] inline-block font-[100]"><?php echo $row_products['OldPrice']; ?>.000đ</del>
                            <div class=" h-[30px] w-2/5 flex space-x-3  border-2 border-[#b9b4b4] bg-[#e1e9f1]">
                                <i class="fas fa-warehouse text-[20px] text-[#ffa600] pt-[2px]"></i>
                                <p class=" inline">Thưởng 1,98 ASA</p>
                                <!-- lưu trữ thông tin  -->
                                <img class="w-[42px] cursor-pointer" src="./img/d74d0e9e37a9bb14f35dcc0c816d2038.gif" alt="">
                            </div>

                            <div class=" mt-[20px] pt-[20px] w-1/2">
                                <div class=" text-[15px] font-[500]">1 Mã Giảm Giá </div>
                                <div class="flex">
                                    <div class="text-center border-solid border border-[#2247ef] w-1/3 px-[12px] py-[3px] mt-[12px] mr-[8px] text-[13px] leading-[20px] font-[500]  rounded-[50px] cursor-pointer hover:bg-[#31bdcf]">Giảm 15k</div>
                                    <i class="fas fa-chevron-right pt-[18px] text-[#7893f4] cursor-pointer"></i>
                                </div>
                            </div>

                            <div class="address my-[10px]">
                                Giao đến
                                <!-- địa chỉ giao hàngx -->
                                <div class="inline-block text-[15px] leading-[20px] font-[500] 
        underline cursor-pointer py-[12px]">Q.hoàn kiếm ,P.Hàng Trống , Hà Nội
                                    
                                </div>
                            </div>

                            <div class="time border-solid border border-[#e3e6ef] py-[8px]">
                                <div class="text-[green] font-[500]">
                                    <i class="fas fa-truck-moving "></i> Thứ 6, ngày 28/07
                                </div>
                                <div class="">Vận chuyển: 8.000đ <del class="font-[100]">23.000đ</del></div>

                            </div>

                            <div class="my-[10px]">
                                <i class="fas fa-check text-[blue]"></i> Đã giảm 15.000₫ freeship.
                            </div>
                            <!-- so luong dat mua -->
                            <div class="soluong flex font-[500]">Số Lượng</div>
                            <!-- xu ly gui du lieu so luong mua di ********************** -->
                            <form action="" >
                                <div class="flex text-[35px] items-center my-[10px]">
                                    <button type="button" id="decrease-button" class="inline-block  border-solid border border-[#e3e6ef] text-center leading-[20px] p-[4px] h-[40px] w-[35px] hover:bg-[#585252]">-</button>
                                    <input type="number" name="soluong" id="number-input" class="inline-block w-[60px] h-[40px] text-[20px] border-solid border border-[#e3e6ef] text-center leading-[30px] py-[1px] px-[2px]" value="0">
                                    <button type="button" id="increase-button" class="hover:bg-[#585252] inline-block  border-solid border border-[#e3e6ef] text-center leading-[20px] p-[4px] h-[40px] ">+</button>
                                    <!-- xu ly + tang dan va - giam dan  -->
                                    <script>
                                        var decreaseButton = document.getElementById("decrease-button");
                                        var increaseButton = document.getElementById("increase-button");
                                        var numberInput = document.getElementById("number-input");

                                        decreaseButton.addEventListener("click", function() {
                                            var currentValue = parseInt(numberInput.value);
                                            var newValue = currentValue - 1;
                                            numberInput.value = newValue;
                                        });

                                        increaseButton.addEventListener("click", function() {
                                            var currentValue = parseInt(numberInput.value);
                                            var newValue = currentValue + 1;
                                            numberInput.value = newValue;
                                        });
                                    </script>
                                </div>
                                <div class="flex mt-[60px] ">

<button href="index.php" class="  w-2/3 font-[500] text-[white] rounded-[10px] bg-[red] text-center leading-[40px] py-[6px] hover:bg-[#585252] cursor-pointer">Chọn Mua
</button>
</div>
                            </form>

                          
                        </div>
                        <div class="border-solid border border-[#e3e6ef] w-1/3 home-book py-[8px] px-[12px] my-[12px]">
                            <div class="flex">
                                <img src="../admin/products_management/shop_img/<?php echo $row_shop['shop_img']; ?>" alt="" class=" w-[60px]">
                                <p class="font-[500] ml-[15px]"><?php echo $row_shop['NameShop']; ?></p>
                            </div>
                            <div class="flex mt-[20px]">
                                <div class="text-center w-1/2 font-[500]"><?php echo $row_shop['Rating']; ?> / 5 <i class="fas fa-star text-[yellow]"></i>
                                    <p class="text-center text-[12px] text-[#bdb9b9] pl-[5px]">Đánh Giá</p>
                                </div>
                                <div class="pl-[20px] text-center w-1/2 font-[500]"><?php echo $row_shop['FollowCount']; ?>k+
                                    <p class="text-center text-[12px] text-[#bdb9b9] ">Theo Dõi</p>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="">
                                    <i class="  text-[blue] far fa-check-square  pl-[20px] text-[20px] mt-[15px] ml-[10px]"></i>
                                    <p class="text-[15px]">Hoàn tiền 111% nếu hàng giả</p>
                                </div>
                                <div class="">
                                    <i class=" text-[blue] far fa-thumbs-up  pl-[20px] text-[20px] mt-[15px] ml-[10px]"></i>
                                    <p class="text-[15px]">Mở hộp kiểm tra nhận hàng</p>
                                </div>
                                <div class="">
                                    <i class=" text-[blue] far fa-hand-point-left pl-[20px] text-[20px] mt-[15px] ml-[10px]"></i>
                                    <p class="text-[15px]">Đổi trả trong 30 ngày nếu sp lỗi.</p>
                                </div>

                            </div>
                            <div class="">
                                <i class="fas fa-book-open fa-pulse text-[40px] my-[100px] pl-[250px]"></i>
                            </div>
                            <div class="">
                                <img src="./img/anh-dong-cute-ban-tim_105545064.gif" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- end thong tin ko bao gom anh  -->
                </div>
            </div>
            <!-- end mainproduct( noi de mua )  -->


            <!-- start san pham lien quan  -->
            <!-- ý tưởng : dùng while()  thẻ li -->
            <div class="relate-to-product">
                <h4 class="font-[500] text-[25px] mb-[20px] bg-white">Sản Phẩm Tương Tự</h4>
                <div class="product-container flex  relative">
                <div class="h-[30px] arrow-left cursor-pointer text-[30px] absolute left-[-20px] top-[150px] ">⬅</div>
                    <?php
                    while($row_relatedProducts = $result_relatedProducts->fetch_assoc()){
                    ?>
                    <!-- cai dat flex  -->
                    <div class="product grow-0 shrink-0 basis-1/6  hidden hover:shadow-xl">
                    <a href="./main.php?ProductID=<?php echo$row_relatedProducts['ProductID']; ?>" class=" p-[12px]  cursor-pointer  group ">
                        <img src="../admin/products_management/Uploads/<?php echo $row_relatedProducts['Image']; ?>" alt="">
                        <div class="mx-[12px] pl-[30px]">
                            <div class="text-[red] text-[18px]"><?php echo $row_relatedProducts['Price']; ?>.000 ₫ </div>
                            <p class="group-hover:text-[#31bdcf]"><?php echo $row_relatedProducts['ProductName']; ?> </p>
                            <div class="text-[12px] text-[#9c9898]">
                            <?php echo $row_relatedProducts['Star']; ?> <i class="fas fa-star text-[yellow]"></i> | Đã bán <?php echo $row_relatedProducts['sellNumber']; ?>
                            </div>
                        </div>
                    </a>
                    </div>
                    <?php } ?>
                    <div class="arrow-right cursor-pointer text-[30px] absolute right-[-20px] top-[150px] ">➡</div>
                </div>
                
                <div class="control">
  
 
</div>
<!-- xu ly ham mui ten -->

            </div>
            <!-- end sản phẩm liên quan -->

            <!-- Sản Phẩm Random -->

            <div class="Random">
                <h4 class="font-[500] text-[25px] mb-[20px] bg-white">Xem Thêm Một Số Loại Sách Khác</h4>
                <div class="product-container flex  relative">
                <div class="h-[30px] arrow-leftBot cursor-pointer text-[30px] absolute left-[-20px] top-[100px] ">⬅</div>
                
                    <?php
                    while($row_randomProducts = $result_randomProducts->fetch_assoc()){
                    ?>
                    <div class="product grow-0 shrink-0 basis-1/6  hidden hover:shadow-xl">
                    <a href="./main.php?ProductID=<?php echo$row_randomProducts['ProductID']; ?>" class=" p-[12px]  cursor-pointer hover:shadow-xl group ">
                        <img src="../admin/products_management/Uploads/<?php echo $row_randomProducts['Image']; ?>" alt="">
                        <div class="mx-[12px] pl-[30px]">
                            <div class="text-[red] text-[18px]"><?php echo $row_randomProducts['Price']; ?>.000 ₫ </div>
                            <p class="group-hover:text-[#31bdcf]"><?php echo $row_randomProducts['ProductName']; ?> </p>
                            <div class="text-[12px] text-[#9c9898]">
                            <?php echo $row_randomProducts['Star']; ?> <i class="fas fa-star text-[yellow]"></i> | Đã bán <?php echo $row_randomProducts['sellNumber']; ?>
                            </div>
                        </div>
                    </a>
                    </div>
                    <?php } ?>
                    <div class="arrow-rightBot cursor-pointer text-[30px] absolute right-[-20px] top-[100px] ">➡</div>
                </div>
                   
                </div>
            </div>
         
            <!-- end sản phẩm random -->
            <!-- start thông tin chi tiết -->
            <div class=" describe-detail-product w-2/3 bg-white pl-[20px]">
                <h4 class="font-[500] text-[25px] py-[8px] px[16px]">Thông Tin Chi Tiết</h4>
                <div class="flex p-[16px]">
                    <div class="bg-[#f3eaea]">
                    <p class="py-[10px] px-[15px]">Loại Sách</p>
                        <p class="py-[10px] px-[15px]">Công ty phát hành</p>
                        <p class="py-[10px] px-[15px]">Loại bìa</p>
                        <p class="py-[10px] px-[15px]">Số trang</p>
                        <p class="py-[10px] px-[15px]">Nhà xuất bản</p>
                        
                    </div>
                    <div class="">
                    <p class="py-[10px] px-[15px]"><?php echo $row_booktype['BookTypeName']; ?></p>
                        <p class="py-[10px] px-[15px]"><?php echo $row_products['IssuingCompany']; ?></p>
                        <p class="py-[10px] px-[15px]"><?php echo $row_products['CoverType']; ?></p>
                        <p class="py-[10px] px-[15px]"><?php echo $row_products['PageCounts']; ?></p>
                        <p class="py-[10px] px-[15px]"><?php echo $row_products['PublishingCompany']; ?></p>
                        
                    </div>
                </div>
                <!-- end thông tin chi tiết -->
            </div>
            <!-- start mo ta san pham -->
            <div class="describe-about-product w-2/3 bg-white pl-[20px]">
                <h4 class="font-[500] text-[25px] py-[8px] px[16px]">Mô Tả Sản Phẩm</h4>
                <pre class="whitespace-pre-wrap font-sans mb-5">
                <?php echo $row_products['Description']; ?>
</pre>

                <!-- <p class="font-[700] my-[10px] text-[18px]">
                    Tác giả:
                </p>
                <div class="flex">
                    <div class="w-2/3 mr-[20px]">
                        <img class="w-[200px]" src="./img/tacgia.jpg " alt="">
                    </div>
                    <div class="">
                        JOSÉ MAURO DE VASCONCELOS (1920-1984) là nhà văn người Brazil. Sinh ra trong một gia đình nghèo ở ngoại ô Rio de Janeiro, lớn lên ông phải làm đủ nghề để kiếm sống. Nhưng với tài kể chuyện thiên bẩm, trí nhớ phi thường, trí tưởng tượng tuyệt vời cùng vốn sống phong phú, José cảm thấy trong mình thôi thúc phải trở thành nhà văn nên đã bắt đầu sáng tác năm 22 tuổi. Tác phẩm nổi tiếng nhất của ông là tiểu thuyết mang màu sắc tự truyện Cây cam ngọt của tôi. Cuốn sách được đưa vào chương trình tiểu học của Brazil, được bán bản quyền cho hai mươi quốc gia và chuyển thể thành phim điện ảnh. Ngoài ra, José còn rất thành công trong vai trò diễn viên điện ảnh và biên kịch.
                    </div>
                </div> -->

            </div>
        </div>
        <!-- end mo ta san pham -->




        <div class="footer ">
<?php
include('../includes/footer.php');
?>

        </div>


    </body>
    <script src="./transferProductsRandom.js">

 </script>
<script src="./transferProductRelated.js">

 </script>
 
    </html>
<?php
} else {
    echo "Lỗi : Không lấy được ID sản phẩm";
}
?>