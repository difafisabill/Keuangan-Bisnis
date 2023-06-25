<?php
session_start();
if ($_SESSION['username'] == null) {
   header('location:Login.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dasboard</title>
   <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
   <link rel="stylesheet" href="../KEUANGAN/css/admin.css">
   <script src="../js/script.js"></script>
</head>

<body>
   <div class="sidebar">
      <div class="logo-details">
      <i class='bx bx-dollar-circle'></i>
         <span class="logo_name">PeelDime</span>
      </div>
      <ul class="nav-links">
         <li>
            <a href="./admin.php" class="active">
               <i class="bx bx-grid-alt"></i>
               <span class="links_name">Dashboard</span>
            </a>
         </li>
         <li>
            <a href="../KEUANGAN/Masuk Admin/bank/bank.php">
               <i class='bx bxs-bank'></i>
               <span class="links_name">Bank</span>
            </a>
         </li>
         <li>
            <a href="./Masuk Admin/Customers/customers.php">
               <i class='bx bx-user-voice'></i>
               <span class="links_name">Customers</span>
            </a>
         </li>
         <li>
            <a href="./Masuk Admin/Product/product.php">
               <i class="bx bx-box"></i>
               <span class="links_name">Product</span>
            </a>
         </li>
         <li>
            <a href="#">
            <i class='bx bx-shape-triangle' ></i>
               <span class="links_name">Sales</span>
            </a>
         </li>
         <li>
            <a href="./Masuk Admin/Supplier/supplier.php">
            <i class='bx bx-buildings' ></i>
               <span class="links_name">Supplier</span>
            </a>
         </li>
         <li>
            <a href="#">
            <i class='bx bxs-credit-card-alt' ></i>
               <span class="links_name">Transaction</span>
            </a>
         </li>
         <li>
            <a href="../Masuk Admin/karyawan/Karyawan.php">
               <i class='bx bxs-user-badge'></i>
               <span class="links_name">Karyawan</span>
            </a>
         </li>
         <li>
            <a href="#">
            <i class='bx bx-bar-chart-alt-2'></i>
               <span class="links_name">Report</span>
            </a>
         </li>
         <li>
            <a href="./logout.php">
               <i class="bx bx-log-out"></i>
               <span class="links_name">Log out</span>
            </a>
         </li>
      </ul>
   </div>
   <section class="home-section">
     
      <nav>
         <div class="sidebar-button">
            <i class="bx bx-menu sidebarBtn"></i>
         </div>
         <div class="profile-details">
            <span class="admin_name">Admin</span>
         </div>
      </nav>
      <div class="home-content">
         <h1>Selamat Datang Admin</h1>
         <div class="home-content">
            <h2 id="text">
               <?php
               // session_start();
               echo $_SESSION['username'];
               ?>
            </h2>
            <h2 id="time"></h2>
            <h3 id="date"></h3>

         </div>
      </div>
   </section>

   <script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function() {
         sidebar.classList.toggle("active");
         if (sidebar.classList.contains("active")) {
            sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
         } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      };

      function myFunction() {
         const months = ["Januari", "Februari", "Maret", "April", "Mei",
            "Juni", "Juli", "Agustus", "September",
            "Oktober", "November", "Desember"
         ];
         const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis",
            "Jumat", "Sabtu"
         ];
         let date = new Date();
         jam = date.getHours();
         tanggal = date.getDate();
         hari = days[date.getDay()];
         bulan = months[date.getMonth()];
         tahun = date.getFullYear();
         let m = date.getMinutes();
         let s = date.getSeconds();
         m = checkTime(m);
         s = checkTime(s);
         document.getElementById("date").innerHTML = `${hari}, ${tanggal} ${bulan} ${tahun}, ${jam}:${m}:${s}`;
         requestAnimationFrame(myFunction);
      }

      function checkTime(i) {
         if (i < 10) {
            i = "0" + i;
         }
         return i;
      }
      window.onload = function() {
         let date = new Date();
         jam = date.getHours();
         if (jam >= 4 && jam <= 10) {
            document.getElementById("text").insertAdjacentText("afterbegin", "Selamat Pagi,");
         } else if (jam >= 11 && jam <= 14) {
            document.getElementById("text").insertAdjacentText("afterbegin", "Selamat Siang,");
         } else if (jam >= 15 && jam <= 18) {
            document.getElementById("text").insertAdjacentText("afterbegin", "Selamat Sore,");
         } else {
            document.getElementById("text").insertAdjacentText("afterbegin", "Selamat Malam,");
         }
         myFunction();
      };
   </script>


   <!-- <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        };
        //waktu
        const timeElement = document.getElementById('time');
        const dateElement = document.getElementById('date');

        function updateTime() {
            const now = new Date();
            const time = now.toLocaleTimeString([], {
                hour: '2-digit',
                minute: '2-digit'
            });
            const date = now.toLocaleDateString();
            timeElement.innerHTML = time;
            dateElement.innerHTML = date;
        }
        setInterval(updateTime, 1000);
    </script> -->

</body>

</html>