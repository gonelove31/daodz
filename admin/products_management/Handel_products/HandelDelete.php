<?php
include('./config.php');
function delete($productId,$conn){
$query_delete="DELETE FROM products where  ProductID = $productId";
if($conn->query($query_delete)===true){
    echo "xóa thành công<br>";
} else{
    echo "lỗi khi xóa: ".$conn->error;
    echo "<br>";
};
}
if(isset($_GET["productId"])){
    $productId=$_GET["productId"];
    delete($productId,$conn);
} else{
    echo"ko lay dc hanh dong";
}
echo "<a href='../readAllProducts.php'> quay lai </a>";
?>