document.addEventListener("DOMContentLoaded", function () {
    var currentIndex = 0;
    
    var productsRelated = document.querySelectorAll(".relate-to-product .product");
    var pageSize = 6;
  
    function showProductsRelated(index) {
      productsRelated.forEach(function (product) {
        product.classList.remove("active");
      });
  
      for (var i = index; i < index + pageSize; i++) {
        if (productsRelated[i]) {
          productsRelated[i].classList.add("active");
        }
      }
    }
  
    document.querySelector(".arrow-right").addEventListener("click", function () {
      if (currentIndex + pageSize < productsRelated.length) {
        currentIndex += pageSize;
        showProductsRelated(currentIndex);
       
      }
    });
  
    document.querySelector(".arrow-left").addEventListener("click", function () {
      if (currentIndex - pageSize >= 0) {
        currentIndex -= pageSize;
        showProductsRelated(currentIndex);
       
      }
    });
  
    // Hiển thị sản phẩm ban đầu
    showProductsRelated(currentIndex);
  });