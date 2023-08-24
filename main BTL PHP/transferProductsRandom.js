document.addEventListener("DOMContentLoaded", function () {
    var currentIndex = 0;
    var productsRandom= document.querySelectorAll(".Random .product");
    var pageSize = 6;
  
    function showProductsRandom(index) {
      productsRandom.forEach(function (product) {
        product.classList.remove("active");
      });
  
      for (var i = index; i < index + pageSize; i++) {
        if (productsRandom[i]) {
          productsRandom[i].classList.add("active");
        }
      }
    }
  
    document.querySelector(".arrow-rightBot").addEventListener("click", function () {
      if (currentIndex + pageSize < productsRandom.length) {
        currentIndex += pageSize;
        showProductsRandom(currentIndex);
       
      }
    });
  
    document.querySelector(".arrow-leftBot").addEventListener("click", function () {
      if (currentIndex - pageSize >= 0) {
        currentIndex -= pageSize;
        showProductsRandom(currentIndex);
       
      }
    });
  
    // Hiển thị sản phẩm ban đầu
    showProductsRandom(currentIndex);
  });