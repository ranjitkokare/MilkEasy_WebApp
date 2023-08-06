<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/ff3c91d27a.js" crossorigin="anonymous"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <title>Document</title>
  <style>
    .dropdown-content {
      display: none;
      background-color: #f1f1f1;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }
    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }
    .show {
      display: block;
    }
  </style>
</head>
<body>

  <nav class="float-left w-full p-4 bg-black shadow md:justify-between fixed mt-0">
    <div class="flex justify-between items-center ">
      <span class=" text-white text-2xl cursor-pointer hover:text-cyan-500 mx-2 md:hidden block">
        <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
      </span>
    </div>
    <ul
      class="mt-0 text-white md:flex z-[-1] md:static absolute bg-gray-500 md:bg-black w-full md:w-auto md:py-0 md:pl-0 pl-7 md:opacity-100 opacity-0 top[-400]">
    
      <li class="mx-4 my-4 md:my-0">
        <a href="#Home.php" class="text-l hover:text-cyan-500 ">Home</a>
      </li>
      <li class="mx-4 my-4 md:my-0">
        <a href="#Aboutus" class="text-l hover:text-cyan-500 ">About us</a>
      </li>
      <li class="mx-4 my-4 md:my-0">
        <a href="#contactus" class="text-l hover:text-cyan-500">Contact us</a>
      </li>
    </ul>
  </nav>
  <div class="dropdown absolute right-0">
    <div class="fixed right-0 mt-4  pr-4">
      <?php
      if (isset( $_SESSION['loggedinn'])) {
        ?>
        <div class="flex">
          <h3>Hi </h3>
        <button id="myBtn" class="dropbtn text-white hover:text-cyan-500">Menu</button>
      </div>
        <?php
      } else {
        ?>
        <a href="./Admin_Login.php" class="dropbtn text-white hover:text-cyan-500">Login</a>
        <?php
      }
      ?>
    </div>
    <div id="myDropdown" class="dropdown-content mt-14 float-right z-10">
      <a href="setRates.php" class="hover:bg-gray-300">Set Rate</a>
      <a href="Farmer_list.php" class="hover:bg-gray-300">View farmer</a>
      <a href="Milk_Collector_list.php" class="hover:bg-gray-300">View collectors</a>
      <a href="searchdate.php" class="hover:bg-gray-300">View collection</a>
      <a href="addFarmer_collector.php" class="hover:bg-gray-300">Add collector/farmer</a>
      <a href="payment.php" class="hover:bg-gray-300">Payment Record </a>
      <a href="view_payment.php" class="hover:bg-gray-300">View Payment Record </a>
      <a href="Feedback_list.php" class="hover:bg-gray-300">View feedbacks</a>
      <a href="Admin_logout.php" class="hover:bg-gray-300">Logout</a>
    </div>
  </div>

  <script>
    function Menu(e) {
      let list = document.querySelector('ul');
      e.name === 'menu' ? (e.name = "close", list.classList.add('top-[60px]'),
        list.classList.add('opacity-100')) : (e.name = "menu", list.classList.remove('top-[60px]'),
          list.classList.remove('opacity-100'))
    }
  </script>
  <!-- for menu button  -->
  <script>
    document.getElementById("myBtn").onclick = function () { myFunction() };
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }
  </script>
</body>

</html>