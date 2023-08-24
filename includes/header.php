<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="./tippyCustom.css">
<header class="bg-gray-800 text-white py-4 sticky top-0 z-[1000]">
  <div class="container mx-auto flex items-center justify-between">
    <!-- Logo -->
    <div class="flex items-center">
      <img src="https://upload.wikimedia.org/wikipedia/commons/4/45/IOS_14_Logo.png" alt="Logo" class="h-8 w-auto">
      <span class="ml-2 font-semibold text-lg">Nhóm 14</span>
    </div>

    <!-- Search Input -->
    <div class="flex items-center border rounded-lg px-4 py-2 w-[600px] justify-between">

      <input type="text" placeholder="Search" class="bg-transparent focus:outline-none text-white placeholder-gray-300 w-[95%] border-r-[1px]  border-r-[#fff] pr-[10px]">
      <button class="ml-2 text-gray-300 hover:text-white">
        <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
        </svg>


      </button>

      <div class="myTemplate1 bg-[#374151] rounded-lg">
        <a href="#" class="block px-4 py-2 text-white hover:opacity-70 font-medium text-[16px]">Xem thông tin tài khoản</a>

        <a href="#" class="block px-4 py-2 text-white hover:opacity-70 font-medium text-[16px]">Đăng xuất</a>

      </div>

    </div>

    <!-- Cart and Account Buttons -->
    <div class="flex items-center space-x-4 gap-3">
      <button class="text-gray-300 hover:text-white flex items-center gap-2 account">
        <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 11 14H9a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 10 19Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
        </svg>
        <span class="text-[16px] text-[#fff] font-medium">Tài khoản</span>

      </button>
      <button class="text-gray-300 hover:text-white">
        <div class="relative">
          <div class="text-white bg-red-500 h-[16px] right-[-10px] top-[-14px] rounded-2xl flex justify-center items-center font-bold text-xs leading-[150%] absolute py-[0.5px] px-[4px]">5</div>
          <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 15a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0h8m-8 0-1-4m9 4a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-9-4h10l2-7H3m2 7L3 4m0 0-.792-3H1" />
          </svg>

        </div>

      </button>
    </div>
  </div>
</header>


<script src="https://unpkg.com/@popperjs/core@2.0.6/dist/umd/popper.min.js"></script>
<script src="https://unpkg.com/tippy.js@6.0.0/dist/tippy-bundle.umd.min.js"></script>



<script type="text/javascript">
  tippy('.account', {
    content: document.querySelector('.myTemplate1'),
    trigger: 'click',
    arrow: true,
    interactive: true,
  });
</script>